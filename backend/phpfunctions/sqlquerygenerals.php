<?php
include('conexion.php');
include('generals.php');

function retornar_seleccion($sql, $input){
    $r = ejecutarQuery($sql, $input);

    $array_main = array();
    if ($r->num_rows > 0) {
        while($row = $r->fetch_assoc()) {
            array_push($array_main, $row);
        }
      } 
      return $array_main;
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

// $x = crear_id('idterceros', 'terceros');
// echo $x;

?>



