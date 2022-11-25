<?php
include_once('../backend/phpfunctions/sessionsFunctions.php');
$nivel=1;
SessionControl($nivel);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Cobros De Jugada</title>
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
    <h2 class="font-weight-bold" style=" padding-top: 55px; padding-left: 25px">
                                           Cobro Jugadas
                                        </h2>
    
    <div class="container mt-3">
     <form action="">
                <input type="text" class="form-control mb-3" name="idtikcet" placeholder="Id Ticket">
                <input type="submit" class="btn btn-primary" value="Buscar">
                <input type="submit" class="btn btn-primary" value="Cancelar">
                <input type="submit" class="btn btn-primary" value="Borrar">
            </form>

            <div class="col-md-7 col-md-offset-2"></div>
            

            

 <div class="row-md-7">
    <table class="table">
        <thead class="table-warning table-striped">
            <tr style="text-align: center;">
                <th style="text-align: center;">LOTERIA</th>
                <th style="text-align: center;">NUMEROS JUGADOS</th>
                <th style="text-align: center;">TIPO DE JUGADA</th>
                <th style="text-align: center;">MONTO</th>
            </tr>
        </thead>
     </table>
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
  <?php include('../frontend/footer.php')?>
</footer>
</html>