<?php

function lvlLogValidate(){

    // Por alguna razon include once no funciona
    include_once("E:\\xampp\\htdocs\\BancasIntegrador\\include_me.php");
    include(include_me("sqlqueryselect.php"));
    include(include_me("llavesYTextos.php"));
    include_once(include_me("generals.php"));

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
        $values = prueba_seleccionar_un_usuario_por_nombre_y_clave($nomuser, $claveuser);

        // Si el estado de la cuenta es 0, poner un aviso de que ha sido suspendido

        if($values){
            $_SESSION['nivel']= $values[$dbusernivelaccfk];
            $_SESSION[$dbuserid] = $values[$dbuserid];
            
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