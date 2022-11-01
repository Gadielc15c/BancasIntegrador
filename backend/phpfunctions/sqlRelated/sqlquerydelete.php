<?php
include_once('dbConstruct.php');

function delete_un_usuario_por_nombre($nomuser){
    $sql = "DELETE FROM terceros WHERE nomusuario = ?";
    return ejecutarQuery($sql, array($nomuser));
}



delete_un_usuario_por_nombre("test4");




?>