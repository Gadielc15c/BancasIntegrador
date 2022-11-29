<?php

include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/webscraping.php');
include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/generals.php');

session_start();
$metodoPago = [$metodo1 = ["PAYPAL", "****-****-****1521", "IVAN", "MENDOZA"], $metodo2 = ["MASTER CARD", "****-****-****-**41", "IVAN", "MENDOZA"]];
$_SESSION['MDP'] = $metodoPago[0];
if (isset($_SESSION['arrayT'])) {
    $Areglo = $_SESSION['arrayT'];
    $Valor = 24.0 * return_usd_to_dop_pesos_rate();
    $dolar=round($Valor,2);
}


if (!isset($_SESSION['nivel'])) {

    header('location:  ../index.php');
} else {
    if ($_SESSION['nivel'] != 4) {

        header('location: ../index.php');
    }
}
if (isset($_COOKIE["IDt"])) 
echo $_COOKIE["fcookie"]; 
else 
echo "Cookie Not Set";

$data=$_GET['data'];

/* RETORNA UN ARRAY CON DELIMITADOR -  
EJEM 1-Loteria Nacional-Juega Pega -100-14, 13, 25, 5, 89-Propia-100-2022-11-29-../img/Logo.png -

POSICIONES
 [0] TIENE LA CANTIDAD
 [1] NOMBRE LOT
 [2] SORTEO
 [3] MONTO
 [4] JUGADA 
 [5] TIPO DE JUGADA
 [6] TOTAL
 [7] FECHA (OJO CUIDADO CON EL TRIM LA FECHA VUELVE CON ESTOS DATOS 2022-11-29 )
 [8] VINCULO DE IMAGEN



*/
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <script
        src="https://www.paypal.com/sdk/js?client-id=ATTCNCX1HWvfZEAKw9W_oGpF0rsur6EELO0znapIyPexXdnkLvN35kB5kmtsDciRUZi2OFwlBf0sTP8I&merchant-id=9UBV4ETA9N8VY&locale=es_DO&commit=false">
    </script>

    <!-- Load the required Braintree components. -->
    <script src="https://js.braintreegateway.com/web/3.39.0/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.39.0/js/paypal-checkout.min.js"></script>
    <meta charset="utf-8">
    <title>PAGOS</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta name="description" />
    <meta name="generator" content="HAPedit 3.1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/cuerpoWeb.css" />
    <link rel="stylesheet" href="/css/ventas.css" />

</head>
<header>
    <?php include(dirname(__FILE__, 2) . '/cliente/navCliente.php'); ?>
</header>

<body>

    <div class="container2">

        <div class="cuadrado" style="display: flex;align-items: center;justify-content: center; ">
            <div class="cuadraiso">

                <center>
                    <h3 class="font-weight-bold " style=" padding: 30px; ">
                        SELECCIONE UN METODO DE PAGO PARA COMPLETAR LA TRANSACCION
                       
                    </h3>
                    <?php echo $data;?>
                    <div id="paypal-button-container">


                    </div>



                    <br>

                </center>
            </div>
        </div>
    </div>

    <script>
    function UpdateAmount(amount, something) {
        $("#hosted_button_id").val(amount); // Or whatever the input's id is.
        // Whatever you wanna do.
    }

    paypal.Buttons({


        createOrder: (data, actions) => {

            return actions.order.create({ // iterar en caso de ser necesario xd por ahora pago unico

                purchase_units: [{

                    amount: {
                        currency_code: "USD",
                        value: "<?php echo $dolar;?>",
                        breakdown: {
                            item_total: {
                                currency_code: "USD",
                                value:"<?php echo $dolar;?>"
                            }
                        }
                    }

                }]
            });
        },
        // Sets up the transaction when a payment button is clicked

        onApprove: (data, actions) => {

            return actions.order.capture().then(function(orderData) {
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
               
                window.location.replace('../frontend/ticketDisplayer.php');
                
                
//                 alert('Transaction '+ transaction.status + 'ID :' + transaction.id + 'FECHA: ' + transaction.create_time  +'\n\nSee console for all available details');
//                  alert(orderData);
//                

        

              

            });

        }

    }).render('#paypal-button-container');
    
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<footer>
    <?php include("../frontend/footer.php") ?>
</footer>

</html>