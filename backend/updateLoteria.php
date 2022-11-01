<?php


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
    <div class="container mt-5">

        <h1>Actualizar Valores</h1>
    </div>
    <div class="container mt-5">
        <form action=" " method="POST">
            <input type="hidden" class="form-control mb-3" name="idloteria" placeholder="ID Loteria" value="<?php echo $idloteria?>">
           <label for=Username"">Nombre</label>
            <input type="text" class="form-control mb-3" name="Nombre" placeholder="Nombre" value="<?php echo $row['nomloteria']  ?>">
            <label for="diaLaboral">Dia Laboral</label>
            <input type="text" class="form-control mb-3" name="horalaboral" placeholder="Hora Laboral" value="<?php echo $row['horalaboral']  ?>">
            <label for="horacierre">Hora Cierre</label>
            <input type="text" class="form-control mb-3" name="horacierre" placeholder="Hora Cierre" value="<?php echo $row['horalaboral']  ?>">
            <label for="Estado">Estado</label>
            <input type="text" class="form-control mb-3" name="Estado" placeholder="Estado" value="<?php echo $row['estado']  ?>">
            <input type="submit" class="btn btn-warning btn-block" value="Actualizar">
            
        </form>


    </div>
</body>

</html>