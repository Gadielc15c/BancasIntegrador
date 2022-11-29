<?php
include_once('../backend/phpfunctions/sessionsFunctions.php');
$nivel=4;
SessionControl($nivel);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DashboardCliente</title>
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

<body onload="startTime()">

    <div class="container2">


        <div class="cuadrado">
            <center>
                <h2 class="font-weight-bold ">
                    Recuento de Jugadas Realizadas
                </h2>
            </center>

            <?php include('../backend/winLoader.php');?>

        </div>

        <div class="cuadrado">
            <center>
                <h2 class="font-weight-bold ">
                    RESULTADO DE LOTERIAS
                    <?php include('../backend/lotsLoader.php');?>
                </h2>
            </center>

        </div>
    </div>

    </div>

    <!--No borrar-->
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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