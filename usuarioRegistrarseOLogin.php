<!DOCTYPE html>
<html lang="en">

<head>
<?php include("head.php") ?>
</head>
<header>
<?php include("nav.php") ?>
</header>

<body>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <form action="loginForm.php" method="POST">
            <input type="submit" value="Login"/>
        </form>
            
        <form action="usuarioRegistrarse.php" method="POST">
            <input type="submit" value="Registrarse"/>
        </form>

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
