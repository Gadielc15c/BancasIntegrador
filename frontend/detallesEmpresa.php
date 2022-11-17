<?php

session_start();
if(!isset($_SESSION['nivel'])){

header('location:  ../index.php');
    
}else {
    if($_SESSION['nivel']!=4){

header('location:  ../index.php');

    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Jugada</title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="description" />
  <meta name="generator" content="HAPedit 3.1" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/cuerpoWeb.css" />
  <link rel="stylesheet" href="/css/horarios.css" />


</head>
<header>
<?php include('../frontend/nav.php');?>
</header>

<body>

<div class="container2">
    <div class="cuadrado">
        <section>

            <h2 class="font-weight-bold " style=" padding-top: 55px; padding-left: 25px">
                                    NOSOTROS
            </h2>
           
                <h3 class="font-weight-bold" style=" padding-top: 10px; padding-left: 25px; color:rgba(245, 167, 37, 1) ">
                    Mision 
                </h3>
                <p class="font-weight-Normal" style="font-size:16px; padding-left: 25px; padding-bottom: 20px;">
                    Garantizar a nuestros clientes seguridad y confianza al momento de elegir nuestros.
                 </p>
                <h3 class="font-weight-bold" style=" padding-top: 10px; padding-left: 25px; color:rgba(245, 167, 37, 1) ">
                    Vision 
                </h3>
                <p class="font-weight-Normal" style="font-size:16px; padding-left: 25px; padding-bottom: 20px;">
                     Ofrecer el servicio de más alta calidad en cada jugada, creando fidelidad en nuestros clientes y oportunidad de crecimiento a nuestros empleados, colaborando con recursos para el bienestar social.
                </p>
                <h3 class="font-weight-bold" style=" padding-top: 10px; padding-left: 25px; color:rgba(245, 167, 37, 1) ">
                  Valores 
                </h3>
                <ul class="font-weight-Normal" style="font-size:16px; padding-left: 35px; padding-bottom: 20px" >
		            <li type="square">Solvencia</li>
		            <li type="square">Confiabilidad</li>
		            <li type="square">Responsabilidad</li>
		            <li type="square">Compromiso Social</li>
		            <li type="square">Calidad</li>
		            <li type="square">Ética</li>
		            <li type="square">Integridad</li>
		            <li type="square">Honestidad</li>
                </ul>

        </section>
        <section>
               <h3 class="font-weight-bold" style=" padding-top: 10px; padding-left: 25px; color:rgba(245, 167, 37, 1) ">
                  UBICACION 
               </h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3754.5526071875993!2d-70.652585!3d19.774154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTnCsDQ2JzI3LjAiTiA3MMKwMzknMDkuMyJX!5e0!3m2!1ses!2sdo!4v1668563236463!5m2!1ses!2sdo" width="600" height="450" style="border:0; padding-top: 55px; padding-left: 25px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>

        <section>
         <h3 class="font-weight-bold " style=" padding-top: 55px; padding-left: 25px">
                                    HORARIOS DE LOTERIAS 
          </h3>
          <h3 class="font-weight-bold" style=" padding-top: 10px; padding-left: 25px; color:rgba(245, 167, 37, 1) ">
                    Loteria Nacional
            </h3>

            <div class="horarios">
                <div clas="pie">
                <p class="font-weight-bold">Juega + Pega +</p>
                  <p>L-S: 7:00am - 2:25pm  </p>
                  <p><b>Sorteos:</b> 2:30pm  </p>
              </div>
            <div>

            <div class="horarios">
                <div clas="pie">
                <p class="font-weight-bold">Gana Más</p>
                  <p>L-S: 7:00am - 2:25pm  </p>
                  <p><b>Sorteos:</b> 2:30pm  </p>
              </div>
            <div>

            <div class="horarios">
                <div clas="pie">
                <p class="font-weight-bold">Lotería Nacional Noche</p>
                <p>L-S: 7:00am - 8:45pm -- D: 7:00am - 5:55pm </p>
                <p><b>Sorteos:</b> L-S 8:50pm -- D: 6:00pm</p>
              </div>
            <div>

            
        </section>
    </div>

</div>

<!--No borrar-->
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <!--Script de iconos-->
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!--No borrar-->

</body>
<footer>
  <?php include("footer.php") ?>
</footer>
</html>
