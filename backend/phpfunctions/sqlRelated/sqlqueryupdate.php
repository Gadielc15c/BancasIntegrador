<?php

include_once('sqlquerygenerals.php');

// Table tickets

function update_ticket_monto_por_codigobarra($codigobarra, $monto, $monedas_fk = 1){
    $sql = "UPDATE tickets SET monto = ?, monedas_fk = ? WHERE codigobarra = ?";
    $v = ejecutarQuery($sql, array($monto, $monedas_fk, $codigobarra));
    return retorno_booleano_para_updates($v);
}

function update_ticket_por_idtickets($arreglo){
    // usarse con mantenimientosFunctions update
    $sql = "UPDATE tickets SET monto = ?, monedas_fk = ?, fecha = ?, estado = ? WHERE idtickets = ?";
    $v =  ejecutarQuery($sql, $arreglo);
    return retorno_booleano_para_updates($v);
}

// Table terceros

function update_tercero_por_idtercero($arreglo){
    // usarse con mantenimientosFunctions update
    $sql = "UPDATE terceros SET nomusuario = ?, correo = ?, cedula = ?, estado = ? WHERE idterceros = ?";
    $v =  ejecutarQuery($sql, $arreglo);
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

function update_tipotarjeta_por_idtipotarjetas($arreglo){
    // usarse con mantenimientosFunctions update
    $sql = "UPDATE tipotarjetas SET nombre = ?, estado = ? WHERE idtipotarjetas = ?";
    $v = ejecutarQuery($sql, $arreglo);
    return retorno_booleano_para_updates($v);
}

// table monedas

function update_monedas_por_idmonedas($arreglo){
    // usarse con mantenimientosFunctions update
    $sql = "UPDATE monedas SET moneda = ?, nombre = ?, estado = ? WHERE idmonedas = ?";
    $v = ejecutarQuery($sql, $arreglo);
    return retorno_booleano_para_updates($v);
}

// table tipo metodo pago

function update_tipometodopago_por_idtipometodopago($arreglo){
    // usarse con mantenimientosFunctions update
    $sql = "UPDATE tipometodopago SET nombre = ?, estado = ? WHERE idtipometodopago = ?";
    $v = ejecutarQuery($sql, $arreglo);
    return retorno_booleano_para_updates($v);
}

// table sucursal

function update_sucursal_por_idsucursal($arreglo){
    // usarse con mantenimientosFunctions update
    $sql = "UPDATE sucursal SET nombresucursal = ?, idterceros_fk = ?, idtelefonos_fk = ?, iddireccion_fk = ?, estado = ? WHERE idsucursal = ?";
    $v = ejecutarQuery($sql, $arreglo);
    return retorno_booleano_para_updates($v);
}

// table loterias

function update_loterias_por_idloterias($arreglo){
    // usarse con mantenimientosFunctions update
    $sql = "UPDATE loterias SET nombre = ?, idlothorarios_fk = ?, idterceros_fk = ?, estado = ? WHERE idloterias = ?";
    $v = ejecutarQuery($sql, $arreglo);
    return retorno_booleano_para_updates($v);
}

// TODO funcion que englobe el return de los updates

?>