<?php

$path = dirname(__FILE__);
include_once($path . "/phpFunctions/mantenimientosFunctions.php");

$function_select = 'seleccionar_loterias_por_idloterias';
$function_update = 'update_loterias_por_idloterias';
$title = "Actualizacion";
$encabezado = "Mantenimientos de las Loterias";
$table = "loterias";
$col_name = "idloterias";
$array_columnas_exception = array($col_name);
$array_placeholder = array("ID Loteria", "Nombre", "ID Terceros", "Estado");
$form_action="../frontend/mantenimientoLoterias.php";
crear_update_form($function_select, $function_update, $title, $encabezado, $table, $col_name, $array_columnas_exception, $array_placeholder,$form_action);

?>