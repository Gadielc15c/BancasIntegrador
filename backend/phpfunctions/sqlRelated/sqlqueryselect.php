<?php
include_once('sqlquerygenerals.php');

function seleccionar_un_usuario_por_nombre($nomuser){
    $sql = "SELECT nomusuario, correo, cedula, estado FROM terceros WHERE nomusuario=?";
    return retornar_seleccion($sql, array($nomuser), "o");
}

function seleccionar_todos_usuario(){
    $sql = "SELECT nomusuario, correo, cedula, estado FROM terceros";
    return retornar_seleccion($sql, null, "a");
}

function seleccionar_idnivelaccesofk_por_nombre_clave($nomuser, $claveuser){
    $column = "idnivelacceso_fk";
    $sql = "SELECT $column FROM terceros WHERE nomusuario = ? AND claveusuario = ?";
    $row = retornar_seleccion($sql, array($nomuser, $claveuser), "o");
    if ($row != false){
        return $row[$column];
    }
    
    return false;
}

/* 
$x = seleccionar_id_usuario_por_nombre_clave("usuario12", "1515");
echo $x;
echo "<pre>";
print_r($x);
echo "</pre>";
 */
?>

