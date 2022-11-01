<?php

$path = dirname(__FILE__);
include_once($path . "/phpFunctions/mantenimientosFunctions.php");

$function_select = seleccionar_todas_loterias();
$encabezado = "Mantenimientos Loterias";
$table = "loterias";
$array_columnas_exception = array("idterceros_fk", "idlothorarios_fk");
$array_placeholder = array("ID LOTERIA", "NOMBRE", "ID HORARIOS", "ID TERCEROS", "ESTADO");
$array_text = array("ID LOTERIA", "NOMBRE", "ID HORARIOS", "ID TERCEROS", "ESTADO");
$href_editar = "../backend/updateUsuario.php?idloterias=";
$href_delete = "";
crear_mantenimientos_form($function_select, $encabezado, $table, $array_columnas_exception, $array_placeholder, $array_text, $href_editar, $href_delete);

?>


