<?php
include_once('dbConstruct.php');
include_once('sqlqueryinsert.php');
include_once(dirname(__FILE__, 4) . '/backend/phpfunctions/generals.php');
include_once(dirname(__FILE__, 4) . '/backend/llavesYTextos.php');

function retornar_seleccion(string $sql, array $input = null, $type = null){
    //depricated

    /* 
    * @param $sql       un SELECT query
    * @param $input     un array con las variables del WHERE o null (por defecto) si no hay un WHERE
    * @param $type      un string con "a" o con "o". "a" significa retornar all (todas las filas) y "o" significa retornar one (una sola fila)
    * @return           Si es "a" retorna un array de array. Si es "o" retorna un array. Si no se encontro el query, retorna false          
    */

    $r = ejecutarQuery($sql, $input);
    $num = $r -> rowCount();
    if ($num > 0){
        if ($type == "a"){
            return $r -> fetchAll();
        } else {
            return  $r -> fetch();
        }
    }
    return false;
}

function retornar_seleccion_con_llaves(string $sql, array $input, array $llaves){
    // depricated
    $v = retornar_seleccion($sql, $input, "o");
    if ($v){
        $t = [];
        for ($x = 0; $x < sizeof($llaves); $x++) {
            $t[$llaves[$x]] = $v[$x];
          }
        return $t;
    }
    return false;
}

function crear_id($idcol, $table, $maxrange = null){
    /* 
    * @param $idcol     la columna del valor deseado en la BD  
    * @param $table     el table en donde se encuentra el valor deseado de la BD
    */

    $r = ejecutarQuery("SELECT $idcol FROM $table", null);
    $random = crear_numero_random($maxrange);
    $r = $r -> fetchAll();
    while (true){
        $existe = false;
        foreach($r as $id){
            $id = $id[$idcol];
            if ($id == $random){
                $random = crear_numero_random($maxrange);
                $existe = true;
                break;
            }
        }
        if ($existe == false){
            break;
        }
    }
    
    return $random;
}

function verify_where_values(array $where_values = null){
    if ($where_values){
        $b = verify_if_array_has_custom_keys($where_values);
        if (!$b){
            throw new Exception("The where_values doesn't have custom keys.");
        }
    }
}

function verify_ticket_content(array $ticket){
    global $lotlabel; global $solabel; global $genjuglabel; global $genmonlabel;
    $colkeys = [$lotlabel, $solabel, $genjuglabel, $genmonlabel];
    $coltype = ["is_string", "is_string", "is_array", "is_int"];

    
    if (!verify_if_array_has_custom_keys($ticket)){
        throw new Exception("Ticket array isn't keyed.");
    }
    if (sizeof($ticket) != sizeof($colkeys)){
        throw new Exception("Size of tickets doesn't match. Expected " . sizeof($colkeys) ." but received " . sizeof($ticket));
    }

    $ticketkeys = array_keys($ticket);

    $count = 0;
    foreach($colkeys as $ck){
        if (!in_array($ck, $ticketkeys)){
            throw new Exception("Key not found in Tickets: $ck");
        }
        if (!$coltype[$count]($ticket[$ck])){
            $z = explode("_", $coltype[$count])[1];
            throw new Exception("Incorrect value type in Tickets: $ck. Expected: $z");
        }
        $count ++;
    }
    $jug = array_values($ticket[$genjuglabel]);

    foreach($jug as $ju => $j){
        if (!is_int($j)){
            throw new Exception("Incorrect value type in $genjuglabel: '$j'. Position: $ju. Expected: int");
        }
    }

    $v = execute_view("sorteo", ["nomsorteo.nombre" => $ticket[$solabel], "loterias.nombre" => $ticket[$lotlabel]], only_tables: ["loterias", "nomsorteo"], select: ["loterias.nombre as Nom", "nomsorteo.nombre"]);
    if ($v){
        return true;
    } else {
        throw new Exception("Loteria or Sorteo not found. Or lottery game isn't from the same company.");
    }
}

