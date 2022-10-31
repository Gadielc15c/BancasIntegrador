<?php
include('sqlquerygenerals.php');



function seleccionar_un_usuario($nomuser){
    $sql = "SELECT nomusuario, correo, cedula, estado FROM terceros WHERE nomusuario=?";
    return retornar_seleccion($sql, array($nomuser));
}

function seleccionar_todos_usuario(){
    $sql = "SELECT nomusuario, correo, cedula, estado FROM terceros";
    return retornar_seleccion($sql, null);

}

$x = seleccionar_todos_usuario();

echo "<pre>";
print_r($x);
echo "</pre>";

?>

