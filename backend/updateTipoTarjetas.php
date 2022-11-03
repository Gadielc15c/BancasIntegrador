<?php

$path = dirname(__FILE__);
include_once($path . "/phpFunctions/mantenimientosFunctions.php");

$function_select = 'seleccionar_un_tipotarjeta_por_idtipotarjeta';
$function_update = 'update_tipotarjeta_por_idtipotarjetas';
$title = "Actualizacion";
$encabezado = "Mantenimientos de los Tipos de Tarjeta";
$table = "tipotarjetas";
$col_name = "idtipotarjetas";
$array_columnas_exception = array($col_name);
$array_placeholder = array("ID Tipo de Tarjeta", "Nombre", "Estado");
$form_action="../frontend/mantenimientosTipoTarjeta.php";
crear_update_form($function_select, $function_update, $title, $encabezado, $table, $col_name, $array_columnas_exception, $array_placeholder,$form_action);

?>