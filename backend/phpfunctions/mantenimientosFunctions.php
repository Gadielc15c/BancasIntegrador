<?php

$path = dirname(__FILE__, 2);
include_once($path . "/phpFunctions/sqlRelated/sqlqueryselect.php");
$path = dirname(__FILE__, 2);
include_once($path . "/phpFunctions/sqlRelated/sqlqueryupdate.php");

function crear_mantenimientos_form($function_select, $encabezado, $table, $array_columnas_exception, $array_placeholder, $array_text, $href_editar, $href_estado){
    // array text y placeholder deben coincidir en tamaño y el orden con las columnas de la tabla en la BD

    $col = return_columns_by_name($table);
    $query= $function_select;
    
    echo '
    <div class="container mt-5">
        <div class="row">

            <div class="col-md-6">
                <h1>'; echo $encabezado; echo '</h1>
                <form action=" " method="POST"> ';

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
                            
                            <!-- boton delete estaba aqui -->
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


function crear_update_form($function_select, $function_update, $title, $encabezado, $table, $col_name, $array_columnas_exception, $array_placeholder,$form_action){
    // array text y placeholder deben coincidir en tamaño y el orden con las columnas de la tabla en la BD

    $col = return_columns_by_name($table);
    function actualizar($id, $function_select, $function_update, $col, $array_columnas_exception){
        if (isset($_POST['submit'])){
            $arr = array();
            for ($i = 0; $i < count($col); $i++) {
                $value = $col[$i];
                if (!in_array($value, $array_columnas_exception) && $value != $col[0]){
                    if ($value == "estado"){
                        $ch = $_POST[$value];
                        $b = false;
                        if ($ch == 1){
                            $b = true;
                        }
                        $_POST[$value] = $b;
                    }
                    $to_add = $_POST[$value];
                    if (empty($_POST[$value])){
                        $to_add = null;
                    }
                    array_push($arr, $to_add);
                }
            }

            array_push($arr, $id);
            $v = $function_update($arr);
            // si v es TRUE, funciono el update, de lo contrario es false
            
            if (!$v){
                echo "<br>";
                echo "Error en el update";
                echo "<br>";
            }

            return $function_select($id);
        }
    }

    if (isset($_GET[$col_name])){
        $id = $_GET[$col_name];
        $row = $function_select($id);
    }
                                 /* Revisar Valor del Echo de titulo  */


    echo '
    <!DOCTYPE html>
    <html lang="en">
  <script type="module" / src="/js/validateUpdates.js"></script>
  <head>
        <title>MANTENIMIENTO</title>
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
            <form action= "'; $temp = actualizar($id, $function_select, $function_update, $col, $array_columnas_exception); echo '" method="POST">';
                if (isset($temp)){
                    $row = $temp;
                }
                for ($i = 0; $i < count($col); $i++) {
                    $value = $col[$i];
                    $tipo = "text";
                    $hid = false;
                    if (!in_array($value, $array_columnas_exception)){
                        if ($value == $col[0]){
                            $tipo = "hidden";
                            $hid = true;
                        } elseif ($value == "correo"){
                            $tipo = "email";
                        }
                        if (!$hid){
                            echo '<label for="nombre">'; echo $array_placeholder[$i]; echo '</label>';
                        }
                        echo '<input type="'; echo $tipo; echo'" class="form-control mb-3" name="'; echo $value; echo'" placeholder="'; echo $array_placeholder[$i]; echo '" value="'; echo $row[$i]; echo '">';
                    }
                }

                echo '
                <input id="update" type="submit" name="submit" class="btn btn-primary btn-block" value="Actualizar">
                <input id="regresar" type="submit" name="submit" class="btn btn-primary btn-block" formaction="'; echo $form_action; echo'" value="Volver">
                
            </form>
    
    
        </div>
        
    </body>
    
    </html>';


}

?>