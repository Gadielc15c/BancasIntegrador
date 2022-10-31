<?php
include_once('dbConstruct.php');
include_once('../generals.php');

function retornar_seleccion($sql, $input, $type){
    // Types: a, o
    // a significa retorna all (todos), o signficia retorna one (uno, el primero)
    
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

function crear_id($id_column, $table){
    $r = ejecutarQuery("SELECT $id_column FROM $table", null);
    $random = crear_numero_random();
    $r = $r -> fetchAll();
    while (true){
        $existe = false;
        foreach($r as $id){
            $id = $id[$id_column];
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

?>



