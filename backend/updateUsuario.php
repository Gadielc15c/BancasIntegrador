<?php
include("conexion.php");
$con = conectar();

if (isset($_GET['idterceros'])) {
    $id = $_GET['idterceros'];
}
$sql = "SELECT * FROM terceros WHERE idterceros='$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
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
        <form action="update.php" method="POST">
            <input type="hidden" class="form-control mb-3" name="CodigoArchivo" placeholder="CodigoArchivo " value="<?php echo $row['idterceros']  ?>">
            <input type="text" class="form-control mb-3" name="CodDepto" placeholder="Codigo de departamento" value="<?php echo $row['nomusuario']  ?>">
            <input type="text" class="form-control mb-3" name="AreaReferencia" placeholder="Area de Referencia" value="<?php echo $row['claveusuario']  ?>">
            <input type="text" class="form-control mb-3" name="Delivery" placeholder="Persona que entrega" value="<?php echo $row['correo']  ?>">
            <input type="text" class="form-control mb-3" name="Delivery" placeholder="Persona que entrega" value="<?php echo $row['cedula']  ?>">
            <input type="text" class="form-control mb-3" name="Delivery" placeholder="Persona que entrega" value="<?php echo $row['estado']  ?>">
            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">

        </form>


    </div>
</body>

</html>