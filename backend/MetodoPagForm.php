<?php

session_start();
$metodoPago = [$metodo1 = ["PAYPAL", "****-****-****1521", "IVAN", "MENDOZA"], $metodo2 = ["MASTER CARD", "****-****-****-**41", "IVAN", "MENDOZA"]];
$_SESSION['MDP'] = $metodoPago[0];
if (isset($_SESSION['array'])) {
    $_SESSION['arrayT'] = $Areglo = $_SESSION['array'];
    $Valor = 24.0 * 0.018;
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
    <title>PAGos</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta name="description" />
    <meta name="generator" content="HAPedit 3.1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/cuerpoWeb.css" />
    <link rel="stylesheet" href="/css/ventas.css" />

</head>
<header>
<?php include('../cliente/navCliente.php');?>
</header>

<body>

    <div class="container2">

        <div class="cuadrado" style="display: flex;align-items: center;justify-content: center; ">
            <div class="cuadraiso">

                <center>
                    <h3 class="font-weight-bold " style=" padding: 30px; ">
                        SELECCIONE UN METODO DE PAGO PARA COMPLETAR LA TRANSACCION
                    </h3>
                    <!--
                    <select name="lotsSelect" id="lotsSelect" class="lotsSelect" onchange="this.form.submit()">
                        <option value="" disable selected="selected">Seleccione una Metodo de pago</option>
                        <?php

                        /*
                        foreach($metodoPago as $metodo){
                            echo "<option value='$metodo[0]'>$metodo[0]</option>";
                           
                        }-*/
                        ?> 
                    </select><form action="../frontend/ticketDisplayer.php">
                        <input class="botoncito" type="submit" name="submit" class="btn btn-primary btn-block"
                            value="Add Metodo">
                        <input class="botoncito" type="submit" name="submit" class="btn btn-primary btn-block"
                            value="Select Metodo">
                    </form>    < -->
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