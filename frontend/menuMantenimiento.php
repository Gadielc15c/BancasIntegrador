<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>INICIO</title>
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

   <div id="container">
     <div class="opciones">
        <div class="top">
          <div class="nav">
            <div >
              <h1>MANTENIMIENTOS GENERALES</H1>
            </div>
             <a href="mantenimientoTicket" class="NavItem NavButton">
             <ion-icon name="book"></ion-icon> TICKETS
            </a>
              <a href="#" class="NavItem NavButton">
               <ion-icon name="book"></ion-icon> LOTERIAS
              </a>
             <a href="mantenimmientosUsuarios.php" class="NavItem NavButton">
               <ion-icon name="person"></ion-icon> CLIENTES
             </a>
          </div>
        </div>
      </div>
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