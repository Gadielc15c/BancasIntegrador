<?php

$path = dirname(__FILE__);
include_once($path . "/phpFunctions/mantenimientosFunctions.php");
$function_select = seleccionar_todos_tipo_tarjeta();
$encabezado = "Mantenimientos de los Tipos de Tarjetas";
$table = "tipotarjetas";
$array_columnas_exception = array();
$array_placeholder = array("ID Tipo de Tarjeta", "Nombre", "Estado");
$array_text = array("ID TIPO DE TARJETA", "NOMBRE", "ESTADO");
$href_editar = "../backend/updateTipoTarjetas.php?idtipotarjetas=";
$href_estado = "";
crear_mantenimientos_form($function_select, $encabezado, $table, $array_columnas_exception, $array_placeholder, $array_text, $href_editar, $href_estado);

?>


