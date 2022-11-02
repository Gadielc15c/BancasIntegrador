<?php

$path = dirname(__FILE__);
include_once($path . "/phpFunctions/mantenimientosFunctions.php");

$function_select = seleccionar_todos_usuario();
$encabezado = "Mantenimientos User";
$table = "terceros";
$array_columnas_exception = array("claveusuario", "idterdata_fk", "idtelefonos_fk", "recibirpago", "idnivelacceso_fk");
$array_placeholder = array("ID Terceros", "Username", "Clave", "idterdata_fk", "Correo", "Cedula", "Estado", "idtelefonos_fk", "Recibir pago", "Nivel acceso");
$array_text = array("ID USUARIO", "USUARIO", "CLAVE", "idterdata_fk", "CORREO", "CEDULA", "ESTADO", "idtelefonos_fk", "recibirpago", "idnivelacceso_fk");
$href_editar = "../backend/updateUsuario.php?idterceros=";
$href_estado = "";
crear_mantenimientos_form($function_select, $encabezado, $table, $array_columnas_exception, $array_placeholder, $array_text, $href_editar, $href_estado);

?>



