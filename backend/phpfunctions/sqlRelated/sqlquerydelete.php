<?php
include_once('dbConstruct.php');

function delete_un_usuario_por_nombre($nomuser){
    $sql = "DELETE FROM terceros WHERE nomusuario = ?";
    return ejecutarQuery($sql, array($nomuser));
}

function delete_un_usuario_por_idtercero($id){
    $sql = "DELETE FROM terceros WHERE idterceros = ?";
    return ejecutarQuery($sql, array($id));
}

function delete_ticket_por_idticket($id){
    $sql = "DELETE FROM tickets WHERE idtickets = ?";
    return ejecutarQuery($sql, array($id));
}

function delete_ticket_por_codigobarra($codigobarra){
    $sql = "DELETE FROM tickets WHERE codigobarra = ?";
    return ejecutarQuery($sql, array($codigobarra));
}

function delete_moneda_por_idmonedas($id){
    $sql = "DELETE FROM monedas WHERE idmonedas = ?";
    return ejecutarQuery($sql, array($id));
}






?>