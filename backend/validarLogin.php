
<?php

include('conexion.php');
$conexion=conectar();
$Usuario = $_POST ['usuario'];
$Clave= $_POST ['clave'];



    $Consulta= "SELECT * FROM terceros WHERE nomusuario='$Usuario' and  claveusuario='$Clave'";
    $Resultados=mysqli_query($conexion,$Consulta);
    var_dump($Resultados);

    $resultadosEncontrados=mysqli_num_rows($Resultados);
    
if($resultadosEncontrados>0){
    header("Location:../frontend/mantenimientos.php");
    
    }else{
     echo "No se Ha podido encontrar el user";
     var_dump($resultadosEncontrados);
    
    }
    mysqli_free_result($Resultados);
    mysqli_close($conexion);
    
    // faltan politicas de nivel de usuario 

?>