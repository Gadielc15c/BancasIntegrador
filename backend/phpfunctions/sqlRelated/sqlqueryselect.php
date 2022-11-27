<?php









// DEPRICATED

// UTILIZA EXECUTE_SELECT ENCONTRADO EN SQLQUERYGENERAL





















// include_once('sqlquerygenerals.php');
// include_once(dirname(__FILE__, 4) . '/backend/phpfunctions/generals.php');
// include_once(dirname(__FILE__, 4) . '/backend/llavesYTextos.php');


// function prueba_seleccionar_un_usuario_por_nombre_y_clave($nomuser, $clave){
//     $table = "terceros";
//     $sql = "SELECT idterceros, nomusuario, correo, cedula, estado, idnivelacceso_fk FROM $table WHERE nomusuario = ? AND claveusuario = ?";
//     global $dbtercerosid; global $dbusername; global $dbuseremail; global $dbusercedula; global $dbuserestado; global $dbusernivelaccfk;
//     $llaves = [$dbtercerosid, $dbusername, $dbuseremail, $dbusercedula, $dbuserestado, $dbusernivelaccfk];
//     return retornar_seleccion_con_llaves($sql, array($nomuser, $clave), $llaves);
// }

// // Table terceros

// function seleccionar_un_usuario_por_nombre($nomuser){
//     $sql = "SELECT nomusuario, correo, cedula, estado FROM terceros WHERE nomusuario = ?";
//     return retornar_seleccion($sql, array($nomuser), "o");
// }

// function seleccionar_un_usuario_por_idtercero(int $id, array $custom_keys = null){
//     // usarse con mantenimientosFunctions update
//     $sql = "SELECT * FROM terceros WHERE idterceros=?";
//     return execute_select($sql, func_get_args());
// }

// function seleccionar_todos_usuario(){
//     // usarse con mantenimientosFunctions form
//     $sql = "SELECT idterceros, nomusuario, claveusuario, idterdata_fk, correo, cedula, estado, idtelefonos_fk, recibirpago, idnivelacceso_fk FROM terceros";
//     return retornar_seleccion($sql, null, "a");
// }

// function seleccionar_id_tercero_por_nombre($nomuser){
//     $col = "idterceros";
//     $sql = "SELECT $col FROM terceros WHERE nomusuario = ?";
//     return retorno_para_un_select($col, $sql, array($nomuser));
// }

// // Table nivel acceso

// function seleccionar_todos_nivelacceso(){
//     // usarse con mantenimientosFunctions form
//     $sql = "SELECT idnivelacceso, nombre, descrip FROM nivelacceso";
//     return retornar_seleccion($sql, null, "a");
// }

// function seleccionar_idnivelaccesofk_por_nombre_clave($nomuser, $claveuser){
//     $col = "idnivelacceso_fk";
//     $sql = "SELECT $col FROM terceros WHERE nomusuario = ? AND claveusuario = ?";
//     return retorno_para_un_select($col, $sql, array($nomuser, $claveuser));
// }

// function seleccionar_un_nivelacces_por_id($id){
//     // usarse con mantenimientosFunctions update
//     $sql = "SELECT idnivelacceso, nombre, descrip FROM nivelacceso WHERE idnivelacceso = ?";
//     return retornar_seleccion($sql, array($id), "o");
// }

// // Table Tickets

// function seleccionar_tickets_por_codigobarra($codigobarra){
//     $col = "idtickets";
//     $sql = "SELECT $col, monto, monedas_fk, fecha, jugadas, estado, idterceros_fk, codigobarra, idsucursalventa_fk, idsucursalpago_fk FROM tickets WHERE codigobarra = ?";
//     return retornar_seleccion($sql, array($codigobarra), "a");
// }

// function seleccionar_ticket_por_idticket($id){
//     // usarse con mantenimientosFunctions update
//     $sql = "SELECT idtickets, monto, monedas_fk, fecha, estado, idterceros_fk, codigobarra, idsucursalventa_fk, idsucursalpago_fk FROM tickets WHERE idtickets = ?";
//     return retornar_seleccion($sql, array($id), "o");
// }

// function seleccionar_todos_tickets(){
//     // usarse con mantenimientosFunctions form
//     $sql = "SELECT idtickets, monto, monedas_fk, fecha, estado, idterceros_fk, codigobarra, idsucursalventa_fk, idsucursalpago_fk FROM tickets";
//     return retornar_seleccion($sql, null, "a");
// }

// // Table tipo jugadas

