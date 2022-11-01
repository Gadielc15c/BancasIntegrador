<?php

$path = dirname(__FILE__);
include_once($path . "/phpFunctions/mantenimientosFunctions.php");

$function_select = seleccionar_todos_usuario();
$encabezado = "Mantenimientos Sucursal";
$table = "sucursal";
$array_columnas_exception = array("idtercero_fk", "idtelefonos_fk", "iddireccion_fk");
$array_placeholder = array("ID SUCURSAL", "NOMBRE", "ID TERCERO", "ID TELEFONO", "ID DIRECCION");
$array_text = array("ID SUCURSAL", "NOMBRE", "ID TERCERO", "ID TELEFONO", "ID DIRECCION");
$href_editar = "../backend/updateUsuario.php?idsucursal=";
$href_delete = "";
crear_mantenimientos_form($function_select, $encabezado, $table, $array_columnas_exception, $array_placeholder, $array_text, $href_editar, $href_delete);

?>