function execute_simple_sql(string $sql, array $input = null, bool $pdo_col = true){
    $r = ejecutarQuery($sql, $input);
    $num = $r -> rowCount();
    if ($num > 0){
        if ($pdo_col){
            return $r -> fetchAll(PDO::FETCH_COLUMN);
        }
        return $r -> fetchAll(PDO::FETCH_ASSOC);
    } else {
        return [];
    }
}

function execute_insert(string $idcol, string $table, string $col_names, array $values, bool $include_date = false, int $date_pos = 0, string $date_col = "fecha", int $maxrange = null){
    /* 
        @param col_names    array       Ejemplos monto, nom, idterceros, etc        No incluir idcol
        @param values       array       Ejemplos 10, Fulano, 53, etc                No incluir idcol
        @param date_pos     int         Posicion en que quieres que vaya la fecha sin incluir el id general de las tablas.
                                        Ejemplo usando tickets table:
                                        idtickets monto jugadas idsorteo_fk
                                                    0    1          2
                                        Fecha va entre monto y jugada, por lo tanto date_pos sera 1
        
        @param return       int/bool    Si el cambio fue exitoso, retornara el id generado. De lo contrario false.    
    */
    $id = crear_id($idcol, $table, $maxrange);
    $col_names = explode(" ", $col_names);

    if ($include_date){
        $fecha = fecha_de_hoy();
        $values = array_add_value_on_index($values, $date_pos, $fecha);
        $col_names = array_add_value_on_index($col_names, $date_pos, $date_col);
    }

    $all_col = "$idcol, " . implode(", ", $col_names);
    $values = array_add_value_on_index($values, 0, $id);
    $question_marks = generate_insert_question_marks_from_col($all_col);

    $sql = "INSERT INTO $table ($all_col) VALUES ($question_marks)";
    // echo $sql;
    // var_dump($values);
    $v = ejecutarQuery($sql, $values);
    if ($v){
        return $id;
    }
    return false;
}

function execute_view(string $main_table, array $where_values = [], array $select = ["*"], array $only_tables = [], string $order_by = "", bool $print_sql = false){
    /* 
    @param main_table       string      La tabla principal que quieres ver
    @param where_values     array       un array con llaves con las variables del WHERE o null (por defecto) si no hay un WHERE
    @param select           array       un array sin llaves con las condiciones del select
    @param only_tables      array       un array sin llaves en la cual solo quieres las tablas especificadas
    @param order_by         string      para ordenar, ejemplo column1 ASC, column2 DESC
    @param return           array       un array con todos los resultados. De lo contrario un array vacio

    EJEMPLOS DE USO:

    con where_values, select y only_tables      execute_view("terceros", ["nivelacceso.nombre" => "admin"], ["tickets.idtickets"], ["tickets", "nivelacceso"])
    con select y only_tables                    execute_view("terceros", [], ["tickets.idtickets"], ["tickets", "nivelacceso"])
    con only_tables                             execute_view("terceros", only_tables: ["tickets", "nivelacceso"])
    con where_values y only_tables              execute_view("terceros", ["idterceros" => 0], only_tables: ["tickets", "nivelacceso"])

    solo con main_table                         Lo mas probable es que este te retorne algo vacio al menos que exista un tercero con vinculacion en todas las tablas
                                                execute_view("terceros")
    
    */
    verify_where_values($where_values);

    $innerjoins = get_all_links_from_table($main_table, organize_database_tables_by_columns(), $only_tables);
    
    $select = implode(", ", $select);
    $sql = "SELECT $select FROM $main_table $innerjoins";
    if ($where_values){
        $wherecol = generate_selectupdate_question_marks_from_col($where_values, true);
        $sql = $sql . " WHERE $wherecol";
        $where_values = array_values($where_values);
    }
    if ($order_by){
        $sql = $sql . " ORDER BY $order_by";
    }

    if ($print_sql){
        echo "<BR>";
        echo $sql;
        echo "<BR>";
    }
    
    $r = execute_simple_sql($sql, $where_values, false);
    return $r;
}

// array_print(execute_view("pagotarjetas", only_tables: ["pagosrealizados"]));
// array_print(execute_view("terceros"));
//["idterceros" => 0]


