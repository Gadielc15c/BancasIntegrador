<?php
include_once('sqlquerygenerals.php');

function seleccionar_un_usuario_por_nombre($nomuser){
    $sql = "SELECT nomusuario, correo, cedula, estado FROM terceros WHERE nomusuario=?";
    return retornar_seleccion($sql, array($nomuser), "o");
}

function seleccionar_todos_usuario(){
    $sql = "SELECT idterceros, nomusuario, correo, cedula, estado FROM terceros";
    return retornar_seleccion($sql, null, "a");
}

function seleccionar_idnivelaccesofk_por_nombre_clave($nomuser, $claveuser){
    $col = "idnivelacceso_fk";
    $sql = "SELECT $col FROM terceros WHERE nomusuario = ? AND claveusuario = ?";
    return retorno_para_un_select($col, $sql, array($nomuser, $claveuser));
}

function seleccionar_id_tercero_por_nombre($nomuser){
    $col = "idterceros";
    $sql = "SELECT $col FROM terceros WHERE nomusuario = ?";
    return retorno_para_un_select($col, $sql, array($nomuser));
}

function seleccionar_id_ticket_por_codigobarra($codigobarra){
    $col = "idtickets";
    $sql = "SELECT $col FROM tickets WHERE codigobarra = ?";
    return retorno_para_un_select($col, $sql, array($codigobarra));

}

function seleccionar_todos_tickets(){

    $sql = "SELECT idtickets FROM tickets WHERE codigobarra = ?";




}

function seleccionar_moneda_por_idmonedas($idmon){
    $col = "moneda";
    $sql = "SELECT $col FROM monedas WHERE idmonedas = ?";
    return retorno_para_un_select($col, $sql, array($idmon));
}



//var_dump(seleccionar_moneda_por_idmonedas(1));

?>
