<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Formulario De Error</title>
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

    <form action="">

     <h2>Formulario de Error</h2>
     <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
     <input type="mail" class="form-control mb-3" placeholder="Correo" name="correo"required>
     <input type="phone" class="form-control mb-3" placeholder="Celular" name="cel" maxlength="10" size="10" required>
    

     <center>
     <textarea name="queja" id="queja" cols="50" rows="10" class="form-control mb-3" placeholder="Escriba su Queja"></textarea>
     </center>
     <center>
     <input type="file" class="btn btn-primary" placeholder="Insertar Archivo..." name="arch"required>
     </center>
     <center>
     <input type="submit" class="btn btn-primary" Value="Enviar" name="send">
     <input type="button" class="btn btn-primary" onclick="location.href='index.php';" value="Inicio">
     </center>
   
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
    <center>Bancas Integrador</center>
    <center>PROYECTO INTEGRADOR GRUPO #6</center>
</footer>

</html>
