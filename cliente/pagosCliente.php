<?php
include_once('../backend/phpfunctions/sessionsFunctions.php');
$nivel=4;
SessionControl($nivel);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PagosCliente</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta name="description" />
    <meta name="generator" content="HAPedit 3.1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/cuerpoWeb.css" />
    <link rel="stylesheet" href="/css/shoppingCart.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
</head>
<header>
    <?php include('../cliente/navCliente.php');?>
</header>

<body onload="startTime()">

    <div class="container2">
        <div class="cuadrado">
            <h2 class="font-weight-bold " style=" padding-top: 55px; padding-left: 25px"></h2>

            <div class="Carrito">
                <div class="Letrero">
                    <h3 class="Caco">JUGADAS REALIZADAS</h3>
                </div>
                <?php include('../frontend/shoppinCart.php');?>
                <div class="pagarto">

                    <form action="../backend/MetodoPagForm.php">
                        <input type="submit" value="PAGAR TODO" class="boton">
                    </form>
                </div>


                </form>
                </form>
            </div>
        </div>
    </div>

    </div>

<script type="text/javascript">
  function idsender(clicked_id)
  {
    var  id=clicked_id
      
      var x  = document.getElementById("input-"+id).value;
      if (x != undefined && x != null) {
        window.location = '/backend/MetodoPagForm.php?data=' + x;
    }
     
  }
</script>
    <!--No borrar-->
    <script nomodule src=" https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--Script de iconos-->
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!--No borrar-->
    <script src="/js/darkmode.js"></script>
    <script src="../js/reloj.js"></script>

</body>
<footer>
    <?php include("../frontend/footer.php") ?>
</footer>

</html>