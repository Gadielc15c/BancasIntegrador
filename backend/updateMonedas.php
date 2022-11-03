<?php

$path = dirname(__FILE__);
include_once($path . "/phpFunctions/mantenimientosFunctions.php");

$function_select = 'seleccionar_moneda_por_idmonedas';
$function_update = 'update_monedas_por_idmonedas';
$title = "Actualizacion";
$encabezado = "Mantenimientos de la Moneda";
$table = "monedas";
$col_name = "idmonedas";
$array_columnas_exception = array($col_name);
$array_placeholder = array("ID de la Moneda", "Moneda", "Nombre", "Estado");
$form_action="../frontend/mantenimientoMoneda.php";
crear_update_form($function_select, $function_update, $title, $encabezado, $table, $col_name, $array_columnas_exception, $array_placeholder,$form_action);

?>