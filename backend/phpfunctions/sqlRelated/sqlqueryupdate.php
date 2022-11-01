<?php

include_once('sqlquerygenerals.php');

// Table tickets

function update_ticket_monto_por_codigobarra($codigobarra, $monto, $monedas_fk = 1){
    $sql = "UPDATE tickets SET monto = ?, monedas_fk = ? WHERE codigobarra = ?";
    return ejecutarQuery($sql, array($monto, $monedas_fk, $codigobarra));
}

// Table terceros

function update_tercero_por_idtercero($idter, $nomuser, $correo, $cedula, $estado = 1){
    $sql = "UPDATE terceros SET nomusuario = ?, correo = ?, cedula = ?, estado = ? WHERE idterceros = ?";
    return ejecutarQuery($sql, array($nomuser, $correo, $cedula, $estado, $idter));
}

function update_agregar_terceros_data_por_idtercero($idter, $idterdata){
    $sql = "UPDATE terceros SET idterdata_fk = ? WHERE idterceros = ?";
    return ejecutarQuery($sql, array($idterdata, $idter));
}

// Table pago metodos

function update_pagometodos_por_idpagometodos($id, $metodo, $principal){
    $sql = "UPDATE pagometodos SET metodo = ?, principal = ? WHERE idpagometodos = ?";
    return ejecutarQuery($sql, array($metodo, $principal, $id));
}


// Table pago tarjeta
function update_pagotarjeta_por_idpagotarjeta($id, $nom, $numerotarj, $cvc, $fechaven, $idtipotarjetas_fk){
    $sql = "UPDATE pagotarjetas SET nombre = ?, numerotarj = ?, cvc = ?, fechaven = ?, idtipotarjetas_fk = ? WHERE idpagotarjetas = ?";
    return ejecutarQuery($sql, array($nom, $numerotarj, $cvc, $fechaven, $idtipotarjetas_fk, $id));
}

// table tipo tarjetas

function update_tipotarjeta_por_idtipotarjetas($id, $nom){
    $sql = "UPDATE tipotarjetas SET nombre = ? WHERE idtipotarjetas = ?";
    return ejecutarQuery($sql, array($nom, $id));
}

// table monedas

function update_monedas_por_idmonedas($id, $moneda, $nombre, $estado = 1){
    $sql = "UPDATE monedas SET moneda = ?, nombre = ?, estado = ? WHERE idmonedas = ?";
    return ejecutarQuery($sql, array($moneda, $nombre, $estado, $id));
}

// table tipo metodo pago

function update_tipometodopago_por_idtipometodopago($id, $nombre, $estado = 1){
    $sql = "UPDATE tipometodopago SET nombre = ?, estado = ? WHERE idtipometodopago = ?";
    return ejecutarQuery($sql, array($nombre, $estado, $id));
}

?>