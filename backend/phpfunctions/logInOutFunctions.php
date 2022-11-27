<?php

include_once(dirname(__FILE__, 3) . '/backend/phpfunctions/generals.php');
include_once(dirname(__FILE__, 3) . '/backend/phpfunctions/sqlRelated/sqlqueryselect.php');
include_once(dirname(__FILE__, 3) . '/backend/phpfunctions/sqlRelated/sqlquerygenerals.php');
include_once(dirname(__FILE__, 3) . '/backend/llavesYTextos.php');

function lvlLogValidate(){

    session_start();

    if(isset($_GET['cerrarSesion'])){

        session_unset();
        session_destroy();

    }
    if(isset($_SESSION['nivel'])){
        switchRol();
    }
    
    if(isset($_POST["usuario"]) && isset($_POST["clave"])){

        $nomuser = $_POST["usuario"];
        $claveuser = $_POST["clave"];
        $values = execute_select("terceros", ["nomusuario" => $nomuser, "claveusuario" => $claveuser])[0];
        
        // Si el estado de la cuenta es 0, poner un aviso de que ha sido suspendido

        if($values){
            global $dbtercerosnivel; global $dbtercerosid;
            $_SESSION['nivel']= $values[$dbtercerosnivel];
            $_SESSION[$dbtercerosid] = $values[$dbtercerosid];
            
            switchRol();

        }else{
            ?> <script type="text/javascript" src="/js/logoutFunctions.js"></script> <?php
            header('location:./frontend/formErrorlogin.php');
        
        }
    }
}

function switchRol(){
    switch($_SESSION['nivel']){
        case 1:
            header('location:../frontend/menuMantenimiento.php');
            break;
        case 4:
            header('location:../cliente/inicioCliente.php');
            break;
            default:
        } 
}


function logOut(){
    session_start();
    session_destroy();
    header('Location: /index.php');
    exit;
}

?>