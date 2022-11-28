<?php

$path = dirname(__FILE__);
include_once($path . "/phpFunctions/mantenimientosFunctions.php");
include_once(dirname(__FILE__) . "/phpFunctions/sqlRelated/sqlquerygenerals.php");

$function_select = execute_select("loterias");
$encabezado = "Mantenimientos Loterias";
$table = "loterias";
$array_columnas_exception = array("idterceros_fk", "idlothorarios_fk");
$array_placeholder = array("ID Loteria", "Nombre", "ID Terceros", "Estado");
$array_text = array("ID LOTERIA", "NOMBRE", "ID TERCEROS", "ESTADO");
$href_editar = "../backend/updateLoteria.php?idloterias=";
$href_estado = "";
crear_mantenimientos_form($function_select, $encabezado, $table, $array_columnas_exception, $array_placeholder, $array_text, $href_editar, $href_estado);

?>


