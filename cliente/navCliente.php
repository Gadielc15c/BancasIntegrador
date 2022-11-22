<div id="container">
  <div class="top">
    <div class="nav">
      <div class="logoDiv">
        <a class="navbar-logo" href="#">
          <img class="logo" src="../img/Logo.png" />
        </a>
      </div>
  
      <div class="opciones">
        <a href="/backend/phpfunctions/logOutTemporal.php" class="NavItem NavButton">
          <ion-icon name="exit"></ion-icon>
          SALIR
        </a>
        <a href="#" class="NavItem NavButton">
          <ion-icon name="settings"> </ion-icon>
          </ion-icon> AJUSTES
        </a>
        <a href="../cliente/cuentasCliente.php" class="NavItem NavButton">
          <ion-icon name="person"></ion-icon> CUENTA
        </a>
        <a href="../cliente/pagosCliente.php" class="NavItem NavButton">
          <ion-icon name="wallet"></ion-icon> PAGOS
        </a>
        <a href="../cliente/jugadasCliente.php" class="NavItem NavButton">
          <ion-icon name="book"></ion-icon> JUGADAS
        </a>
        <a href="../cliente/dashboardCliente.php" class="NavItem NavButton">
          <ion-icon name="apps"></ion-icon> DASHBOARD
        </a>
        <a href="../cliente/inicioCliente.php" class="NavItem NavButton">
          <ion-icon name="home"></ion-icon> INICIO
        </a>
            <div class="opciones">
        <center>
                <fecha class"Smally" style="margin-top: 5px; margin-left: 3%; font-weight: bolder;"> Fecha: <?php

                                                                                                          
                include_once('../backend/phpfunctions/generals.php');
        
            $fecha=$HORA=fecha_de_hoy();
            $newDate = date("d-M-Y", strtotime($fecha)); 
            echo $newDate;
            $TIME= date("h:i A", strtotime($fecha)); 
          
          ?> </fecha>   <hora class"Smally" style="margin-top: 5px; margin-left: 3%; font-weight: bolder;"> Hora:  <?php echo $TIME; ?>
          </hora>
          </center>
            </div>

      </div>
    </div>
  </div>

</div>