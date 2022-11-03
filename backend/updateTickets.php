<?php

$path = dirname(__FILE__);
include_once($path . "/phpFunctions/mantenimientosFunctions.php");

$function_select = 'seleccionar_ticket_por_idticket';
$function_update = 'update_ticket_por_idtickets';
$title = "Actualizacion";
$encabezado = "Mantenimientos de los Tickets";
$table = "tickets";
$col_name = "idtickets";
$array_columnas_exception = array($col_name, "idterceros_fk", "codigobarra", "idsucursalventa_fk", "idsucursalpago_fk");
$array_placeholder = array("ID Tickets", "monto", "monedas_fk", "fecha", "estado", "idterceros_fk", "Codigo de Barra", "idsucursalventa_fk", "idsucursalpago_fk");
$form_action="../frontend/mantenimientoTicket.php";
crear_update_form($function_select, $function_update, $title, $encabezado, $table, $col_name, $array_columnas_exception, $array_placeholder,$form_action);

?>