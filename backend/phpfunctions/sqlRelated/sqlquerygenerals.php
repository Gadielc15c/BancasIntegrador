<?php
include_once('dbConstruct.php');
include_once('../generals.php');

function retornar_seleccion($sql, $input, $type){
    // Types: a, o
    // a significa retorna all (todos), o signficia retorna one (uno, el primero)
    /* 
    * @param $col
    * @param $sql
    * @param $input
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

function crear_id($idcol, $table){
    /* 
    * @param $idcol     la columna del valor deseado en la BD  
    * @param $table     el table en donde se encuentra el valor deseado de la BD
    */
    $r = ejecutarQuery("SELECT $idcol FROM $table", null);
    $random = crear_numero_random();
    $r = $r -> fetchAll();
    while (true){
        $existe = false;
        foreach($r as $id){
            $id = $id[$idcol];
            if ($id == $random){
                $random = crear_numero_random();
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

function retorno_para_un_select($col, $sql, $input = null){
    /* 
    * @param $col       la columna del valor deseado en la BD
    * @param $sql       el SELECT query
    * @param $input     digitar las variables del WHERE o null (por defecto) si no hay un WHERE
    *
    * @return           el valor de la columna o false si no existe
    */
    $row = retornar_seleccion($sql, $input, "o");
    if ($row){
        return $row[$col];
    }
    return false;

}

?>



