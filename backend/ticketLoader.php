<?php

if (isset($_SESSION['arrayT'])) {
$Arreglo=$_SESSION['arrayT'];


if (isset($_SESSION['MDP'])) {
	$metodo=$_SESSION['MDP'];
}

}

include_once("E:\\xampp\\htdocs\\include_me.php");
include_once(include_me("ticketPrintFunction.php"));
include_once(include_me("generals.php"));
include_once(include_me("llavesYTextos.php"));
include_once(include_me("sqlqueryinsert.php"));
include_once(include_me("sqlquerydelete.php"));


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
$vDate= fecha_de_hoy(add_year: "1");
$tDate= $fecha[0];
$time= $fecha[1];
$barCdNum="666 666 666";
$estado="PAGO";
/*createTicket($dir,$sorteo,$lot,$tipo,$jugada,$monto,$idjugada,$total,$tTarjeta,$nTarjeta,$titular,$vDate,$tDate,$time,$barCdNum,$estado)

*/

for ($x = 0; $x < $cant; $x++) {
    $m = $Arreglo[$genmonlabel];
    if ($m == "RD"){
        $m = 1;
    } else {
        $m = 0;
    }
    insertar_ticket($monto, $_SESSION[$dbuserid], $m, $barCdNum);
}
delete_tablajugadaventadeticket_estoyharto_por_idterceros_fk($_SESSION[$dbuserid]);

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

        <div class="address"><?php echo $dir;?></div>
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
        
            <?php 
            
            for ($x = 0; $x < $cant; $x++) {
            
            echo '
            <div class="transactionDetails">
                <div class="detail">'; echo $lot; echo '</div>
                <div class="detail">'; echo $tipo; echo '</div>
                <div class="detail">'; echo $jugada; echo '</div>
                <div class="detail">'; echo $monto; echo '</div>
            </div>
            ';  
            }
            
            ?>

        <div class="transactionDetails">
            --------------------------------
        </div>

        
        <!-- DETALLES DE TICKET END-->

        <div class="paymentDetails bold">
            <div class="detail">TOTAL</div>
            <div class="detail">RD$ <?php echo$total ?></div>
        </div>


        <!-- DETALLES DE TARJETA START-->
        <div class="creditDetails">
            <p><?php echo$tTarjeta; ?> Numero: <?php echo$nTarjeta;?></p>
            <p><?php echo$titular?> </p>
        </div>
        <!-- DETALLES DE TARJETA END-->

        <div class="returnPolicy bold">TICKET VALIDO HASTA: <?php echo$vDate ?></div>

        <div class="returnPolicy">
            <div class="detail"><?php echo$tDate;?></div>
            <div class="detail"><?php echo$time;?></div>
        </div>

        <div class="tripSummary">

            <div class="item">
                <div class="bold" style="color:green;">Estado: <?php echo$estado ?></div>
            </div>
            <center>
                <!-- BARCODE START-->
              <div class="receiptBarcode">
			  <img
                    src="data:image/jpg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD//gA+Q1JFQVRPUjogZ2QtanBlZyB2MS4wICh1c2luZyBJSkcgSlBFRyB2ODApLCBkZWZhdWx0IHF1YWxpdHkK/9sAQwAIBgYHBgUIBwcHCQkICgwUDQwLCwwZEhMPFB0aHx4dGhwcICQuJyAiLCMcHCg3KSwwMTQ0NB8nOT04MjwuMzQy/9sAQwEJCQkMCwwYDQ0YMiEcITIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIy/8AAEQgAMgByAwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A8/8ACX/JIfiL/wBwz/0oau//AGmv+ZW/7e//AGjXAeEv+SQ/EX/uGf8ApQ1d/wDtNf8AMrf9vf8A7RoAP+bQ/wDP/P8A0f8AN3n+f+fCj/m0P/P/AD/0f83ef5/58KAOA+Nv/JXtd/7d/wD0njr3/wAW/wDJXvh1/wBxP/0nWvAPjb/yV7Xf+3f/ANJ469/8W/8AJXvh1/3E/wD0nWgA8W/8le+HX/cT/wDSda8//Zl/5mn/ALdP/a1egeLf+SvfDr/uJ/8ApOtef/sy/wDM0/8Abp/7WoA9A8Jf8le+Iv8A3DP/AEnavP8A/m0P/P8Az/16B4S/5K98Rf8AuGf+k7V5/wD82h/5/wCf+gDgPgl/yV7Qv+3j/wBJ5K7/APZl/wCZp/7dP/a1cB8Ev+SvaF/28f8ApPJXf/sy/wDM0/8Abp/7WoA4D42/8le13/t3/wDSeOu/+IH/ADWL/uC/+y1wHxt/5K9rv/bv/wCk8dd/8QP+axf9wX/2WgDwCiiigD0Dwl/ySH4i/wDcM/8AShq7/wDaa/5lb/t7/wDaNcx4Y8J+JLf4W+PbObw/qsd1df2f9nheykDy7Z2LbVIy2BycdK7f9ofQtY1v/hHP7J0q+v8AyftPmfZLd5dmfKxnaDjOD19DQBn/APNof+f+f+j/AJu8/wA/8+FaH9hax/wy1/ZH9lX39p/8+X2d/O/4/d33Mbvu89OnNH9hax/w1L/a/wDZV9/Zn/P79nfyf+PLb9/G373HXrxQB5h8bf8Akr2u/wDbv/6Tx17/AOLf+SvfDr/uJ/8ApOteMfF/wn4k1P4pazeWHh/Vbu1k8jZNBZSSI2IIwcMBg4II/Cvb/E9heXHxS8BXkNpPJa2v9ofaJkjJSLdAoXcw4XJ4GetAFfxb/wAle+HX/cT/APSda8//AGZf+Zp/7dP/AGtXpHiewvLj4peAryG0nktbX+0PtEyRkpFugULuYcLk8DPWuH/Z40LWNE/4ST+1tKvrDzvs3l/a7d4t+PNzjcBnGR09RQB2HhL/AJK98Rf+4Z/6TtXn/wDzaH/n/n/r0jwxYXlv8UvHt5NaTx2t1/Z/2eZ4yEl2wMG2seGweDjpXD/2FrH/AAy1/ZH9lX39p/8APl9nfzv+P3d9zG77vPTpzQB5h8Ev+SvaF/28f+k8ld/+zL/zNP8A26f+1q5j4QeE/EmmfFLRry/8P6raWsfn75p7KSNFzBIBliMDJIH412/7PGhaxon/AAkn9raVfWHnfZvL+127xb8ebnG4DOMjp6igDzD42/8AJXtd/wC3f/0njrv/AIgf81i/7gv/ALLXMfF/wn4k1P4pazeWHh/Vbu1k8jZNBZSSI2IIwcMBg4II/Cu38caFrF3/AMLW+zaVfTfbv7I+yeXbu32jZt37MD5tvfGcd6APnCiug/4QTxh/0Kmuf+C6b/4migD7fooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA//2Q==">
                
                </div>
                <?php echo$barCdNum; ?>
        </div>
        <!-- BARCODE END-->
        </center>
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