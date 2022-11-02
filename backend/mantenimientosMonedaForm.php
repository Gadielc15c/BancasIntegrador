<?php

$path = dirname(__FILE__);
include_once($path . "/phpFunctions/mantenimientosFunctions.php");

$function_select = seleccionar_todas_monedas();
$encabezado = "Mantenimientos de la Moneda";
$table = "monedas";
$array_columnas_exception = array();
$array_placeholder = array("ID de la Moneda", "Moneda", "Nombre", "Estado");
$array_text = array("ID MONEDA", "MONEDA", "NOMBRE", "ESTADO");
$href_editar = "../backend/updateMonedas.php?idmonedas=";
$href_estado = "";
crear_mantenimientos_form($function_select, $encabezado, $table, $array_columnas_exception, $array_placeholder, $array_text, $href_editar, $href_estado);

?>


