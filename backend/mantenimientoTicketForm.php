<?php

$path = dirname(__FILE__);
include_once($path . "/phpFunctions/mantenimientosFunctions.php");

$function_select = seleccionar_todos_tickets();
$encabezado = "Mantenimientos de los Tickets";
$table = "tickets";
$array_columnas_exception = array();
$array_placeholder = array("ID Tickets", "monto", "monedas_fk", "fecha", "estado", "idterceros_fk", "Codigo de Barra", "idsucursalventa_fk", "idsucursalpago_fk");
$array_text = array("ID TICKETS", "MONTO", "MONEDAS_FK", "FECHA", "ESTADO", "IDTERCEROS_FK", "CODIGO DE BARRA", "IDDSUCURSALVENTA_FK", "IDSUCURSALPAGO_FK");
$href_editar = "../backend/updateTickets.php?idtickets=";
$href_estado = "";
crear_mantenimientos_form($function_select, $encabezado, $table, $array_columnas_exception, $array_placeholder, $array_text, $href_editar, $href_estado);

?>