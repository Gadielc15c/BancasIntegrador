<?php

$path = dirname(__FILE__, 2);
include_once($path . "/phpFunctions/sqlRelated/sqlqueryselect.php");

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


?>