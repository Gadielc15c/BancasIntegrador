<?php
include_once('conexion.php');
include_once('../generals.php');

function retornar_seleccion($sql, $input, $type){
    // Types: a, o
    // a significa retorna all (todos), o signficia retorna one (uno, el primero)
    
    $r = ejecutarQuery($sql, $input);
    if ($r->num_rows > 0) {
        if ($type == "a"){
            $array_main = array();
            while($row = $r->fetch_assoc()) {
                array_push($array_main, $row);
            }
            return $array_main;
        } elseif ($type == "o"){
            return $r->fetch_assoc();
        }
    } else {
        return false;
    }

}

function crear_id($id_column, $table){
    
    $r = ejecutarQuery("SELECT * FROM $table", null);
    $random = crear_numero_random();
    $ids = array();

    if ($r->num_rows > 0) {
        while($row = $r->fetch_assoc()) {
            array_push($ids, $row[$id_column]);
        }
        while (true){
            $existe = false;
            foreach($ids as $id){
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
    }
    return $random;
}

function switchRol(){
    switch($_SESSION['nivel']){
        case 1:
            header('location:../frontend/menuMantenimiento.php');
            break;
        case 4:
            header('location:../cliente/inicioCliente.php');
            break;
            default:
        } 
}

?>



