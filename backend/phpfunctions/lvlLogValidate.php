<?php 
include_once ('./backend/phpfunctions/sqlRelated/sqlquerygenerals.php');
include_once ('./backend/phpfunctions/sqlRelated/dbConstruct.php');
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
    $db_object = new dbConstruct();
    $qr = $db_object->connect()->prepare('SELECT nomusuario,claveusuario,idnivelacceso_fk FROM terceros WHERE nomusuario=:usuario and  claveusuario=:clave');
    $qr->execute(['usuario'=>$nomuser, 'clave'=>$claveuser]);
    $row=$qr->fetch(PDO::FETCH_NUM);
    if($row == true){
    $nivel= $row[2];// columna en donde esta el ID
    $_SESSION['nivel']= $nivel;
    switchRol();
    }else{
        echo " y esa porqueria bro";
       
    }
}


?>