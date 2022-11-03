<?php

$path = dirname(__FILE__);
include_once($path . "/phpFunctions/mantenimientosFunctions.php");
/* EDITAR CAmpoPOS */ 
$function_select = seleccionar_todos_tipometodopago();
$encabezado = "Mantenimientos Metodo De pago";
$table = "tipometodopago";
$array_columnas_exception = array("");
$array_placeholder = array("ID METODO", "Nombre", "Estado");
$array_text = array("ID METODO", "Nombre", "Estado");
$href_editar = "../backend/updateLoteria.php?idtipometodopago=";
$href_estado = "";
crear_mantenimientos_form($function_select, $encabezado, $table, $array_columnas_exception, $array_placeholder, $array_text, $href_editar, $href_estado);

?>


