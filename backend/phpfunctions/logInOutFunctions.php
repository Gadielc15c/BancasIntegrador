<?php

function lvlLogValidate(){
    include_once ('./backend/phpfunctions/sqlRelated/dbConstruct.php');
    include_once ('./backend/phpfunctions/sqlRelated/sqlqueryselect.php');
    session_start();

    if(isset($_GET['cerrarSesion'])){

        session_unset();
        session_destroy();

    }
    if(isset($_SESSION['nivel'])){
        switchRol();
        
    }

    if(isset($_POST['usuario']) && isset($_POST['clave'])){

        $nomuser = $_POST['usuario'];
        $claveuser = $_POST['clave'];
        $id = seleccionar_idnivelaccesofk_por_nombre_clave($nomuser, $claveuser);
        if($id){
            $_SESSION['nivel']= $id;

            switchRol();

        }else{
            ?> <script type="text/javascript" src="/js/logoutFunctions.js"></script> <?php

            echo "INSERTAR FUNCION JAVA PARA VALIDAR";
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