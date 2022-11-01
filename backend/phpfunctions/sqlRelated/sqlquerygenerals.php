<?php
include_once('dbConstruct.php');
$path = dirname(__FILE__, 2);
include_once($path . "/generals.php");

function retornar_seleccion($sql, $input, $type = null){
    /* 
    * @param $sql       un SELECT query
    * @param $input     un array con las variables del WHERE o null (por defecto) si no hay un WHERE
    * @param $type      un string con "a" o con "o". "a" significa retornar all (todos) y "o" significa retornar one (uno solo)
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

function verificar_existencia_de_valor($value, $col, $table){
    // retorna falso si el id no existe, de lo contrario una array
    $sql = "SELECT $col FROM $table WHERE $col = ?";
    return retorno_para_un_select($col, $sql, array($value));
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


?>



