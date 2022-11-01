<?php
$path = dirname(__FILE__);
include_once($path . "/phpFunctions/sqlRelated/sqlqueryselect.php");
$path = dirname(__FILE__);
include_once($path . "/phpFunctions/sqlRelated/sqlqueryupdate.php");

if (isset($_POST['submit'])){
    $id = $_POST['idterceros'];
    $nomuser = $_POST['nomusuario'];
    $correo = $_POST['correo'];
    $cedula = $_POST['cedula'];
    $estado = $_POST['estado'];
    $value = update_tercero_por_idtercero($id, $nomuser, $correo, $cedula, $estado);
    // si value es TRUE, funciono el update, de lo contrario es false
}

if (isset($value)){
    // Debe coincidir con las columnas de la BD
    // Esto evita doble llamada a la base de datos (update y select = 2 llamadas)
    $row = array();
    $row['idterceros'] = $id;
    $row['nomusuario'] = $nomuser;
    $row['correo'] = $correo;
    $row['cedula'] = $cedula;
    $row['estado'] = $estado;

} elseif (isset($_GET['idterceros'])){
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
        <form action="<?php $_PHP_SELF  ?>" method="POST">
            <input type="hidden" class="form-control mb-3" name="idterceros" placeholder="IDTerceros" value="<?php echo $id  ?>">
            <input type="text" class="form-control mb-3" name="nomusuario" placeholder="Username" value="<?php echo $row['nomusuario']  ?>">
            <input type="text" class="form-control mb-3" name="correo" placeholder="Correo" value="<?php echo $row['correo']  ?>">
            <input type="text" class="form-control mb-3" name="cedula" placeholder="Cedula" value="<?php echo $row['cedula']  ?>">
            <input type="text" class="form-control mb-3" name="estado" placeholder="Estado" value="<?php echo $row['estado']  ?>">
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Actualizar">
            
            
        </form>


    </div>
</body>

</html>