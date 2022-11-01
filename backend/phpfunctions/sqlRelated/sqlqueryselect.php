<?php
include_once('sqlquerygenerals.php');

// Table terceros

function seleccionar_un_usuario_por_nombre($nomuser){
    $sql = "SELECT nomusuario, correo, cedula, estado FROM terceros WHERE nomusuario=?";
    return retornar_seleccion($sql, array($nomuser), "o");
}

function seleccionar_un_usuario_por_idtercero($id){
    $sql = "SELECT nomusuario, correo, cedula, estado FROM terceros WHERE idterceros=?";
    return retornar_seleccion($sql, array($id), "o");
}

function seleccionar_todos_usuario(){
    $sql = "SELECT idterceros, nomusuario, correo, cedula, estado FROM terceros";
    return retornar_seleccion($sql, null, "a");
}

function seleccionar_id_tercero_por_nombre($nomuser){
    $col = "idterceros";
    $sql = "SELECT $col FROM terceros WHERE nomusuario = ?";
    return retorno_para_un_select($col, $sql, array($nomuser));
}

// Table nivel acceso

function seleccionar_idnivelaccesofk_por_nombre_clave($nomuser, $claveuser){
    $col = "idnivelacceso_fk";
    $sql = "SELECT $col FROM terceros WHERE nomusuario = ? AND claveusuario = ?";
    return retorno_para_un_select($col, $sql, array($nomuser, $claveuser));
}

// Table Tickets

function seleccionar_id_ticket_por_codigobarra($codigobarra){
    $col = "idtickets";
    $sql = "SELECT $col FROM tickets WHERE codigobarra = ?";
    return retorno_para_un_select($col, $sql, array($codigobarra));
}

function seleccionar_ticket_por_idticket($id){
    $sql = "SELECT monto, monedas_fk, fecha, estado, idterceros_fk, codigobarra FROM tickets WHERE idtickets = ?";
    return retornar_seleccion($sql, array($id), "o");
}

function seleccionar_todos_tickets(){
    $sql = "SELECT idtickets, monto, monedas_fk, fecha, estado, idterceros_fk, codigobarra FROM tickets";
    return retornar_seleccion($sql, null, "a");
}

// Table monedas

function seleccionar_moneda_por_idmonedas($id){
    $sql = "SELECT moneda, nombre, estado FROM monedas WHERE idmonedas = ?";
    return retornar_seleccion($sql, array($id), "o");
}

function seleccionar_todas_monedas(){
    $sql = "SELECT idmonedas, moneda, nombre, estado FROM monedas";
    return retornar_seleccion($sql, null, "a");
}

// Table tipo tarjeta

function seleccionar_idtipotarjeta_por_nombre($nom){
    $col = "idtipotarjetas";
    $sql = "SELECT $col FROM tipotarjetas WHERE nombre = ?";
    return retorno_para_un_select($col, $sql, array($nom));
}

function seleccionar_nombre_por_idtipotarjetas($id){
    $col = "nombre";
    $sql = "SELECT $col FROM tipotarjetas WHERE idtipotarjetas = ?";
    return retorno_para_un_select($col, $sql, array($id));
}

function seleccionar_todos_tipo_tarjeta(){
    $sql = "SELECT idtipotarjetas, nombre,estado FROM tipotarjetas";
    return retornar_seleccion($sql, null, "a");
}

// Table pago metodos

function seleccionar_todos_metodos_por_idtercero($idter){
    $sql = "SELECT idpagometodos, metodo_fk, principal FROM pagometodos WHERE idterceros_fk = ?";
    return retornar_seleccion($sql, array($idter), "a");

}

function seleccionar_pagometodos_por_idtercero($idter){
    // Puede retornar varios array
    $sql = "SELECT idpagometodos, metodo_fk, principal FROM pagometodos WHERE idterceros_fk = ?";
    return retornar_seleccion($sql, array($idter), "a");
}

function seleccionar_idpagometodos_por_metodo($metodo){
    // @param @metodo       ejemplo Credito, Paypal, Debito, etc
    $col = "idpagometodos";
    $sql = "SELECT $col FROM pagometodos WHERE metodo_fk = ?";
    return retorno_para_un_select($col, $sql, array($metodo));
}

