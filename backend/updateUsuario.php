<?php
$path = dirname(__FILE__);
include_once($path . "/phpFunctions/mantenimientosFunctions.php");

$function_select = 'seleccionar_un_usuario_por_idtercero';
$function_update = 'update_tercero_por_idtercero';
$title = "Actualizacion";
$encabezado = "Mantenimientos Usuarios";
$table = "terceros";
$array_columnas_exception = array("idterceros", "claveusuario", "idterdata_fk", "idtelefonos_fk", "recibirpago", "idnivelacceso_fk");
$array_placeholder = array("ID Terceros", "Username", "Clave", "idterdata_fk", "Correo", "Cedula", "Estado", "idtelefonos_fk", "Recibir pago", "Nivel acceso");

crear_update_form($function_select, $function_update, $title, $encabezado, $table, $array_columnas_exception, $array_placeholder);


?>