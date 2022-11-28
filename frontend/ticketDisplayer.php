<?php

include_once('../backend/phpfunctions/sessionsFunctions.php');
$nivel=4;
SessionControl($nivel);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<script src="../js/barcodegen.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script nomodule src="../js/tarjeta.js"></script>
    <meta charset="utf-8">
    <title>RECIBO</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta name="description" />
    <meta name="generator" content="HAPedit 3.1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/cuerpoWeb.css" />
    <link rel="stylesheet" href="/css/tarjeta.css" />
    <link rel="stylesheet" href="/css/ticket.css" />

    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js""></script>
</head>
<header>
    
   <?php include('../cliente/navCliente.php'); ?>
   
</header> 

<div class="container" style="margin-right:-260px;">
  
<div class="row">
<button id = "download-button" class="btn btn-danger" style="margin-left:10px; margin-top:10px;"> GENERAR PDF </button>
</div>

<div class="row">
<button id = "download-button" class="btn btn-success" style="margin-left:10px; margin-top:10px;"> GENERAL EXCEL</button>
</div>

 <div class="row">
<button id = "download-button" class="btn btn-primary" style=" margin-left:10px;  margin-top:10px;"> GENERAR WORD</button>
</div>
</div>


    
<body >

        
        <div class="cuadrado">
        
    <?php 
        include('../backend/ticketLoader.php');
        include_once('../backend/phpfunctions/generals.php');
        include_once('../backend/llavesYTextos.php');
        $a = $_SESSION[$sescodigobarra];
        // $a=crear_tickets_codigo();
    ?>

        </div>

    <script src = "JsBarcode.all.min.js" >
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/imask/3.4.0/imask.min.js'></script>
    <script src="/js/tarjeta.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--Script de iconos-->
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!--No borrar-->

    </body >

    <footer>

        <?php include('../frontend/footer.php'); ?>
<input type="hidden" id="generate" value="<?php echo $a; ?>">

    </footer>
    <script>
    const button = document.getElementById('download-button');

  var ajustes = {
  margin:       0,
  filename:     'Ticket.pdf',
  image:        { type: 'png'},
  html2canvas:  { scale: 2},
  jsPDF:        { unit: 'in', format: [3.3, 15], orientation: 'portrait', deletePage: 2 },
 pagebreak: { mode: 'avoid-all', after: '#invoice' }
};
    function generatePDF() {
        const element = document.getElementById('invoice');
        html2pdf().set(ajustes).from(element).save();
    }

    button.addEventListener('click', generatePDF);
    </script>

<script type="text/javascript"/>
    
    document.addEventListener("DOMContentLoaded", function() {
var text = document.getElementById("generate").value;
JsBarcode("#bar",text);


})
function scrollBottom() {window.scrollTo(0, 99999);}
if (document.addEventListener) document.addEventListener("DOMContentLoaded", scrollBottom, false)
else if (window.attachEvent) window.attachEvent("onload", scrollBottom);
</script>
</html>