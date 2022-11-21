<?php

function lvlLogValidate(){

    // Por alguna razon include once no funciona
    for($x = 1; $x < 10; $x++){
        $path = dirname(__FILE__, $x);
        $patha = explode("\\", $path);
        if (end($patha) == "BancasIntegrador"){
            break;
        }
    }

    include_once($path . "\\include_me.php");
    include(include_me("sqlqueryselect.php", $path));
    include(include_me("llavesYTextos.php", $path));
    include_once(include_me("generals.php", $path));

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