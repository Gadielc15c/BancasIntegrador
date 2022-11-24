<?php

include_once('../backend/phpfunctions/sessionsFunctions.php');
$nivel=1;
SessionControl($nivel);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Mantenimiento - Pagos</title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="description" />
  <meta name="generator" content="HAPedit 3.1" />
  <meta name="viewport" content="width=device-width,height=device-height, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/cuerpoWeb.css" />
  <link href="https://fonts.googleapis.com/css?family=Raleway|Rock+Salt|Source+Code+Pro:300,400,600" rel="stylesheet"><link rel="stylesheet" href="/css/tarjeta.css">


</head>
<header>
<?php include('../frontend/nav.php');?>
</header>

<body>

<div class="container mt-5">
        <div class="row">

            <div class="col-md-6">
                <h1>Buscar Ticket</h1>
                <form action="insertar.php" method="POST">
                    <input type="text" class="form-control mb-3" name="idTicket" placeholder="Codigo de Ticket">
                    <input type="submit" class="btn btn-primary" value="Buscar">

                </form>


               




</body>

<footer>
  <?php include("footer.php") ?>
</footer>
</html>
