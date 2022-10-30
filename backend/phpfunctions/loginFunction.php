<?php

include_once('sqlRelated/sqlqueryselect.php');

function validar_login(){

    session_start();

    if(!isset($_POST['usuario'])){
        return -1; //Campo usuario vacio
    }
    if(!isset($_POST['clave'])){
        return -2; //Campo usuario vacio
    }
    $nomuser = $_POST['usuario'];
    $claveuser = $_POST['clave'];
    $id = seleccionar_idnivelaccesofk_por_nombre_clave($nomuser, $claveuser);

    if ($id != false){
        $_SESSION['nivel'] = $id;
        return $id;
    } else {
        return -3; //Usuario o clave incorrecta
    }

}

?>