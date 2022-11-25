<?php

function createTicket($dir,$sorteo,$lot,$tipo,$jugada,$monto,$idjugada,$total,$tTarjeta,$nTarjeta,$titular,$vDate,$tDate,$time,$barCdNum,$estado){

echo'
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
	
		<div class="address">'; echo $dir;'</div>

		<div class="break">***********************************</div>

		<div class="address">DETALLES DE JUGADA</div>

		<div class="break">***********************************</div>	

		<div class="transactionDetails">
			<div class="detail">SORTEO:</div>
			<div class="detail">'; echo $sorteo ;'</div>
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
			<div class="detail">'; echo $lot; echo '</div>
			<div class="detail">'; echo $tipo; echo '</div>
			<div class="detail">'; echo $jugada; echo '</div>
			<div class="detail">'; echo $monto; echo '</div>
		</div>
	
		<div class="transactionDetails">
		--------------------------------
		</div>

		<!-- DETALLES DE TICKET END-->

		<div class="survey bold">
			<p>ID TICKET</p>
			<p class="surveyID">'; echo $idjugada; echo'</p>
		</div>

		<div class="paymentDetails bold">
			<div class="detail">TOTAL</div>
			<div class="detail">RD$ '; echo $total; echo'</div>
		</div>
		
		<!-- DETALLES DE TARJETA START-->

		<div class="creditDetails">
			<p>'; echo $tTarjeta; echo' Numero:'; echo $nTarjeta; echo'</p>
			<p>'; echo $titular; echo'</p>
		</div>

		<!-- DETALLES DE TARJETA END-->

		<div class="returnPolicy bold">TICKET VALIDO HASTA: '; echo $vDate; echo'</div>

		<div class="returnPolicy">
			<div class="detail">'; echo $tDate; echo'</div>
			<div class="detail">'; echo $time; echo'</div>
		</div>

		<div class="tripSummary">
			<div class="bold">Estado:</div>
			<div class="item">
			<div>'; echo $estado; echo'</div>
		</div>

		<!-- BARCODE START-->

		<div class="receiptBarcode">
			<!-- LLAMAR BARRAS-->
			'; echo $barCdNum; echo'
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
	
</div>' ;
}
?>