function execute_select(string $table, array $where_values = null, array $with_keys = null, array $select = ["*"], int $limit = 0){
    /* 
    * @param table              string      el table de la base de datos a seleccionar
    * @param where_values       array       un array con llaves con las variables del WHERE o null (por defecto) si no hay un WHERE
    * @param with_keys          array       un array sin llaves con las llaves (haha) con las que quiere que salga tu arreglo
    * @param select             array       un array sin llaves especificando las columnas que quieres ver
    * @return                   array       Un array con array o un array con array vacio

    EJEMPLOS DE USO     con where_values y with_keys            execute_select("terceros", ["idterceros" => 0], [1,2,3,4,5,6,7,8,9,10])
                        sin where_values y with_keys            execute_select("terceros", [], [1,2,3,4,5,6,7,8,9,10])
                        con where_values y sin with_keys        execute_select("terceros", ["idterceros" => 0])
                        sin where_values y sin with_keys        execute_select("terceros")
                        solo con select                         execute_select("terceros", select: ["idterceros", "correo"])
                        con where_values, with_keys y select    execute_select("terceros", ["idterceros" => 0], ["col1","col2"], ["idterceros", "correo"])
    */
    verify_where_values($where_values);

    $select = implode(", ", $select);
    $sql = "SELECT $select FROM $table";
    if ($where_values){
        $wherecol = generate_selectupdate_question_marks_from_col($where_values, true);
        $sql = $sql . " WHERE $wherecol";
        $where_values = array_values($where_values);
    }

    if ($limit){
        $sql = $sql . " LIMIT $limit";
    }

    $r = execute_simple_sql($sql, $where_values, false);

    if ($with_keys){
        $tr = [];
        foreach ($r as $a){
            array_push($tr, return_array_with_custom_keys($a, $with_keys));
        }
        $r = $tr;
    }

    if (sizeof($r) == 0){
        $r = [[]];
    }
    return $r;
}

// var_dump(execute_select("terceros", ["nomusuario" => "cliente", "claveusuario" => "ok"])[0]);
// var_dump(execute_select("terceros"));

function execute_update(string $table, array $update, array $where_values = null, bool $print_sql = false){
    /* 
    * @param table              string      el table de la base de datos a actualizar
    * @param update             array       un array con llaves con las variables del update
    * @param where_values       array       un array con llaves con las variables del where
    * @return                   bool        True si se realizaron los cambios, False si no se realizo cambio.
                                            Razones para que de false:
                                            1. Ya el valor tiene con tus parametros
                                            2. No se encontro el valor con el where
    
    Para actualizar los estados debes usar true or false

    EJEMPLOS DE USO     con update y con where_values       execute_update("terceros", ["estado" => true], ["idterceros" => 0])
                        con update y sin where_values       execute_update("terceros", ["estado" => false])
                        Este ultimo es peligroso, usar con precaucion
    */

    $b = verify_if_array_has_custom_keys($update);
    if (!$b){
        throw new Exception("The update doesn't have custom keys.");
    }
    verify_where_values($where_values);

    $updatecol = generate_selectupdate_question_marks_from_col($update, false);
    $sql = "UPDATE $table SET $updatecol";
    $update = array_values($update);

    if ($where_values){
        $wherecol = generate_selectupdate_question_marks_from_col($where_values, true);
        $update = array_merge($update, array_values($where_values));
        $sql = $sql . " WHERE $wherecol";
    }

    if ($print_sql){
        echo "<BR>";
        echo $sql;
        echo "<BR>";
        var_dump($update);
        echo "<BR>";
    }

    $r = ejecutarQuery($sql, $update);
    return retorno_booleano_para_updates($r);
}

function generate_insert_question_marks_from_col(string $col){
    // genera los ? que se ponene en el value de los insert
    // ejemplo del input "idterceros, nombre, cedula, etc"
    $s = [];
    $cant = sizeof(explode("," , $col));
    if ($cant < 1){ 
        throw new Exception("There aren't any columns.");
    }
    for ($x = 0; $x < $cant; $x++) {
        array_push($s, "?");
    }
    $s = implode(", ", $s);
    return $s;
}

