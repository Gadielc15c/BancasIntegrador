<?php

$path = dirname(__FILE__);
include_once($path . "/phpFunctions/mantenimientosFunctions.php");
$function_select = 'seleccionar_un_usuario_por_idtercero';
$function_update = 'update_tercero_por_idtercero';
$title = "Actualizacion";
$encabezado = "Mantenimientos de los Usuarios";
$table = "terceros";
$col_name = "idterceros";
$array_columnas_exception = array($col_name, "claveusuario", "idterdata_fk", "idtelefonos_fk", "recibirpago", "idnivelacceso_fk");
$array_placeholder = array("ID Terceros", "Username", "Clave", "idterdata_fk", "Correo", "Cedula", "Estado", "idtelefonos_fk", "Recibir pago", "Nivel acceso");
$form_action="../frontend/mantenimientosUsuarios.php";
crear_update_form($function_select, $function_update, $title, $encabezado, $table, $col_name, $array_columnas_exception, $array_placeholder,$form_action);

?>