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


              <div class="contLot">
                <p class="font-weight-bold">Juega + Pega +</p>
                  <div class="pie">
                    <p class="font-weight-bold">Lunes-Sabados </p>
                    <p>7:00am - 2:25pm </p>
                    <p><b>Sorteos:</b>Lunes a Sabados</p>
                    <p>2:30pm</p>                 
                  </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Gana Más</p>
                  <div class="pie">
                  <p class="font-weight-bold">Lunes-Sabados </p>
                    <p>7:00am - 2:25pm  </p>
                    <p><b>Sorteos:</b> Lunes-Sabados</p>
                    <p>2:30pm</p>
                 </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Lotería Nacional Noche</p>
                  <div class="pie">
                  <p class="font-weight-bold">Lunes-Domingos </p>
                    <p>L-D 7:00am - 8:45pm D 7:00am - 5:55pm</p>
                    <p><b>Sorteos:</b> Lunes-Domingos</p>
                     <p>L-S 8:50pm - D: 6:00pm</p>
                  </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Pega 3 Más</p>
                  <div class="pie">
                  <p class="font-weight-bold">Lunes-Domingos</p>
                    <p>L-S 7:00am - 8:50pm - 7:00am - 3:50pm </p>
                    <p><b>Sorteos:</b>Lunes a Domingos</p>
                    <p>L-S 8:55pm - D 3:55pm</p>
                  </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Quiniela Leidsa</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes-Domingo</p>
                  <p>7:00am - 8:50pm - D 7:00am - 3:50pm </p>
                  <p><b>Sorteos:</b> Lunes-Domingo</p>
                  <p>L-S 8:55pm - D 3:55pm</p>
                </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Loto Pool</p>
                 <div class="pie">
                 <p class="font-weight-bold">Lunes a Domingos</p>
                    <p>L-S: 7:00am - 8:50pm - D: 7:00am - 3:50pm </p>
                    <p><b>Sorteos:</b> Lunes a Domingos</p>
                    <p> L-S 8:55pm - D 3:55pm</p>
                  </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Super Kino TV</p>
                  <div class="pie">
                  <p class="font-weight-bold">Lunes a Domingos</p>
                    <p>L-S: 7:00am - 8:50pm -- D: 7:00am - 3:50pm </p>
                    <p><b>Sorteos:</b> Lunes a Domingos </p>
                    <p>L-S 8:55pm - D 3:55pm</p>
                  </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Super Loto Más</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Domingos</p>
                  <p>7:00am - 8:50pm </p>
                  <p><b>Sorteos:</b> Miercoles Y Sabados</p>
                  <p>8:55pm</p>
                </div>
              </div>


              <div class="contLot">
                <p class="font-weight-bold">Loto Pool Real</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Domingos</p>
                  <p>7:00am - 12:55pm </p>
                  <p><b>Sorteos:</b> Lunes a Domingos</p>
                  <p>1:00pm </p>
                </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Quiniela Real</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Domingos</p>
                  <p>7:00am - 12:50pm </p>
                  <p><b>Sorteos:</b> Lunes a Domingos</p>
                  <p> 12:55pm</p>
                </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Loto Real</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Domingos</p>
                  <p>7:00am - 12:50pm</p>
                  <p><b>Sorteos:</b> Martes y Viernes </p>
                  <p>12:55pm</p>
                </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Quiniela Loteka</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Domingos</p>
                  <p>7:00am - 7:50pm </p>
                  <p><b><Sorteos:</b> Lunes a Domingos</p>
                  <p>7:55pm </p>
                </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Mega Chances Loteka</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Domingos</p>
                  <p>7:00am - 7:50pm </p>
                  <p><b><Sorteos:</b> Lunes a Domingos</p>
                  <p><b>7:55pm</p>
                </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">New York Tarde</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Domingos</p>
                  <p>7:00am-2:25pm </p>
                  <p><b><Sorteos:</b> Lunes a Domingos</p>
                  <p>2:30pm USA 3:30pm RD</p> 
                </div>          
              </div>

              <div class="contLot">
                <p class="font-weight-bold">New York Noche</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Domingos</p>
                  <p>7:00am-10:25pm </p>
                  <p><b><Sorteos:</b> Lunes a Domingos</p>
                  <p>10:30pm USA 11:30pm RD</p>           
                 </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">New York Noche</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Domingos</p>
                  <p>7:00am-10:25pm </p>
                  <p><b><Sorteos:</b> Lunes a Domingos</p>
                  <p>10:30pm USA 11:30pm RD</p>
                </div>           
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Florida Dia</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Domingos</p>
                  <p>7:00am-1:25pm </p>
                  <p><b><Sorteos:</b> Lunes a Domingos</p>
                  <p>1:30pm USA 2:30pm RD</p>  
                </div>         
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Florida Noche</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Domingos</p>
                <p>7:00-9:40pm </p>
                <p><b><Sorteos:</b> Lunes a Domingos</p>
                <p>9:45 USA 10:45 RD</p> 
                </div>          
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Mega Million</p>
                <div class="pie">
                <p class="font-weight-bold">Martes y Viernes</p> 
                <p>7:00am-10:55pm</p>
                  <p><b>Sorteos:</b> Martes y Viernes</p>  
                  <p><b>11:00pm</p> 
                </div>         
              </div>

              <div class="contLot">
                <p class="font-weight-bold">PowerBall</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Domingos</p> 
                <p>7:00am-8:55pm</p>
                <p><b>Sorteos:</b> Miercoles y Sabados</p>  
                <p><b>10:59pm</p> 
     
                
                </div>         
              </div> 

              <div class="contLot">
                <p class="font-weight-bold">Cash 4 Life</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a viernes</p>
                 <p>7:00am-8:55pm</p>
                 <p><b>Sorteos:</b> Lunes a Viernes</p> 
                 <p>9:00pm</p>
                </div>       
              </div>

              <div class="contLot">
                <p class="font-weight-bold">La primera Día</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Dommingos</p>
                  <p>7:00am - 11:55am </p>
                  <p><b>Sorteos:</b> Lunes a Domingos</p>
                  <p>12:00pm </p>
                </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">La primera NOCHE</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Dommingos</p>
                  <p>7:00am - 7:55pm </p>
                  <p><b>Sorteos:</b> Lunes a Domingos</p>
                  <p>8:00pm </p>
                </div>
              </div>


              <div class="contLot">
                <p class="font-weight-bold">La Suerte 12:30</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Dommingos</p>
                 <p>7:00am - 12:25pm </p>
                 <p><b>Sorteos:</b> Lunes a Domingos</p>
                 <p>12:30pm </p>

                </div>
              </div>


              <div class="contLot">
                <p class="font-weight-bold">La Suerte 18:00</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Dommingos</p>
                 <p>7:00am - 5:55PM </p>
                  <p><b>Sorteos:</b> Lunes a Domingos</p>
                  <p>6:00pm</p>
                </div>
              </div>


              <div class="contLot">
                <p class="font-weight-bold">Quiniela LoteDom</p>
                <div class="pie">
                  <p class="font-weight-bold">Lunes a Dommingos</p>
                  <p>7:00am - 1:50pm </p>
                  <p><b>Sorteos:</b> Lunes a Dommingos </p>
                  <p>1:55pm </p>
                </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Quemaito Mayor</p>
                <div class="pie">
                  <p class="font-weight-bold">Lunes a Dommingos</p>
                  <p>7:00am - 1:50pm </p>
                  <p><b>Sorteos:</b> Lunes a Dommingos</p>
                  <p>1:55pm </p>
                </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Anguila Mañana</p>
                <div class="pie">
                  <p class="font-weight-bold">Lunes a Dommingos</p>
                  <p>7:00am - 9:55am </p>
                  <p><b>Sorteos:</b> L-D 10:00am</p>
                </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Anguila Medio Dia</p>
                <div class="pie">
                  <p class="font-weight-bold">Lunes a Dommingos</p>
                  <p>7:00am - 12:55pm </p>
                  <p><b>Sorteos:</b> Lunes a Domingos </p>
                  <p>1:00pm </p>
              
                </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Anguila Tarde</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Dommingos</p>
                  <p>7:00am - 5:55pm </p>
                  <p><b>Sorteos:</b> Lunes a Domingos</p>
                  <p>6:00pm </p>

                </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">Anguila Noche</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Dommingos</p>
                  <p>7:00am - 8:55pm </p>
                  <p><b>Sorteos:</b> Lunes a Domingos</p>
                  <p>9:00pm </p>

                </div>
              </div>


              <div class="contLot">
                <p class="font-weight-bold">King Lottery 12:30</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Domingos</p>
                  <p>7:00am - 12:25pm </p>
                  <p><b>Sorteos:</b> Lunes a Domingos </p>
                  <p>12:30pm </p>
                
                </div>
              </div>

              <div class="contLot">
                <p class="font-weight-bold">King Lottery 7:30</p>
                <div class="pie">
                <p class="font-weight-bold">Lunes a Domingos</p>
                  <p>7:00am - 7:25pm </p>
                  <p><b>Sorteos:</b> Lunes a Domingos </p>
                  <p>7:30pm </p>
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

</body>
<footer>
  <?php include("footer.php") ?>
</footer>
</html>