function generate_selectupdate_question_marks_from_col(array $col, bool $select){
    // genera los ? que se ponene en el value de los select y updates
    // ejemplo del input ["idterceros" => "0", "nombre" => "fulano", "cedula" => "000", "etc" => "etc"]

    $s = "";
    $cant = sizeof($col);
    if ($cant < 1){ 
        throw new Exception("There aren't any columns.");
    }
    if ($select){
        $d = " AND ";
    } else {
        $d = ", ";
    }

    $keys = array_keys($col);
    for ($x = 0; $x < $cant-1 ; $x++) {
        $s = $s . $keys[$x]. " = ?$d";
    }
    $s = $s . $keys[$x]. " = ?";
    return $s;
}

function retorno_para_un_select($col, $sql, $input = null){
    /*      
    * Retorna un solo valor de 1 sola columna, no retorna varios valores si hay varias columnas, para eso utiliza retornar_seleccion
    * @param $col       la columna del valor deseado en la BD
    * @param $sql       un SELECT query
    * @param $input     un array con las variables del WHERE o null (por defecto) si no hay un WHERE
    * @return           el valor de la columna o false si no existe
    */
    $row = retornar_seleccion($sql, $input, "o");
    if ($row){
        return $row[$col];
    }
    return false;

}

function retorno_booleano_para_updates($ejecucion){
    // ejecucion debe proveenir de la funcion ejecutarQuery en dbConstruct
    // Retorna true si el update fue realizado, de lo contrario false
    if ($ejecucion->rowCount()){
        return true;
    }
    return false;
}

function return_columns_by_name($table){
    $sql = "DESCRIBE $table";
    return execute_simple_sql($sql);
}

function organize_database_tables_by_columns(){
    $sql = "SELECT tab.TABLE_NAME, col.COLUMN_NAME FROM INFORMATION_SCHEMA.TABLES as tab 
            INNER JOIN INFORMATION_SCHEMA.COLUMNS as col
            ON tab.table_name = col.table_name
            WHERE tab.table_type = 'BASE TABLE'";

    $r = execute_simple_sql($sql, null, false);
    $t = [];
    $tab_label = "TABLE_NAME";
    $col_label = "COLUMN_NAME";
    for ($x = 0; $x < sizeof($r); $x++){
        $tab_name = $r[$x][$tab_label];
        $col_name = $r[$x][$col_label];
        if (in_array($tab_name, array_keys($t))){
            array_push($t[$tab_name], $col_name);
        } else {
            $t[$tab_name] = [$col_name];
        }
    }
    return $t;
}

// array_print(organize_database_tables_by_columns());


// $x = organize_database_tables_by_columns();
// foreach($x as $y => $z){


// }




function get_all_links_from_table(string $table, array $all_tables, array $only_tables = []){
    $links = "";
    $a_tables = array_values(array_keys($all_tables));

    $include = array_values(array_unique(array_merge([$table], $only_tables)));
    if ($only_tables){
        $exclude = array_values(array_diff($a_tables, $include));
    } else {
        $exclude = [];
    }
    
    $linked_tables = array_values($include);
    $used_share_link = [$table];
    
    $t = [];
    $used_tables = $exclude;
    // echo "<BR>";
    // var_dump($linked_tables);
    // echo "<BR>";
    // var_dump($exclude);
    // echo "<BR>";
    // echo "<BR>";

    $b = true;
    while ($b){
        $b = false;
        for($x = 0; $x < sizeof($linked_tables); $x++){
            if (!in_array($linked_tables[$x], $used_tables)){
                // echo "<BR>";
                // echo $linked_tables[$x];
                // echo "<BR>";
                for($xx = 0; $xx < sizeof($a_tables); $xx++){
                    if ($linked_tables[$x] != $a_tables[$xx] && !in_array($a_tables[$xx], $exclude)){
                        $v = get_shared_link_between_tables($linked_tables[$x], $a_tables[$xx], $all_tables, $used_share_link);
                        // echo "<BR>";
                        // echo $a_tables[$xx];
                        // echo "<BR>";

                        if ($v[0] != ""){
                            $links = $links . $v[0] . " ";

                            array_push($used_tables, $linked_tables[$x]);
                            array_push($t, $v[1]);
                            array_push($used_share_link, $v[1]);

                            $used_tables = array_unique($used_tables);
                            $t = array_unique($t);
                            $used_share_link = array_unique($used_share_link);
                            $b = true;
                        }
                    }
                }
            }
        }
        $linked_tables = array_values(array_unique(array_merge($t, $linked_tables))); // keep outside it doesn't update the for loop while looping
        // echo "<BR>";
        // echo $links;
        // echo "<BR>";
        // var_dump($linked_tables);
        // echo "<BR>";
        // echo "<BR>";
    }
    return $links;
}

