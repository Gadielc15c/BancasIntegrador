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
    <?php include('C:\xampp\htdocs\BancasIntegrador\frontend\navVACIO.php');?>
</header>

<body>

<form action="">
    <table>
        <tr>
         <center>
            <p>Nombre:</p>
             <p> <input type="text" placeholder="Tu nombre" name="nombre"required></p>
            <p>Correo:</p>
             <p> <input type="mail" placeholder="Tu correo" name="correo"required></p>
            <p>Telefono Para Contacto:</p>
             <p> <input type="phone" placeholder="Tu celular" name="cel" maxlength="10" size="10" required></p>
            <p>Descripcion Del Problema:</p>
             <p> <input type="text" placeholder="Inserta la queja..." name="descrip"required></p>
            <p>Adjuntar captura del Error o Queja:</p>
            <p> <input type="file" placeholder="Insertar archivo..." name="arch"required></p>
         </center>
        </tr>

        <tr> 
        <center>
         <t>
            <input type="submit" Value="Enviar" name="send">
        </t>

         <t>
           <input type="button" onclick="location.href='index.php';" value="Inicio" />
         </t>
         </center>
        </tr>
    <br></br>
</body>

<footer>
<?php include('/frontend/footer.php');?>>
</footer>

</html>
