<?php
include_once('../backend/phpfunctions/sessionsFunctions.php');
$nivel=1;
SessionControl($nivel);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Mantenimiento Tickets</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta name="description" />
    <meta name="generator" content="HAPedit 3.1" />
    <meta name="viewport" content="width=device-width,height=device-height, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/cuerpoWeb.css" />

</head>
<header>
    <?php include('../frontend/nav.php');?>
</header>

<body>
<div class="container2">

    <div class="cuadrado">
    <h3 style="margin-top:5%; margin-left: 15.5%;">Mantenimiento de Jugadas</h3>
        <?php  
        
        include('../backend/mantenimientoJugadasForm.php')
        
        ?>
    </div>
    </div>
 <!--No borrar-->
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <!--Script de iconos-->
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!--No borrar-->

</body>

<footer>
    <center>Bancas Integrador</center>
    <center>PROYECTO INTEGRADOR GRUPO #6</center>
</footer>

</html>
