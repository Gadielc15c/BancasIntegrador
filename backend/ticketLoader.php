<?php

if (isset($_SESSION['arrayT'])) {
$Arreglo=$_SESSION['arrayT'];


if (isset($_SESSION['MDP'])) {
	$metodo=$_SESSION['MDP'];
}

}

include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/ticketPrintFunction.php');
include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/generals.php');
include_once(dirname(__FILE__, 2) . '/backend/llavesYTextos.php');
include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/sqlRelated/sqlqueryinsert.php');
include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/sqlRelated/sqlquerydelete.php');


$dir="Calle Camino Real #3";
$cant=$Arreglo[$gencantlabel];
$sorteo=$Arreglo[$solabel];
$lot=$Arreglo[$lotlabel];
$tipo=$Arreglo[$sotipolabel];
$jugada=$Arreglo[$gennumlabel];
$monto=$Arreglo[$genmontolabel];
$total=$cant*$monto;
$tTarjeta=$metodo[0];
$nTarjeta=$metodo[1];
$titular="GADIEL CASCANTE";
$fecha = explode(" ", fecha_de_hoy());
$vDate= fecha_de_hoy(add_day: "1");
$tDate= $fecha[0];
$time= $fecha[1];
$barCdNum = crear_tickets_codigo();
create_simple_session($sescodigobarra, $barCdNum);
$estado="PAGO";

for ($x = 0; $x < $cant; $x++) {
    $m = $Arreglo[$genmonlabel];
    if ($m == "RD"){
        $m = 1;
    } else {
        $m = 0;
    }
    // insertar_ticket($monto, $_SESSION[$dbtercerosid], $m, $barCdNum);
}
// remover_jugada_estoyharto($_SESSION[$dbtercerosid], $Arreglo);

// $_SESSION[$sestabladejugadas] = [];
// $_SESSION["filasjugadas"] = [];
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div id="invoices" class="containero">


    <div id="invoice" class="receipt">

        <div class="logoDivs">
            <a class="n-logo" href="#">
                <img class="logoS" src="/img/Logo.png" />
            </a>

        </div>
        <CENTER>
            <div>CONSORCIO DE BANCAS INTEGRADOR</div>
        </CENTER>
        <div class="break">------------------------------------</div>

        <div class="address"><?php echo $dir;?></div>
        <div class="break">***********************************</div>
        <div class="address">JUGADAS</div>
        <div class="break">***********************************</div>

        <div class="transactionDetails">
            <div class="detail"><?php echo 'Loteria: ',$lot; ?></div>
        </div>

        <div class="transactionDetails">
            <div class="detail"><?php echo 'Sorteo: ',$sorteo; ?></div>
        </div>

        <div class="transactionDetails">
            <div class="detail"><?php echo 'Tipo: ',$tipo; ?></div>
        </div>
        <div class="transactionDetails">
            <div class="detail"><?php echo 'Monto: ',$monto; ?></div>
        </div>
        <div class="break">**********************************</div>


        
            <div class="address">DETALLE DE JUGADA</div>

 
        <div class="break">**********************************</div>

        <!-- DETALLES DE TICKET START-->

        <?php 
            
            for ($x = 0; $x < $cant; $x++) {
            
            echo '
            
            <div class="transactionDetails"> 

                <div class="detail">'; echo $jugada; echo '</div>
            </div>
            ';  
            }
            
            ?>

    
        <div class="break">**********************************</div>

        <!-- DETALLES DE TICKET END-->

        <div class="transactionDetails"> 



        <div class="paymentDetails bold">
            <div class="detail">TOTAL</div>
            <div class="detail">RD$ <?php echo$total ?></div>
        </div>
        
        </div>

        <!-- DETALLES DE TARJETA START-->
        <div class="creditDetails">
            <p><?php echo$tTarjeta; ?> Numero: <?php echo$nTarjeta;?></p>
            <p><?php echo$titular?> </p>
        </div>
        <!-- DETALLES DE TARJETA END-->

        <div class="returnPolicy bold">TICKET VALIDO HASTA: <?php echo$vDate ?></div>

        <div class="returnPolicy">
       
            <div class="detail"><?php echo$time;?></div>
        </div>

        <div class="tripSummary">
           
            <div class="transactionDetails"> 
                <div class="bold" style="color:green;">Estado: <?php echo$estado ?></div>
            
            </div>
                <!-- BARCODE START-->
                <div class="receiptBarcode" >
                <svg  id="bar" > creta </svg>
                
                </div>
           
        </div>
        <!-- BARCODE END-->
       
        <div class="feedback">

            <div class="break">****************************</div>
            <p class="center">EL VERDADERO VALOR DE JUGAR</p>
            <h3 class="clickBait">VISÍTANOS</h3>
            <h4 class="web">www.BancasIntegrador.com</h4>
            <p class="center">(849) 666-4444</p>
            <div class="break">****************************</div>

        </div>
    </div>

</div>

