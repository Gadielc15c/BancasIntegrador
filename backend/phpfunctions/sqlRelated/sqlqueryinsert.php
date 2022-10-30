<?php
include_once('sqlquerygenerals.php');

function insertar_usuario($nomuser, $claveuser, $correo){
    $nivelacceso = 4; //4 Pertenece al cliente comun
    $id_col = "idterceros";
    $table = "terceros";
    $idterceros = crear_id($id_col, $table);
    $sql = "INSERT INTO $table ($id_col, nomusuario, claveusuario, correo, idnivelacceso_fk) VALUES (?, ?, ?, ?, ?)";
    ejecutarQuery($sql, array($idterceros, $nomuser, $claveuser, $correo, $nivelacceso));
}

function insertar_ticket($monto, $nomuser, $fecha, $monedas_fk = 1, $sucursalventa_fk = null, $sucursalpago_fk = null){
    

    $id_col = "idtickets";
    $table = "tickets";
    $id_ter = seleccionar_id_tercero_por_nombre($nomuser);
    $id_tick = crear_id($id_col, $table);
    $codigobarra = crear_tickets_codigo();
    $sql = "INSERT INTO $table ($id_col, monto, )";





}


insertar_usuario("test4", "ok", "aa4@hotmail.com");

?>

