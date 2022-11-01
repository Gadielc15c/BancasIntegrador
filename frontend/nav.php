
<div id="container">
    <div class="top">
        <div class="nav">
            <div class="logoDiv">
                <a class="navbar-logo" href="#">
                    <img class="logo" src="/img/Logo.png" />
                </a>
             
            </div>
            <!--
            <small class"Smally"style="margin-top: 5px; margin-left: 3%; font-weight: bolder;"> Fecha: <?php
            
            /*GADIEL VERIFICAR RUTA  PERSONAL*/
            /*
            include_once('.//backend/phpfunctions/generals.php');
    
        $fecha=$HORA=fecha_de_hoy();
        $newDate = date("d-M-Y", strtotime($fecha)); 
        echo $newDate;
        $TIME= date("h:i A", strtotime($fecha)); 
       */
        ?> Hora: <?php  echo $TIME; ?>
       <small>-->
        <div class="opciones">
          <a href="/backend/phpfunctions/logOutTemporal.php" class="NavItem NavButton">
          <ion-icon name="exit"></ion-icon>
           SALIR
          </a>
          <a href="/frontend/cuentas.php" class="NavItem NavButton">
            <ion-icon name="person"></ion-icon> CUENTA
          </a>
          <a href="/frontend/metodoPagos.php" class="NavItem NavButton">
            <ion-icon name="wallet"></ion-icon> PAGOS
          </a>
          <a href="/frontend/menuMantenimiento.php" class="NavItem NavButton">
          <ion-icon name="construct"></ion-icon> MANTENIMIENTOS
          </a>
          <a href="/frontend/Jugada.php" class="NavItem NavButton">
            <ion-icon name="book"></ion-icon> JUGADAS
          </a>
          <a href="/frontend/dashBoard.php" class="NavItem NavButton">
            <ion-icon name="apps"></ion-icon> DASHBOARD
          </a>
          <a href="/index.php" class="NavItem NavButton">
            <ion-icon name="home"></ion-icon> INICIO
          </a>
          
        
        </div>
   
      </div>
    </div>

</div>