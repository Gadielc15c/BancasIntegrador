<?php

$path = dirname(__FILE__);
include_once($path . "/phpFunctions/mantenimientosFunctions.php");

$function_select = 'seleccionar_sucursal_por_idsucursal';
$function_update = 'update_sucursal_por_idsucursal';
$title = "Actualizacion";
$encabezado = "Mantenimientos de las Sucursales";
$table = "sucursal";
$col_name = "idsucursal";
$array_columnas_exception = array($col_name);
$array_placeholder = array("ID Sucursal", "Nombre", "ID Tercero", "ID Telefono", "ID Direccion", "Estado");
$form_action="../frontend/mantenimientoSucursal.php";
crear_update_form($function_select, $function_update, $title, $encabezado, $table, $col_name, $array_columnas_exception, $array_placeholder,$form_action);

?>