// function seleccionar_todos_tipojugadas_por_idloteria_fk($idloteria_fk){
//     $sql = "SELECT idtipojugadas, nombre, idloteria_fk, estado FROM tipojugadas WHERE idloteria_fk = ?";
//     return retornar_seleccion($sql, array($idloteria_fk), "a");
// }

// function seleccionar_todos_tipojugadas(){
//     // usarse con mantenimientosFunctions form
//     $sql = "SELECT idtipojugadas, nombre, idloteria_fk, estado FROM tipojugadas";
//     return retornar_seleccion($sql, null, "a");
// }

// // Table lot horarios       ya no existe

// // function seleccionar_todos_lothorarios(){
// //     // usarse con mantenimientosFunctions form
// //     $sql = "SELECT idlothorarios, dialaboral, horainicio, horacierre, diasorteo, horasorteo, estado FROM lothorarios";
// //     return retornar_seleccion($sql, null, "a");
// // }

// // function seleccionar_todos_lothorarios_por_diasorteo($diasorteo){
// //     // @param diasorteo     debe esta en el formato descrito en el insert_lothorarios
// //     // Puede retornar varios valores
// //     $sql = "SELECT idlothorarios, dialaboral, horainicio, horacierre, diasorteo, horasorteo, estado FROM lothorarios WHERE diasorteo = ?";
// //     return retornar_seleccion($sql, array($diasorteo), "a");
// // }

// // Table monedas

// function seleccionar_moneda_por_idmonedas($id){
//     // usarse con mantenimientosFunctions update
//     $sql = "SELECT idmonedas, moneda, nombre, estado FROM monedas WHERE idmonedas = ?";
//     return retornar_seleccion($sql, array($id), "o");
// }

// function seleccionar_todas_monedas(){
//     // usarse con mantenimientosFunctions form
//     $sql = "SELECT idmonedas, moneda, nombre, estado FROM monedas";
//     return retornar_seleccion($sql, null, "a");
// }

// // Table tipo tarjeta

// function seleccionar_idtipotarjeta_por_nombre($nom){
//     $col = "idtipotarjetas";
//     $sql = "SELECT $col FROM tipotarjetas WHERE nombre = ?";
//     return retorno_para_un_select($col, $sql, array($nom));
// }

// function seleccionar_nombre_por_idtipotarjetas($id){
//     $col = "nombre";
//     $sql = "SELECT $col FROM tipotarjetas WHERE idtipotarjetas = ?";
//     return retorno_para_un_select($col, $sql, array($id));
// }

// function seleccionar_todos_tipo_tarjeta(){
//     // usarse con mantenimientosFunctions form
//     $sql = "SELECT idtipotarjetas, nombre, estado FROM tipotarjetas";
//     return retornar_seleccion($sql, null, "a");
// }

// function seleccionar_un_tipotarjeta_por_idtipotarjeta($id){
//     // usarse con mantenimientosFunctions update
//     $sql = "SELECT idtipotarjetas, nombre, estado FROM tipotarjetas WHERE idtipotarjetas = ?";
//     return retornar_seleccion($sql, array($id), "o");
// }

// // Table pago metodos

// function seleccionar_todos_metodos_por_idtercero(){
//     // usarse con mantenimientosFunctions form
//     $sql = "SELECT idpagometodos, metodo_fk, principal, idterceros_fk FROM pagometodos";
//     return retornar_seleccion($sql, null, "a");
// }

// function seleccionar_pagometodos_por_idtercero($idter){
//     // Puede retornar varios array
//     $sql = "SELECT idpagometodos, metodo_fk, principal FROM pagometodos WHERE idterceros_fk = ?";
//     return retornar_seleccion($sql, array($idter), "a");
// }

// function seleccionar_idpagometodos_por_metodo($metodo){
//     // @param @metodo       ejemplo Credito, Paypal, Debito, etc
//     $col = "idpagometodos";
//     $sql = "SELECT $col FROM pagometodos WHERE metodo_fk = ?";
//     return retorno_para_un_select($col, $sql, array($metodo));
// }

// function seleccionar_metodofk_por_idpagometodos($id){
//     $col = "metodo_fk";
//     $sql = "SELECT $col FROM pagometodos WHERE idpagometodos = ?";
//     return retorno_para_un_select($col, $sql, array($id));
// }

