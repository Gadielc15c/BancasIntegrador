<?php
include_once('../backend/phpfunctions/sessionsFunctions.php');
$nivel=1;
SessionControl($nivel);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>INICIO</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta name="description" />
    <meta name="generator" content="HAPedit 3.1" />

    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/cuerpoWeb.css" />
    <link rel="stylesheet" href="../css/ventas.css" />

</head>
<header>
    <?php include('../frontend/nav.php');?>
</header>

<body>

    <div class="container2">

        <div class="cuadrado">

            <div class=".row">


                <!-- <div class="d-flex">
                <div class="w-100">
                    <div id="content">
                        <section>
                            <div class="" style="margin-left: 30%;">.
                                <div class="row">
                                    <div class="col-lg-8  rows">
                                        <h2 class="font-weight-bold" style=" padding-top: 55px; padding-left: 25px">
                                            MANTENIMIENTOS GENERALES
                                        </h2>
                                        <p class="lead text-muted"
                                            style="font-size:16px; padding-left: 25px; padding-bottom: 25px;">
                                            Seleccione la Actividad que desea Realizar
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section style="margin-bottom: 40PX;display: block;margin-left: auto;margin-right: auto">

                            <div class="container" style="margin-left: 35%; margin-TOP: 2%;">
                                <div id="container">

                                    <div class="top">

                                        <div class="opciones">
                                        <H4 style="margin-top:1%;font-weight:bold">MANTENIMIENTOS DE APUESTA</H4>
                                         
                                        <div class="row">
                                            
                                                <a href="./mantenimientoTicket.php" class="NavItem NavButton">
                                                    <ion-icon name="newspaper"></ion-icon> TICKETS
                                                </a>
                                                <a href="./mantenimientoLoterias.php"
                                                    class="NavItem NavButton">
                                                    <ion-icon name="book"></ion-icon> LOTERIAS
                                                </a>
                                           
                                                <a href="./mantenimientoJugadas.php" class="NavItem NavButton">
                                                    <ion-icon name="game-controller"></ion-icon> JUGADAS
                                                </a>
                                            </div>
                                            <div class="row">
                                            </div>
                                            <H4 style="margin-top:8%; font-weight:bold">MANTENIMIENTOS DE PAGOS</H4>
                                            <div class="row">
                                                <a href="./mantenimientosTipoTarjeta.php" class="NavItem NavButton">
                                                    <ion-icon name="card"></ion-icon> TIPO DE TARJETA
                                                </a>                                        
                                                <a href="./mantenimientoMoneda.php" class="NavItem NavButton">
                                                    <ion-icon name="logo-bitcoin"></ion-icon> MONEDA
                                                </a>
                                                <a href="./mantenimientoMetodoDePago.php" class="NavItem NavButton">
                                                    <ion-icon name="card"></ion-icon> METODO DE PAGO
                                                </a>    
                                            </div>

                                            <div class="row">
                                                <a href="../backend/mantenimientosG.php" class="NavItem NavButton">
                                                    <ion-icon name="card"></ion-icon> TEST
                                                </a>    
                                            </div>



                                        </div>

                                        <div class="top">
                                          
                                            <div class="opciones">
                                            <H4 style="margin-top:8%; font-weight:bold">MISCELANEOS</H4>
                                                <div class="row">
                                                    <a href="./mantenimientoSucursal.php" class="NavItem NavButton">
                                                        <ion-icon name="storefront"></ion-icon> SUCURSALES
                                                    </a>
                                                    <a href="./mantenimientosUsuarios.php" class="NavItem NavButton">
                                                        <ion-icon name="person"></ion-icon> USUARIOS
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </section>
                        


            </div>
            -->
                <?php   include_once(dirname(__FILE__, 2) . ' ../backend/mantenimientosG.php');?>

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
    <script src="/js/darkmode.js"></script>
</body>

<footer>
    <?php include("footer.php") ?>
</footer>

</html>