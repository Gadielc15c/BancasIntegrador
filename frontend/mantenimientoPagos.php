<?php

session_start();
if(!isset($_SESSION['nivel'])){

header('location:  ../index.php');
    
}else {
    if($_SESSION['nivel']!=1){

header('location: ../index.php');

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Mantenimiento - Pagos</title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="description" />
  <meta name="generator" content="HAPedit 3.1" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/cuerpoWeb.css" />


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


               <!--<form action="form.php" method="post">
                    Search: <input type="text" name="term" /><br />
                    <input type="submit" value="Submit" />
                </form>
            </div>

            <div class="col-md-75 col-md-offset-2"></div>-->




</body>
<footer>
  <?php include("footer.php") ?>
</footer>
</html>