// function seleccionar_pagometodos_por_idpagometodos($id){
//     // usarse con mantenimientosFunctions update
//     $sql = "SELECT idpagometodos, metodo_fk, principal, idterceros_fk FROM pagometodos WHERE idpagometodos = ?";
//     return retornar_seleccion($sql, array($id), "o");
// }

// // Table pago tarjetas

// function seleccionar_todo_pagotarjetas(){
//     // usarse con mantenimientosFunctions form
//     $sql = "SELECT idpagotarjetas, nombre, numerotarj, cvc, fechaven, idpagometodos_fk, idtipotarjetas_fk FROM pagotarjetas";
//     return retornar_seleccion($sql, null, "a");
// }

// function seleccionar_pagotarjeta_por_idpagotarjetas($id){
//     // usarse con mantenimientosFunctions update
//     $sql = "SELECT idpagotarjetas, nombre, numerotarj, cvc, fechaven, idpagometodos_fk, idtipotarjetas_fk FROM pagotarjetas WHERE idpagotarjetas = ?";
//     return retornar_seleccion($sql, array($id), "o");
// }

// function seleccionar_pagotarjeta_por_idpagometodos_fk($id){
//     // Puede teronar varios array
//     $sql = "SELECT idpagotarjetas, nombre, numerotarj, cvc, fechaven, idpagometodos_fk, idtipotarjetas_fk FROM pagotarjetas WHERE idpagometodos_fk = ?";
//     return retornar_seleccion($sql, array($id), "a");
// }

// function seleccionar_pagotarjeta_por_idtipotarjetas_fk($id){
//     // Puede retonar varios array
//     $sql = "SELECT idpagotarjetas, nombre, numerotarj, cvc, fechaven, idpagometodos_fk, idtipotarjetas_fk FROM pagotarjetas WHERE idtipotarjetas_fk = ?";
//     return retornar_seleccion($sql, array($id), "a");
// }

// function seleccionar_pagotarjeta_por_numerotarj($numerotarj){
//     $col = "idpagotarjetas";
//     $sql = "SELECT $col, nombre, numerotarj, cvc, fechaven, idpagometodos_fk, idtipotarjetas_fk FROM pagotarjetas WHERE numerotarj = ?";
//     return retornar_seleccion($sql, array($numerotarj), "o");
// }

// // Table Tipo Metodo Pago

// function seleccionar_todos_tipometodopago(){
//     // usarse con mantenimientosFunctions form
//     $sql = "SELECT idtipometodopago, nombre, estado FROM tipometodopago";
//     return retornar_seleccion($sql, null, "a");
// }

// function seleccionar_tipometodopago_por_nombre($nom){
//     $col = "nombre";
//     $sql = "SELECT idtipometodopago, $col, estado FROM tipometodopago WHERE $col = ?";
//     return retornar_seleccion($sql, array($nom), "o");
// }

// function seleccionar_tipometodopago_por_idtipometodopago($id){
//     // usarse con mantenimientosFunctions update
//     $sql = "SELECT idtipometodopago, nombre, estado FROM tipometodopago WHERE idtipometodopago = ?";
//     return retornar_seleccion($sql, array($id), "o");
// }

// // Table sucursal

// function seleccionar_todas_sucursales(){
//     // usarse con mantenimientosFunctions form
//     $sql = "SELECT idsucursal, nombresucursal, idterceros_fk, idtelefonos_fk, iddireccion_fk, estado FROM sucursal";
//     return retornar_seleccion($sql, null, "a");
// }

// function seleccionar_sucursal_por_idsucursal($id){
//     // usarse con mantenimientosFunctions update
//     $sql = "SELECT idsucursal, nombresucursal, idterceros_fk, idtelefonos_fk, iddireccion_fk, estado FROM sucursal WHERE idsucursal = ?";
//     return retornar_seleccion($sql, array($id), "o");
// }

// function seleccionar_sucursal_por_nombresucursal($nom){
//     // Puede retonar varios array
//     $col = "nombresucursal";
//     $sql = "SELECT idsucursal, $col, idterceros_fk, idtelefonos_fk, iddireccion_fk, estado FROM sucursal WHERE $col = ?";
//     return retornar_seleccion($sql, array($nom), "a");
// }

// // agregar mas adelante por foreign key: tercero, direccion y telefono

// // Table loteria

// function seleccionar_todas_loterias(){
//     // usarse con mantenimientosFunctions form
//     $sql = "SELECT idloterias, nombre, idterceros_fk, estado FROM loterias";
//     return retornar_seleccion($sql, null, "a");
// }