function seleccionar_metodofk_por_idpagometodos($id){
    $col = "metodo_fk";
    $sql = "SELECT $col FROM pagometodos WHERE idpagometodos = ?";
    return retorno_para_un_select($col, $sql, array($id));
}

// Table pago tarjetas

function seleccionar_pagotarjeta_por_idpagotarjetas($id){
    $col = "idpagotarjetas";
    $sql = "SELECT $col, nombre, numerotarj, cvc, fechaven, idpagometodos_fk, idtipotarjetas_fk FROM pagotarjetas WHERE idpagotarjetas = ?";
    return retorno_para_un_select($col, $sql, array($id));
}

function seleccionar_pagotarjeta_por_idpagometodos_fk($id){
    // Puede teronar varios array
    $sql = "SELECT idpagotarjetas, nombre, numerotarj, cvc, fechaven, idpagometodos_fk, idtipotarjetas_fk FROM pagotarjetas WHERE idpagometodos_fk = ?";
    return retornar_seleccion($sql, array($id), "a");
}

function seleccionar_pagotarjeta_por_idtipotarjetas_fk($id){
    // Puede retonar varios array
    $sql = "SELECT idpagotarjetas, nombre, numerotarj, cvc, fechaven, idpagometodos_fk, idtipotarjetas_fk FROM pagotarjetas WHERE idtipotarjetas_fk = ?";
    return retornar_seleccion($sql, array($id), "a");
}

function seleccionar_pagotarjeta_por_numerotarj($numerotarj){
    $col = "idpagotarjetas";
    $sql = "SELECT $col, nombre, numerotarj, cvc, fechaven, idpagometodos_fk, idtipotarjetas_fk FROM pagotarjetas WHERE numerotarj = ?";
    return retornar_seleccion($sql, array($numerotarj), "o");
}

// Table Tipo Metodo Pago

function seleccionar_todos_tipometodopago(){
    $sql = "SELECT idtipometodopago, nombre, estado FROM tipometodopago";
    return retornar_seleccion($sql, null, "a");
}

function seleccionar_tipometodopago_por_nombre($nom){
    $col = "nombre";
    $sql = "SELECT idtipometodopago, $col, estado FROM tipometodopago WHERE $col = ?";
    return retornar_seleccion($sql, array($nom), "o");
}

function seleccionar_tipometodopago_por_idtipometodopago($id){
    $col = "idtipometodopago";
    $sql = "SELECT $col, nombre, estado FROM tipometodopago WHERE $col = ?";
    return retornar_seleccion($sql, array($id), "o");
}

// Table sucursal

function seleccionar_todas_sucursales(){
    $sql = "SELECT idsucursal, nombresucursal, idterceros_fk, idtelefonos_fk, iddireccion_fk, estado FROM sucursal";
    return retornar_seleccion($sql, null, "a");
}

function seleccionar_sucursal_por_idsucursal($id){
    $col = "idsucursal";
    $sql = "SELECT $col, nombresucursal, idterceros_fk, idtelefonos_fk, iddireccion_fk, estado FROM sucursal WHERE $col = ?";
    return retornar_seleccion($sql, array($id), "o");
}

function seleccionar_sucursal_por_nombresucursal($nom){
    // Puede retonar varios array
    $col = "nombresucursal";
    $sql = "SELECT idsucursal, $col, idterceros_fk, idtelefonos_fk, iddireccion_fk, estado FROM sucursal WHERE $col = ?";
    return retornar_seleccion($sql, array($nom), "a");
}

// agregar mas adelante por foreign key: tercero, direccion y telefono

// Table loteria

function seleccionar_todas_loterias(){
    $sql = "SELECT idloterias, nombre, idlothorarios_fk, idterceros_fk, estado FROM loterias";
    return retornar_seleccion($sql, null, "a");
}

function seleccionar_loterias_por_idloterias($id){
    $col = "idloterias";
    $sql = "SELECT $col, nombre, idlothorarios_fk, idterceros_fk, estado FROM loterias WHERE $col = ?";
    return retornar_seleccion($sql, array($id), "0");
}

function seleccionar_loterias_por_nombre($nom){
    // Puede retonar varios array
    $col = "nombre";
    $sql = "SELECT idloterias, $col, idlothorarios_fk, idterceros_fk, estado FROM loterias WHERE $col = ?";
    return retornar_seleccion($sql, array($nom), "a");
    
}

// agregar mas adelante por foreign key: horario y terceros

?>
