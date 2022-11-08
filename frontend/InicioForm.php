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
  <title>Pagos</title>
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

<div class="container2">
    <div class="cuadrado">
     

    <section>
       
    <div class="" style="margin-left: 40%;">.
                                <div class="row">
                                    <div class="col-lg-8  rows">
                                        <h2 class="font-weight-bold" style=" padding-top: 55px; padding-left: 25px">
                                            NOVEDADES
                                        </h2>
                                       
                                    </div>
                                </div>
                            </div>

    <p class="lead text-muted"
    style="font-size:16px; padding-left: 25px; padding-bottom: 25px;">
    Tranajando
    </p>

    </section>

    <section>
       
    <div class="" style="margin-left: 40%;">.
                                <div class="row">
                                    <div class="col-lg-8  rows">
                                        <h2 class="font-weight-bold" style=" padding-top: 55px; padding-left: 25px">
                                            GANADORES
                                        </h2>
                                       
                                    </div>
                                </div>
                            </div>

    <p class="lead text-muted"
    style="font-size:16px; padding-left: 25px; padding-bottom: 25px;">
    Trabajando
    </p>

    </section>

    <section>
       
    <div class="" style="margin-left: 40%;">.
                                <div class="row">
                                    <div class="col-lg-8  rows">
                                        <h2 class="font-weight-bold" style=" padding-top: 55px; padding-left: 25px">
                                            NOSOTROS
                                        </h2>
                                       
                                    </div>
                                </div>
                            </div>

    <p class="lead text-muted"
    style="font-size:16px; padding-left: 25px; padding-bottom: 25px;">
    La Banca Integrador, es una es una empresa de proceder privado, cimentada bajo el orden de una sociedad colectiva y regido bajo el concepto de sociedad de responsabilidad limitada. Nuestro sistema en línea ofrece los servicios al cliente las 24 horas del día a través del internet, también la empresa cuenta con sucursales físicas, que se utilizan para poder acceder a los pagos de los tickets ganadores y realizar jugadas en la forma habitual. 
    </p>

    </section>

      
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
  <?php include("footer.php") ?>
</footer>
</html>