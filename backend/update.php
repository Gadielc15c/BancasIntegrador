<?php
include("conexion.php");
$con=conectar();
$ID=$_POST['idterceros'];
$NomUser=$_POST['nomusuario'];
$pass=$_POST['claveusuario'];
$correo=$_POST['correo'];
$cedula=$_POST['cedula'];
$estado=$_POST['estado'];

$sql="UPDATE terceros SET nomusuario='$NomUser', claveusuario='$pass',correo='$correo'
,cedula='$cedula',estado='$estado' WHERE idterceros='$ID'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location:../frontend/mantenimientosUsuarios.php");
    }
