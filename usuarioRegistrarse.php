<!DOCTYPE html>
<html lang="en">

<head>
<title>Registrarse</title>
<?php include("head.php") ?>
</head>
<header>
<?php include("nav.php") ?>
</header>

<body>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->
        
        <h2 class="active"> Registrarse </h2>
       
        <label for="login">Nombre de tu cuenta:</label>
        <input type="text" id="login" class="fadeIn second" name="Usuario" placeholder="Usuario">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" class="fadeIn third" name="Clave" placeholder="Contraseña">
        <label for="password2">Vuelva a escribir su contraseña:</label>
        <input type="password" id="password2" class="fadeIn third" name="Clave2" placeholder="Contraseña">
        <label for="email">Digite su correo electrónico:</label>
        <input type="text" id="email" class="fadeIn third" name="Correo" placeholder="Correo Electrónico">

        <input type="submit" class="fadeIn fourth" value="Registrarse" name="registrarse-btn">
        


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
