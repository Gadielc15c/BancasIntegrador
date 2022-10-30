<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Mantenimiento Tikcets</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta name="description" />
    <meta name="generator" content="HAPedit 3.1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/cuerpoWeb.css" />

</head>
<header>
    <?php include('../frontend/nav.php');?>
</header>

<body>
    
<div class="container2">
   <div class="cuadrado">
     
         
     <form action="">
        <h2>Mantenimiento Ticket</h2>
                <input type="text" class="form-control mb-3" name="idticket" placeholder="ID Ticket">
                <input type="text" class="form-control mb-3" name="monto" placeholder="Monto">
                <input type="date" class="form-control mb-3" name="fecha" placeholder="Fecha">
                <input type="text" class="form-control mb-3" name="estado" placeholder="Estado">
                <input type="submit" class="btn btn-primary" value="Buscar">
                <input type="submit" class="btn btn-primary" value="Eliminar">
                <input type="submit" class="btn btn-primary" value="Modificar">
            </form>



        <div class="row-md-7">
            <table class="table">
                <thead class="table-warning table-striped">
                    <tr style="text-align: center;">
                        <th>ID Ticket</th>
                        <th>MONTO</th>
                        <th>FECHA</th>
                        <th>ESTADO</th>
                     </tr>
                 
                   </thead>
                </table>
            
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
    <center>Bancas Integrador</center>
    <center>PROYECTO INTEGRADOR GRUPO #6</center>
</footer>

</html>
