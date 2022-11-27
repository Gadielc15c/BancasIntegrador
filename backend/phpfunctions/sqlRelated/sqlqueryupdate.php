<?php









// DEPRICATED

// UTILIZA EXECUTE_UPDATE ENCONTRADO EN SQLQUERYGENERAL





















// include_once('sqlquerygenerals.php');

// // Para actualizar los estados debes usar true or false

// // Table tickets

// function update_ticket_monto_por_codigobarra($codigobarra, $monto, $monedas_fk = 1){
//     $sql = "UPDATE tickets SET monto = ?, monedas_fk = ? WHERE codigobarra = ?";
//     $v = ejecutarQuery($sql, array($monto, $monedas_fk, $codigobarra));
//     return retorno_booleano_para_updates($v);
// }

// function update_ticket_por_idtickets($arreglo){
//     // usarse con mantenimientosFunctions update
//     $sql = "UPDATE tickets SET monto = ?, monedas_fk = ?, fecha = ?, jugadas = ?, estado = ? WHERE idtickets = ?";
//     $v =  ejecutarQuery($sql, $arreglo);
//     return retorno_booleano_para_updates($v);
// }

// function update_estado_ticket_por_idtickets($estado, $id){
//     $sql = "UPDATE tickets SET estado = ? WHERE idtickets = ?";
//     $v =  ejecutarQuery($sql, array($estado, $id));
//     return retorno_booleano_para_updates($v);
// }

// // Table terceros

// function update_tercero_por_idtercero($arreglo){
//     // usarse con mantenimientosFunctions update
//     $sql = "UPDATE terceros SET nomusuario = ?, correo = ?, cedula = ?, estado = ? WHERE idterceros = ?";
//     $v =  ejecutarQuery($sql, $arreglo);
//     return retorno_booleano_para_updates($v);
// }

// function update_agregar_terceros_data_por_idtercero($idter, $idterdata){
//     $sql = "UPDATE terceros SET idterdata_fk = ? WHERE idterceros = ?";
//     $v = ejecutarQuery($sql, array($idterdata, $idter));
//     return retorno_booleano_para_updates($v);
// }

// function update_estado_terceros_por_idterceros($estado, $id){
//     $sql = "UPDATE terceros SET estado = ? WHERE idterceros = ?";
//     $v =  ejecutarQuery($sql, array($estado, $id));
//     return retorno_booleano_para_updates($v);
// }

// // Table pago metodos

// function update_pagometodos_por_idpagometodos($id, $metodo, $principal){
//     $sql = "UPDATE pagometodos SET metodo = ?, principal = ? WHERE idpagometodos = ?";
//     $v = ejecutarQuery($sql, array($metodo, $principal, $id));
//     return retorno_booleano_para_updates($v);
// }

// function update_estado_pagometodos_por_idpagometodos($estado, $id){
//     $sql = "UPDATE pagometodos SET estado = ? WHERE idpagometodos = ?";
//     $v =  ejecutarQuery($sql, array($estado, $id));
//     return retorno_booleano_para_updates($v);
// }

// // Table pago tarjeta
// function update_pagotarjeta_por_idpagotarjeta($id, $nom, $numerotarj, $cvc, $fechaven, $idtipotarjetas_fk){
//     $sql = "UPDATE pagotarjetas SET nombre = ?, numerotarj = ?, cvc = ?, fechaven = ?, idtipotarjetas_fk = ? WHERE idpagotarjetas = ?";
//     $v = ejecutarQuery($sql, array($nom, $numerotarj, $cvc, $fechaven, $idtipotarjetas_fk, $id));
//     return retorno_booleano_para_updates($v);
// }

// function update_estado_pagotarjeta_por_idpagotarjeta($estado, $id){
//     $sql = "UPDATE pagotarjetas SET estado = ? WHERE idpagotarjetas = ?";
//     $v =  ejecutarQuery($sql, array($estado, $id));
//     return retorno_booleano_para_updates($v);
// }

// // table tipo tarjetas

// function update_tipotarjeta_por_idtipotarjetas($arreglo){
//     // usarse con mantenimientosFunctions update
//     $sql = "UPDATE tipotarjetas SET nombre = ?, estado = ? WHERE idtipotarjetas = ?";
//     $v = ejecutarQuery($sql, $arreglo);
//     return retorno_booleano_para_updates($v);
// }

// function update_estado_tipotarjetas_por_idtipotarjetas($estado, $id){
//     $sql = "UPDATE tipotarjetas SET estado = ? WHERE idtipotarjetas = ?";
//     $v =  ejecutarQuery($sql, array($estado, $id));
//     return retorno_booleano_para_updates($v);
// }

// // table monedas

// function update_monedas_por_idmonedas($arreglo){
//     // usarse con mantenimientosFunctions update
//     $sql = "UPDATE monedas SET moneda = ?, nombre = ?, estado = ? WHERE idmonedas = ?";
//     $v = ejecutarQuery($sql, $arreglo);
//     return retorno_booleano_para_updates($v);
// }

// function update_estado_monedas_por_idmonedas($estado, $id){
//     $sql = "UPDATE monedas SET estado = ? WHERE idmonedas = ?";
//     $v =  ejecutarQuery($sql, array($estado, $id));
//     return retorno_booleano_para_updates($v);
// }

// // table tipo metodo pago

