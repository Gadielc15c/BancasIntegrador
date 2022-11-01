<?php
include_once('sqlquerygenerals.php');
include_once('sqlqueryselect.php');

function insertar_usuario($nomuser, $claveuser, $correo){
    $nivelacceso = 4; //4 Pertenece al cliente comun
    $idcol = "idterceros";
    $table = "terceros";
    $idterceros = crear_id($idcol, $table);
    $sql = "INSERT INTO $table ($idcol, nomusuario, claveusuario, correo, idnivelacceso_fk) VALUES (?, ?, ?, ?, ?)";
    return ejecutarQuery($sql, array($idterceros, $nomuser, $claveuser, $correo, $nivelacceso));
}

function insertar_ticket($monto, $nomuser, $monedas_fk = 1, $sucursalventa_fk = null, $sucursalpago_fk = null){

    $idcol = "idtickets";
    $table = "tickets";
    $idtick = crear_id($idcol, $table);
    $fecha = fecha_de_hoy();
    $idter = seleccionar_id_tercero_por_nombre($nomuser);
    $codigobarra = crear_tickets_codigo();
    $sql = "INSERT INTO $table ($idcol, monto, monedas_fk, fecha, idterceros_fk, codigobarra) VALUES (?, ?, ?, ?, ?, ?)";
    
    if ($monto < 0){
        return false;
    }
    
    return ejecutarQuery($sql, array($idtick, $monto, $monedas_fk, $fecha, $idter, $codigobarra));
}

insertar_ticket(-1, "test4")

?>
