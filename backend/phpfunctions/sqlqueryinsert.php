<?php
include('sqlquerygenerals.php');

function insertar_usuario($nomuser, $claveuser, $correo){
    $nivelacceso = 4; //4 Pertenece al cliente comun
    $id_col = "idterceros";
    $table = "terceros";
    $idterceros = crear_id($id_col, $table);
    $sql = "INSERT INTO $table ($id_col, nomusuario, claveusuario, correo, idnivelacceso_fk) VALUES (?, ?, ?, ?, ?)";
    ejecutarQuery($sql, array($idterceros, $nomuser, $claveuser, $correo, $nivelacceso));
}


insertar_usuario("test5", "ok", "a5@hotmail.com");

?>

