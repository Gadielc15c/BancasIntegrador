<?php

include_once('sqlquerygenerals.php');

function update_ticket_monto_por_codigobarra($codigobarra, $monto, $monedas_fk = 1){
    $sql = "UPDATE tickets SET monto = ?, monedas_fk = ? WHERE codigobarra = ?";
    return ejecutarQuery($sql, array($monto, $monedas_fk, $codigobarra));
}

function update_tercero_por_idtercero($idter, $nomuser, $correo, $cedula, $estado = 1){
    $sql = "UPDATE terceros SET nomusuario = ?, correo = ?, cedula = ?, estado = ? WHERE idterceros = ?";
    return ejecutarQuery($sql, array($nomuser, $correo, $cedula, $estado, $idter));
}

function update_agregar_terceros_data_por_idtercero($idter, $idterdata){
    $sql = "UPDATE terceros SET idterdata_fk = ? WHERE idterceros = ?";
    return ejecutarQuery($sql, array($idterdata, $idter));
}


?>