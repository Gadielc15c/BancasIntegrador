<?php

include('conexion.php');
$conexion=conectar();
$Usuario = $_POST ['Usuario'];
$Clave= $_POST ['Clave'];



$Consulta= "SELECT * FROM terceros  WHERE nomusario='$Usuario' and  claveusario='$Clave'";
$Resultados=mysqli_query($conexion,$Consulta);
$resultadosEncontrados=mysqli_num_rows($Resultados);

if(!empty($resultadosEncontrados) AND $resultadosEncontrados>0){
header("Location:mantenimientos.php");

}else{
 echo "No se Ha podido encontrar el user";

}
mysqli_free_result($Resultados);
mysqli_close($conexion);

