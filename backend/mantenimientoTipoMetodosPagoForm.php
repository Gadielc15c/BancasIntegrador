<?php

$path = dirname(__FILE__);
include_once($path . "/phpFunctions/mantenimientosFunctions.php");
$function_select = seleccionar_todos_tipometodopago();
$encabezado = "Mantenimientos de los Tipos de Metodos de Pago";
$table = "tipometodopago";
$array_columnas_exception = array();
$array_placeholder = array("ID Metodo", "Nombre","Estado");
$array_text = array("ID METODO", "NOMBRE","ESTADO");
$href_editar = "../backend/updateTipoMetodoPago.php?idtipometodopago=";
$href_estado = "";
crear_mantenimientos_form($function_select, $encabezado, $table, $array_columnas_exception, $array_placeholder, $array_text, $href_editar, $href_estado);

?>

