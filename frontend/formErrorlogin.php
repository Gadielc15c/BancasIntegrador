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
  <title>Error</title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="description" />
  <meta name="generator" content="HAPedit 3.1" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/cuerpoWeb.css" />


</head>
<header>
<div class="nav">
<div class="logoDiv">
                <a class="navbar-logo" href="#">
                    <img class="logo" src="/img/Logo.png" />
                </a>
             
            </div>

</div>
</header>

<body>

<div class="container2">
    <div class="cuadrado">
     

    <h2 class="font-weight-bold " style=" padding-top: 55px; padding-left: 25px">
                                    PLANTILLA ERROR LOGIN
                                </h2>

      
    </div>

</div>



</body>
<footer>
  <?php include("footer.php") ?>
</footer>
</html>