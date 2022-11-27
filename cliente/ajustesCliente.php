<?php

session_start();
if(!isset($_SESSION['nivel'])){

header('location:  ../index.php');
    
}else {
    if($_SESSION['nivel']!=4){

header('location:  ../index.php');

    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ajustes</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta name="description" />
    <meta name="generator" content="HAPedit 3.1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/cuerpoWeb.css" />
    <link rel="stylesheet" href="/css/lotsLoader.css" />
</head>
<header>
    <?php include('../cliente/navCliente.php');?>
</header>

<body>

<div class="container2">
    <div class="cuadrado">
    <h3 style="margin-top:5%; margin-left: 9.2%;">Datos Personales:</h3>
        
         <div class="cuadrado">
     <form action="">
                <input type="text" class="form-control mb-3" name="cedula" placeholder="Cedula">
                <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombres"><input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos">
                <input type="text" class="form-control mb-3" name="tel" placeholder="Telefono">
                <input type="submit" class="btn btn-primary" value="Guardar">
<h3 style="margin-top:5%; margin-left: 0%;">Datos De Pagos:</h3>


<h4 style="margin-top:5%; margin-left: 0%;">Seleccione una opción:</h4>

  <input type="button" class="btn btn-primary" onclick="location.href='../cliente/metodoPagosCliente.php';" value="Ir a Metodos De Pago">
  <input type="button" class="btn btn-primary" onclick="location.href='inicioCliente.php';" value="Ir a Inicio">
</form>

<div class="col-md-7 col-md-offset-2"></div>
</div>
</div>
</div>

</body>

<footer>
    <?php
include('../frontend/footer.php');
?>

</footer>

</html>