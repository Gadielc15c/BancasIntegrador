<?php

$path = dirname(__FILE__, 2);
include_once($path . "/phpFunctions/sqlRelated/sqlqueryselect.php");
$path = dirname(__FILE__, 2);
include_once($path . "/phpFunctions/sqlRelated/sqlqueryupdate.php");

function crear_mantenimientos_form($function_select, $encabezado, $table, $array_columnas_exception = null, $array_placeholder, $array_text, $href_editar, $href_delete){
    // array text y placeholder deben coincidir en tamaño y el orden con las columnas de la tabla en la BD

    $col = retorno_nombre_columnas($table);
    $query= $function_select;
    
    echo '
    <div class="container mt-5">
        <div class="row">

            <div class="col-md-6">
                <h1>'; echo $encabezado; echo '</h1>
                <form action=" " method="POST">';

                for ($i = 0; $i < count($col); $i++) {
                    $value = $col[$i];
                    $tipo = "text";
                    if ($value == "correo"){
                        $tipo = "email";
                    }
                    if (!in_array($value, $array_columnas_exception)){

                        echo '<input type="'; echo $tipo; echo '" class="form-control mb-3" name="'; echo $value; echo'" placeholder="'; echo $array_placeholder[$i]; echo'">';
                    }
                }
                echo '
                <input type="submit" class="btn btn-primary" value="Buscar">
                </form>

            </div>

            <div class="col-md-7 col-md-offset-2"></div>

            <div class="row-md-7">
                <table class="table">
                    <thead class="table-warning table-striped">
                        <tr style="text-align: center;">';
                        for ($i = 0; $i < count($col); $i++) {
                            $value = $col[$i];
                            if (!in_array($value, $array_columnas_exception)){
                            echo '<th>'; echo $array_text[$i]; echo '</th>';
                            }
                        }
                        echo '
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                        foreach ($query as $row){
                            echo '<tr>';
                            for ($i = 0; $i < count($col); $i++) {
                                $value = $col[$i];
                                if (array_key_exists($value, $row)){
                                    $reply = $row[$value];

                                    if (!in_array($value, $array_columnas_exception)){
                                        if ($value == "estado"){
                                            $reply = ucfirst(por_estado_activo_inactivo($row["estado"]));
                                        }
                                        echo '<th>'; echo $reply; echo '</th>';
                                    }
                                }
                            }
                            echo '
                            <th><a href="'; echo $href_editar . $row[0]; echo '" 
                                    class="btn btn-warning">EDITAR</a></th>

                            <th><a href="'; echo $href_delete . $row[0]; echo '"
                                    class="btn btn-danger">ELIMINAR</a></th>

                            </tr>'; 
                        } echo '
                        <style>
                        th {
                            text-align: justify;
                        }
                        </style>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    ';
}


function crear_update_form($function_select, $function_update, $title, $encabezado, $table, $array_columnas_exception = null, $array_placeholder, $array_text, $href_editar, $href_delete){
    // array text y placeholder deben coincidir en tamaño y el orden con las columnas de la tabla en la BD

    $col = retorno_nombre_columnas($table);

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
    
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>'; echo $title; echo '</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <header>
    
    </header>
    
    <body>
        <div class="container mt-5">
            <h1>'; echo $encabezado; echo '</h1>
        </div>
        <div class="container mt-5">
            <form action="'; //echo $_PHP_SELF; echo '" method="POST">';

                for ($i = 0; $i < count($col); $i++) {
                    $value = $col[$i];
                    $tipo = "text";
                    if ($value == $col[0]){
                        $tipo = "hidden";
                        
                    } elseif ($value == "correo"){
                        $tipo = "email";
                    }
                }


                echo '
                <label for="nombre">Nombre Tipo Tarjeta</label>
                <input type="hidden" class="form-control mb-3" name="idterceros" placeholder="IDTerceros" value="<?php echo $id  ?>">
                <input type="text" class="form-control mb-3" name="nomusuario" placeholder="Username" value="<?php echo $row["nomusuario"]  ?>">
                <input type="text" class="form-control mb-3" name="correo" placeholder="Correo" value="<?php echo $row["correo"]  ?>">
                <input type="text" class="form-control mb-3" name="cedula" placeholder="Cedula" value="<?php echo $row["cedula"]  ?>">
                <input type="text" class="form-control mb-3" name="estado" placeholder="Estado" value="<?php echo $row["estado"]  ?>">
                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Actualizar">
                
            </form>
    
    
        </div>
    </body>
    
    </html>';


}


/* $row = seleccionar_un_usuario_por_idtercero(1);
var_dump($row);
echo count($row);
 */



?>