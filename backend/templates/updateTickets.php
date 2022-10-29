<?php

include("conexion.php");
$con=conectar();


$Variable=$_POST['Variable'];
$Variable=$_POST['Variable'];
$Variable=$_POST['Variable'];
$Variable=$_POST['Variable'];
$Variable=$_POST['Variable'];





$sql="UPDATE Basededatos SET  Campo='$Variable',Campo='$Variable'
,Campo='$Variable',Campo='$Variable',Campo='$Variable',Campo='$Variable',Campo='$Variable',Campo='$Variable',Campo='$Variable' WHERE Campo='$Variable'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: Basededatos.php");
    }
