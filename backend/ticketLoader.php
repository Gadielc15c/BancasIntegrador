<?php

$path = dirname(__FILE__);
include('../backend/phpfunctions/ticketPrintFunction.php');
$dir="Calle Roberto Barrerassss";
$sorteo="GanaMas";
$lot="Nacional";
$tipo="Pata";
$jugada="10-12-54";
$monto="10";
$idjugada="254545";
$total="30";
$tTarjeta="MASTERCAR";
$nTarjeta="**** **** **83";
$titular="GADIEL CASCANTE";
$vDate="15-11-2021";
$tDate="15-11-2021";
$time="10:57 P,";
$barCdNum="666 666 666";
$estado="PAGO";
/*createTicket($dir,$sorteo,$lot,$tipo,$jugada,$monto,$idjugada,$total,$tTarjeta,$nTarjeta,$titular,$vDate,$tDate,$time,$barCdNum,$estado)

*/


?>


<div id="showScroll" class="containero">
    
	<div class="receipt">
  
    <div class="logoDivs">
                <a class="n-logo" href="#">
                    <img class="logoS" src="/img/Logo.png" />
                </a>
             
            </div>
            <CENTER>
        <div>CONSORCIO DE BANCAS INTEGRADOR</div>
        </CENTER> 
		<div class="break">------------------------------------</div>
	
						<div class="address">';<?php echo $dir;?>'</div>
			<div class="break">***********************************</div>
						<div class="address">DETALLES DE JUGADA</div>
			<div class="break">***********************************</div>	

					<div class="transactionDetails">
						<div class="detail">SORTEO:</div>
						<div class="detail"><?php echo $sorteo;  ?></div>
						<div class="detail"></div>
					</div>

		<div class="transactionDetails">
			<div class="detail">LOTERIA</div>
			<div class="detail">TIPO</div>
			<div class="detail">JUGADA</div>
			<div class="detail">MONTO</div>
			
		</div>
		<div class="break">***********************************</div>

	<!-- DETALLES DE TICKET START-->
		<div class="transactionDetails">
		<div class="detail"><?php echo $lot;  ?></div>
		<div class="detail"><?php  echo $tipo;  ?></div>
		<div class="detail"><?php echo $jugada;  ?></div>
		<div class="detail"><?php echo $monto;  ?></div>
		</div>
	
		<div class="transactionDetails">
		--------------------------------
	
		
	</div>
	<!-- DETALLES DE TICKET END-->

		<div class="survey bold">
			<p>ID TICKET</p>
			<p class="surveyID">';echo$idjugada;echo'</p>
		</div>

		<div class="paymentDetails bold">
			<div class="detail">TOTAL</div>
			<div class="detail">RD$ ';echo$total;echo'</div>
		</div>
		
				
	<!-- DETALLES DE TARJETA START-->
		<div class="creditDetails">
			<p>';echo$tTarjeta;echo' Numero:';echo$nTarjeta;echo'</p>
			<p>';echo$titular;echo'</p>
		</div>
		<!-- DETALLES DE TARJETA END-->

		<div class="returnPolicy bold">TICKET VALIDO HASTA: ';echo$vDate;echo'</div>

	<div class="returnPolicy">
		<div class="detail">';echo$tDate;echo'</div>
		<div class="detail">';echo$time;echo'</div>
	</div>

	<div class="tripSummary">
		<div class="bold">Estado:</div>
		<div class="item">
		<div>';echo$estado;echo'</div>
	</div>

	<!-- BARCODE START-->
	<div class="receiptBarcode">
	<!-- LLAMAR BARRAS-->
		</div>
	';echo$barCdNum;echo'
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
	
</div>