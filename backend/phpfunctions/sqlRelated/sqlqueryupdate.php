<?php

include_once('sqlquerygenerals.php');

// Table tickets

function update_ticket_monto_por_codigobarra($codigobarra, $monto, $monedas_fk = 1){
    $sql = "UPDATE tickets SET monto = ?, monedas_fk = ? WHERE codigobarra = ?";
    $v = ejecutarQuery($sql, array($monto, $monedas_fk, $codigobarra));
    return retorno_booleano_para_updates($v);
}

// Table terceros

function update_tercero_por_idtercero($idter, $nomuser, $correo, $cedula, $estado = 1){
    $sql = "UPDATE terceros SET nomusuario = ?, correo = ?, cedula = ?, estado = ? WHERE idterceros = ?";
    $v =  ejecutarQuery($sql, array($nomuser, $correo, $cedula, $estado, $idter));
    return retorno_booleano_para_updates($v);
}

function update_agregar_terceros_data_por_idtercero($idter, $idterdata){
    $sql = "UPDATE terceros SET idterdata_fk = ? WHERE idterceros = ?";
    $v = ejecutarQuery($sql, array($idterdata, $idter));
    return retorno_booleano_para_updates($v);
}

// Table pago metodos

function update_pagometodos_por_idpagometodos($id, $metodo, $principal){
    $sql = "UPDATE pagometodos SET metodo = ?, principal = ? WHERE idpagometodos = ?";
    $v = ejecutarQuery($sql, array($metodo, $principal, $id));
    return retorno_booleano_para_updates($v);
}


// Table pago tarjeta
function update_pagotarjeta_por_idpagotarjeta($id, $nom, $numerotarj, $cvc, $fechaven, $idtipotarjetas_fk){
    $sql = "UPDATE pagotarjetas SET nombre = ?, numerotarj = ?, cvc = ?, fechaven = ?, idtipotarjetas_fk = ? WHERE idpagotarjetas = ?";
    $v = ejecutarQuery($sql, array($nom, $numerotarj, $cvc, $fechaven, $idtipotarjetas_fk, $id));
    return retorno_booleano_para_updates($v);
}

// table tipo tarjetas

function update_tipotarjeta_por_idtipotarjetas($id, $nom){
    $sql = "UPDATE tipotarjetas SET nombre = ? WHERE idtipotarjetas = ?";
    $v = ejecutarQuery($sql, array($nom, $id));
    return retorno_booleano_para_updates($v);
}

// table monedas

function update_monedas_por_idmonedas($id, $moneda, $nombre, $estado = 1){
    $sql = "UPDATE monedas SET moneda = ?, nombre = ?, estado = ? WHERE idmonedas = ?";
    $v = ejecutarQuery($sql, array($moneda, $nombre, $estado, $id));
    return retorno_booleano_para_updates($v);
}

// table tipo metodo pago

function update_tipometodopago_por_idtipometodopago($id, $nombre, $estado = 1){
    $sql = "UPDATE tipometodopago SET nombre = ?, estado = ? WHERE idtipometodopago = ?";
    $v = ejecutarQuery($sql, array($nombre, $estado, $id));
    return retorno_booleano_para_updates($v);
}

// table sucursal

function update_sucursal_por_idsucursal($id, $nombre, $idterceros_fk = null, $idtelefonos_fk = null, $iddireccion_fk = null, $estado = 1){
    $sql = "UPDATE sucursal SET nombresucursal = ?, idterceros_fk = ?, idtelefonos_fk = ?, iddireccion_fk = ?, estado = ? WHERE idsucursal = ?";
    $v = ejecutarQuery($sql, array($nombre, $idterceros_fk, $idtelefonos_fk, $iddireccion_fk, $estado, $id));
    return retorno_booleano_para_updates($v);
}

// table loterias

function update_loterias_por_idloterias($id, $nombre, $idlothorarios_fk = null, $idterceros_fk = null, $estado = 1){
    $sql = "UPDATE loterias SET nombre = ?, idlothorarios_fk = ?, idterceros_fk = ?, estado = ? WHERE idloterias = ?";
    $v = ejecutarQuery($sql, array($nombre, $idlothorarios_fk, $idterceros_fk, $estado, $id));
    return retorno_booleano_para_updates($v);
}

// TODO funcion que englobe el return de los updates

?>