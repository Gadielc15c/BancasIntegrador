<?php

$path = dirname(__FILE__);
include_once($path . "/phpFunctions/sqlRelated/sqlqueryselect.php");
if (isset($_GET['idtickets'])) {
    $idTcket = $_GET['idtickets'];
    $row = seleccionar_ticket_por_idticket($idTcket);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Actualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<header>

</header>

<body>
    <div class="container mt-5" style="padding-bottom: 50px;">

        <h1>Actualizar Valores</h1>
    </div>
    <div class="container mt-5">
        <form action="/frontend/mantenimientoTicket.php" method="POST">
            <input type="hidden" class="form-control mb-3" name="idtickets" placeholder="ID Ticket" value="<?php echo $idTcket  ?>">
           <label for="monto">Monto</label>
            <input type="text" class="form-control mb-3" name="monto" placeholder="Monto" value="<?php echo $row['monto']  ?>">
            <label for="monedas_fk">Moneda</label>
            <input type="text" class="form-control mb-3" name="monedas_fk" placeholder="monedas_fk" value="<?php echo $row['monedas_fk']  ?>">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control mb-3" name="fecha" placeholder="Fecha" value="<?php echo $row['fecha']  ?>">
            <label for="estado">Estado</label>
            <input type="text" class="form-control mb-3" name="estado" placeholder="Estado" value="<?php echo $row['estado']  ?>">
            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
            
        </form>


    </div>
</body>

</html>