<?php

include("conexion.php");
$con=conectar();

$cod=$_POST['CodigoArchivo'];
$CodDepto=$_POST['CodDepto'];
$AreaReferencia=$_POST['AreaReferencia'];
$Delivery=$_POST['Delivery'];
$NumCopias=$_POST['NumCopias'];
$FechaIn=$_POST['FechaIn'];
$ArchivoFisico=$_POST['ArchivoFisico'];
$ArchivoDigital=$_POST['ArchivoDigital'];

$Obser=$_POST['Obser'];
$tiempo=$_POST['Tiempo'];
$sql="UPDATE archivos SET  AreaReferencia='$AreaReferencia',Delivery='$Delivery'
,NumCopias='$Numcopias',FechaIn='$FechaIn',ArchivoFisico='$ArchivoFisico',ArchivoDigital='$ArchivoDigital',Obser='$Obser',CodDepto='$CodDepto',Tiempo='$tiempo' WHERE CodigoArchivo='$cod'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: archivos.php");
    }
