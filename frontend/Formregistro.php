<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>REGISTRO</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta name="description" />
    <meta name="generator" content="HAPedit 3.1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/cuerpoWeb.css" />
    <link rel="stylesheet" href="/css/login.css" />
</head>

<header>
<?php include('../cliente/navCliente.php');?>
</header>

<body>

    <div class="wrapper fadeInDown">
      <div id="formContent">

      <h2 class="active"> REGISTRO </h2>

      <form>
  <div class="form-row">
    <div class="col">
      <label for=""><span style="color:rgba(245,167,37,1);">Nombre</span></label>
      <input type="text" class="form-control" placeholder="Ivan">
    </div>
    <div class="col">
      <label for=""><span style="color:rgba(245,167,37,1);">Apellido</span></label>
      <input type="text" class="form-control" placeholder="Mendoza">
    </div>
  </div>
  
  <div class="form-row">
    <div class="col">
    <label for=""><span style="color:rgba(245,167,37,1);">Direcion</span></label>
      <input type="text" class="form-control" placeholder="klk@gmail.com">
    </div>
    <div class="col">
    <label for=""><span style="color:rgba(245,167,37,1);">Contraseña</span></label>
      <input type="text" class="form-control" placeholder="1234">
    </div>
  </div>

  <div class="form-row">
    <div class="col">
    <label for=""><span style="color:rgba(245,167,37,1);">Direccion</span></label>
      <input type="text" class="form-control" placeholder="Av. KFC">
    </div>
    <div class="col">
    <label for=""><span style="color:rgba(245,167,37,1);">Telefono</span></label>
      <input type="text" class="form-control" placeholder="555-555-5555">
    </div>
  </div>


  <input type="submit" class="fadeIn fourth" value="REGISTRAR" name="login-btn">
</form>
            <div id="formFooter">
            <a class="underlineHover" href="/backend/phpfunctions/logOutTemporal.php"">Ya tengo una cuenta</a>
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
  <?php include('../frontend/footer.php') ?>
</footer>
</html>
