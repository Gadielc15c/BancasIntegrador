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
<?php include('../frontend/nav.php');?>
</header>

<body>

<div class="container2">
 <div class="cuadrado">

        <div class="contact-wrapper animated bounceInUp">
            
            <div class="contact-form">
                <h3><span style="color:rgba(245,167,37,1);">NAME MANTENIMIENTO</span></h3>
                <form action="">
                <p>
        <label for="nombre">Nombre de Usuario</label>
        <input type="text" name="nombre" id="nombre">
     </p>

     <p>
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" id="pass">
     </p>

     <p>
        <label for="email">Correo</label>
        <input type="email" name="email" id="email">
     </p>

     <p>
        <label for="cedula">Cedula</label>
        <input type="text" name="cedula" id="cedula">
     </p>


     <p>
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha">
     </p>

     <p >
        <label for="estado">Estado
        <input type="checkbox" name="estado"checked>
        </label>
        
     </p>

     <p class="block">

      <select name="select">
        <option value="value1">OPCIONES</option>
        <option value="value2" selected>Value 1</option>
        <option value="value3">Value 2</option>
      </select>

     </p>

    

                </form>
                <input type="submit" class="fadeIn fourth" value="BUSCAR" name="login-btn" style="
                display:block;
                margin-left: auto;
                margin-right: auto;">
            </div>
            <div class="contact-info">
            <div class="row-md-7">
    <table class="table">
        <thead class="table-warning table-striped">
            <tr style="text-align: center;">
                <th style="text-align: center;">LOTERIA</th>
                <th style="text-align: center;">NUMEROS JUGADOS</th>
                <th style="text-align: center;">TIPO DE JUGADA</th>
                <th style="text-align: center;">MONTO</th>
                
            </tr>
        </thead>
     </table>
  </div>
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
  <?php include('../frontend/footer.php') ?>
</footer>
</html>
