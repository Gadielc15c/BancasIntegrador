<?php

include_once('../backend/phpfunctions/sessionsFunctions.php');
$nivel=1;
SessionControl($nivel);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta name="description" />
    <meta name="generator" content="HAPedit 3.1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://d3js.org/d3.v4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.js"></script>
    <!-- <link rel="stylesheet" href= "https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.css"/> -->
    <link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css" />

    <link rel="stylesheet" href="/css/cuerpoWeb.css" />


</head>
<header>
    <?php include('../frontend/nav.php');?>
</header>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.1/Chart.min.js"></script>

<body>

    <div class="container2">
        <div class="cuadrado">
            <div class="col-xs-12 text-center">
                <h2>Jugadas</h2>
            </div>

            <div id="donut-chart"></div>

            <script>
            var chart = bb.generate({
                data: {
                    columns: [
                        ["Ganadas", 12.5],
                        ["Perdidas", 45.0],
                        ["Recuperado", 42.5],
                    ],
                    type: "donut",
                    onclick: function(d, i) {
                        console.log("onclick", d, i);
                    },
                    onover: function(d, i) {
                        console.log("onover", d, i);
                    },
                    onout: function(d, i) {
                        console.log("onout", d, i);
                    },
                },
                donut: {
                    title: "Historico",
                },
                bindto: "#donut-chart",
            });
            // Los valores en ganadas, perdidas, recuperado, son los valores de porcentaje a mostrar, reemplazar los digitos con la
            </script>

            <br></br>
            <h2 class="font-weight-bold" style=" padding-top: 55px; padding-left: 25px">Historico De Jugadas</h2>


            <table id="data_table" class="table table-striped">
                <thead>
                    <tr>
                        <th>Loteria</th>
                        <th>Jugada</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
            </table>

            <br></br><input type="button" class="btn btn-primary" onclick="location.href='InicioForm.php';"
                value="Inicio">
</body>

</div>
</div>

<!--No borrar-->
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<!--Script de iconos-->
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!--No borrar-->
<script src="/js/darkmode.js"></script>

</body>
<footer>
    <?php include("../frontend/footer.php") ?>
</footer>

</html>