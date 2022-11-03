<?php

$path = dirname(__FILE__);
include_once($path . "/phpFunctions/mantenimientosFunctions.php");
$function_select = 'seleccionar_tipometodopago_por_idtipometodopago';
$function_update = 'update_tipometodopago_por_idtipometodopago';
$title = "Actualizacion";
$encabezado = "Mantenimientos de los Tipos de Metodos de Pago";
$table = "tipometodopago";
$col_name = "idtipometodopago";
$array_columnas_exception = array($col_name);
$array_placeholder = array("ID Metodo", "Nombre","Estado");
$form_action="../frontend/MantenimientoMetodoDePago.php";
crear_update_form($function_select, $function_update, $title, $encabezado, $table, $col_name, $array_columnas_exception, $array_placeholder,$form_action);

?>