// function update_tipometodopago_por_idtipometodopago($arreglo){
//     // usarse con mantenimientosFunctions update
//     $sql = "UPDATE tipometodopago SET nombre = ?, estado = ? WHERE idtipometodopago = ?";
//     $v = ejecutarQuery($sql, $arreglo);
//     return retorno_booleano_para_updates($v);
// }

// function update_estado_tipometodopago_por_idtipometodopago($estado, $id){
//     $sql = "UPDATE tipometodopago SET estado = ? WHERE idtipometodopago = ?";
//     $v =  ejecutarQuery($sql, array($estado, $id));
//     return retorno_booleano_para_updates($v);
// }

// // table sucursal

// function update_sucursal_por_idsucursal($arreglo){
//     // usarse con mantenimientosFunctions update
//     $sql = "UPDATE sucursal SET nombresucursal = ?, idterceros_fk = ?, idtelefonos_fk = ?, iddireccion_fk = ?, estado = ? WHERE idsucursal = ?";
//     $v = ejecutarQuery($sql, $arreglo);
//     return retorno_booleano_para_updates($v);
// }

// function update_estado_sucursal_por_idsucursal($estado, $id){
//     $sql = "UPDATE sucursal SET estado = ? WHERE idsucursal = ?";
//     $v =  ejecutarQuery($sql, array($estado, $id));
//     return retorno_booleano_para_updates($v);
// }

// // table loterias

// function update_loterias_por_idloterias($arreglo){
//     // usarse con mantenimientosFunctions update
//     $sql = "UPDATE loterias SET nombre = ?, idterceros_fk = ?, estado = ? WHERE idloterias = ?";
//     $v = ejecutarQuery($sql, $arreglo);
//     return retorno_booleano_para_updates($v);
// }

// function update_estado_loterias_por_idloterias($estado, $id){
//     $sql = "UPDATE loterias SET estado = ? WHERE idloterias = ?";
//     $v =  ejecutarQuery($sql, array($estado, $id));
//     return retorno_booleano_para_updates($v);
// }



// // table tipo jugadas

// function update_tipojugadas_por_idtipojugadas($arreglo){
//     $sql = "UPDATE tipojugadas SET nombre = ?, idloteria_fk = ?, estado = ? WHERE idtipojugadas = ?";
//     $v = ejecutarQuery($sql, $arreglo);
//     return retorno_booleano_para_updates($v);
// }

// function update_estado_tipojugadas_por_idtipojugadas($estado, $id){
//     $sql = "UPDATE tipojugadas SET estado = ? WHERE idtipojugadas = ?";
//     $v = ejecutarQuery($sql, array($estado, $id));
//     return retorno_booleano_para_updates($v);
// }

// // table jugadas

// function update_jugadas_por_idjugadas($arreglo){
//     $sql = "UPDATE jugadas SET jugnumeros = ?, idtipojugada_fk = ?, idticket_fk = ?, estado = ? WHERE idjugadas = ?";
//     $v = ejecutarQuery($sql, $arreglo);
//     return retorno_booleano_para_updates($v);
// }

// function update_estado_jugadas_por_idjugadas($estado, $id){
//     $sql = "UPDATE jugadas SET estado = ? WHERE idjugadas = ?";
//     $v = ejecutarQuery($sql, array($estado, $id));
//     return retorno_booleano_para_updates($v);
// }

// // table ticketsvspagosrealizados

// function update_ticketsvspagosrealizados_por_idtpr($arreglo){
//     $sql = "UPDATE ticketsvspagosrealizados SET idtickets_fk = ?, idpagosrealizados_fk = ?, estado = ? WHERE idtpr = ?";
//     $v = ejecutarQuery($sql, $arreglo);
//     return retorno_booleano_para_updates($v);
// }

// function update_estado_ticketsvspagosrealizados_por_idtpr($estado, $id){
//     $sql = "UPDATE ticketsvspagosrealizados SET estado = ? WHERE idtpr = ?";
//     $v = ejecutarQuery($sql, array($estado, $id));
//     return retorno_booleano_para_updates($v);
// }

// // table pagosrealizados

// function update_pagosrealizados_por_idpagosrealizados($arreglo){
//     $sql = "UPDATE pagosrealizados SET montototal = ?, fecha = ?, monedas_fk = ?, origen_fk = ?, idterceros_fk = ?, estado = ? WHERE idpagosrealizados = ?";
//     $v = ejecutarQuery($sql, $arreglo);
//     return retorno_booleano_para_updates($v);
// }

// function update_estado_pagosrealizados_por_idpagosrealizados($estado, $id){
//     $sql = "UPDATE pagosrealizados SET estado = ? WHERE idpagosrealizados = ?";
//     $v = ejecutarQuery($sql, array($estado, $id));
//     return retorno_booleano_para_updates($v);
// }

// // table tablajugadaventadeticket

// function update_tablajugadaventadeticket_estoyharto_por_idtercero(string $jugadas, $id){
//     $sql = "UPDATE tablajugadaventadeticket SET jugadas = ?, fecha = ? WHERE idterceros_fk = ?";
//     $v = ejecutarQuery($sql, array($jugadas, fecha_de_hoy(), $id));
//     return retorno_booleano_para_updates($v);
// }

// // Para actualizar los estados debes usar true or false

?>