function get_foreign_keys_or_id_from_table(array $a, bool $return_id = false){
    $t = [];
    foreach($a as $b){
        $c = explode("_", $b);
        if (end($c) == "fk"){
            if ($return_id){
                array_push($t, $c[0]);
            } else {
                array_push($t, $b);
            }
        }
    }
    return $t;
}

function get_tables_by_column_name(array $all_tables, string $column_name){
    //
    // not in use. Keep just in case and delete in the future
    //
    $t = [];
    foreach($all_tables as $a => $b){
        if (in_array($column_name, $b)){
            array_push($t, $a);
        }
    }
    return $t;
}

function get_shared_link_between_tables(string $table1, string $table2, array $all_tables, array $used_share_link){
    $v = "";
    $table = "";
    $switched = false;

    if (in_array($table1, $used_share_link) && in_array($table2, $used_share_link)){
        return [$v, $table]; 
    }
    if (in_array($table2, $used_share_link)){
        $t = $table1;
        $table1 = $table2;
        $table2 = $t;
        $switched = true;
    }
    
    $t1fk = get_foreign_keys_or_id_from_table($all_tables[$table1]);
    $t2fk = get_foreign_keys_or_id_from_table($all_tables[$table2]);

    $t1id = $all_tables[$table1][0];
    $t2id = $all_tables[$table2][0];
    $t1idfk = $t1id . "_fk";
    $t2idfk = $t2id . "_fk";

    // $test = ["nomsorteo", "vscostonomsorteo"];
    // if (in_array($table1, $test) && in_array($table2, $test)){
    //     echo "START_DEBUG";
    //     echo "<BR>";
    //     var_dump($used_share_link);
    //     echo "<BR>";
    //     echo $table1;
    //     echo "<BR>";
    //     echo $table2;
    //     echo "<BR>";
    //     var_dump($all_tables[$table1]);
    //     echo "<BR>";
    //     var_dump($all_tables[$table2]);
    //     echo "<BR>";
    //     echo $t1id;
    //     echo "<BR>";
    //     echo $t2id;
    //     echo "<BR>";
    //     echo $t1idfk;
    //     echo "<BR>";
    //     echo $t2idfk;
    //     echo "<BR>";
    //     var_dump($switched);
    //     echo "<BR>";
    //     var_dump(in_array($t2idfk, $t1fk));
    //     echo "<BR>";
    //     var_dump(in_array($t1idfk, $t2fk));
    //     echo "<BR>";
    // }

    if (in_array($t2idfk, $t1fk)){
        // echo "<BR>";
        // echo "Here1";
        // echo "<BR>";
        $v = "INNER JOIN $table2 ON $table1.$t2idfk = $table2.$t2id";
        $table = $table2;
    } elseif (in_array($t1idfk, $t2fk)){
        // echo "<BR>";
        // echo "Here2";
        // echo "<BR>";
        $v = "INNER JOIN $table2 ON $table1.$t1id = $table2.$t1idfk";
        $table = $table2;
    }
    // echo "<BR>";
    // var_dump([$v, $table]);
    // echo "<BR>";
    
    return [$v, $table];
}

function update_tabledata(){
    // NO USAR ESTA FUNCION
    // Hablen con el dev de backend en todo caso

    execute_simple_sql("DELETE FROM tabledata");
    $v = organize_database_tables_by_columns();
    foreach($v as $a => $b){
        insert_tabledata($a, $b[0]);
    }
}

function organize_tabledata(){
    $tabledata = execute_select("tabledata");
    $t = [];

    global $db_tabledata_tablename; global$db_tabledata_tableidcol;
    $col1 = $db_tabledata_tablename;
    $col2 = $db_tabledata_tableidcol;
    foreach($tabledata as $td){
        $t[$td[$col1]] = $td[$col2];
    }
    return $t;
}

?>