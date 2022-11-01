<?php
$path = dirname(__FILE__);
include_once($path . "/phpFunctions/sqlRelated/sqlqueryselect.php");

if (isset($_GET['idterceros'])) {
    $id = $_GET['idterceros'];
    $row = seleccionar_un_usuario_por_idtercero($id);
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
        <form action="/frontend/mantenimientosUsuarios.php" method="POST">

            <input type="hidden" class="form-control mb-3" name="idjugada" placeholder="IDTercero" value="<?php echo $id  ?>">
            <label for="jugnumeros">Numeros de la Jugada</label>
            <input type="text" class="form-control mb-3" name="jugnumeros" placeholder="Numeros Jugadas" value="<?php echo $row['jugnumeros']  ?>">
            <label for="Estado">Estado</label>
            <input type="text" class="form-control mb-3" name="Estado" placeholder="Estado" value="<?php echo $row['estado']  ?>">
            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
            
        </form>


    </div>
</body>

</html>