// function seleccionar_loterias_por_idloterias($id){
//     // usarse con mantenimientosFunctions update
//     $sql = "SELECT idloterias, nombre, idterceros_fk, estado FROM loterias WHERE idloterias = ?";
//     return retornar_seleccion($sql, array($id), "o");
// }

// function seleccionar_loterias_por_nombre($nom){
//     // Puede retonar varios array
//     $col = "nombre";
//     $sql = "SELECT idloterias, $col, idterceros_fk, estado FROM loterias WHERE $col = ?";
//     return retornar_seleccion($sql, array($nom), "a");
// }

// // table ticketsvspagosrealizados

// function seleccionar_todos_ticketsvspagosrealizados(){
//     $sql = "SELECT idtpr, idtickets_fk, idpagosrealizados_fk FROM ticketsvspagosrealizados";
//     return retornar_seleccion($sql, null, "a");
// }

// function seleccionar_ticketsvspagosrealizados_por_idtpr($id){
//     $sql = "SELECT idtpr, idtickets_fk, idpagosrealizados_fk FROM ticketsvspagosrealizados WHERE idtpr = ?";
//     return retornar_seleccion($sql, array($id), "o");
// }

// function seleccionar_ticketsvspagosrealizados_por_idtickets_fk($id){
//     // Puede retonar varios array
//     $sql = "SELECT idtpr, idtickets_fk, idpagosrealizados_fk FROM ticketsvspagosrealizados WHERE idtickets_fk = ?";
//     return retornar_seleccion($sql, array($id), "a");
// }

// function seleccionar_ticketsvspagosrealizados_por_idpagosrealizados_fk($id){
//     // Puede retonar varios array
//     $sql = "SELECT idtpr, idtickets_fk, idpagosrealizados_fk FROM ticketsvspagosrealizados WHERE idpagosrealizados_fk = ?";
//     return retornar_seleccion($sql, array($id), "a");
// }

// // table pagosrealizados

// function seleccionar_todos_pagosrealizados(){
//     $sql = "SELECT idpagosrealizados, montototal, fecha, monedas_fk, origen_fk, idterceros_fk, estado FROM pagosrealizados";
//     return retornar_seleccion($sql, null, "a");
// }

// function seleccionar_pagosrealizados_por_idpagosrealizados($id){
//     $sql = "SELECT idpagosrealizados, montototal, fecha, monedas_fk, origen_fk, idterceros_fk, estado FROM pagosrealizados WHERE idpagosrealizados = ?";
//     return retornar_seleccion($sql, array($id), "o");
// }

// function seleccionar_pagosrealizados_por_monedas_fk($id){
//     // Puede retonar varios array
//     $sql = "SELECT idpagosrealizados, montototal, fecha, monedas_fk, origen_fk, idterceros_fk, estado FROM pagosrealizados WHERE monedas_fk = ?";
//     return retornar_seleccion($sql, array($id), "a");
// }

// function seleccionar_pagosrealizados_por_origen_fk($id){
//     // Puede retonar varios array
//     $sql = "SELECT idpagosrealizados, montototal, fecha, monedas_fk, origen_fk, idterceros_fk, estado FROM pagosrealizados WHERE origen_fk = ?";
//     return retornar_seleccion($sql, array($id), "a");
// }

// function seleccionar_pagosrealizados_por_idterceros_fk($id){
//     // Puede retonar varios array
//     $sql = "SELECT idpagosrealizados, montototal, fecha, monedas_fk, origen_fk, idterceros_fk, estado FROM pagosrealizados WHERE idterceros_fk = ?";
//     return retornar_seleccion($sql, array($id), "a");
// }

// table tablajugadaventadeticket

include_once(dirname(__FILE__, 4) . '/backend/phpfunctions/sqlRelated/sqlquerygenerals.php');
include_once(dirname(__FILE__, 4) . '/backend/llavesYTextos.php');

function seleccionar_tablajugadaventadeticket_estoyharto_por_idterceros_fk($id){
    $table = "tablajugadaventadeticket";
    $sql = "SELECT idtablajugada, jugadas, fecha FROM $table WHERE idterceros_fk = ?";

    global $idgenericlabel; global $genjuglabel; global $genfeclabel; global $dbtercerosidfk;
    $llaves = [$idgenericlabel, $genjuglabel, $genfeclabel, $dbtercerosidfk];
    // return retornar_seleccion_con_llaves($sql, array($id), $llaves);
    return execute_select($table, ["idterceros_fk" => $id], $llaves)[0];
}

?>
