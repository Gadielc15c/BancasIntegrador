<?php
$path = dirname(__FILE__);
include_once($path . "/phpFunctions/sqlRelated/sqlqueryselect.php");
$query=seleccionar_todos_usuario();

?>
<div class="container mt-5">
    <div class="row">

        <div class="col-md-6">
            <h1>Mantenimiento Loterias</h1>
            <form action="insertar.php" method="POST">
                <input type="text" class="form-control mb-3" name="idloteria" placeholder="ID LOTERIA">
                <input type="text" class="form-control mb-3" name="nomloteria" placeholder="Nombre Loteria">
                <input type="text" class="form-control mb-3" name="Estado" placeholder="Estado">
                <input type="text" class="form-control mb-3" name="diaLaboral" placeholder="Dias Laborables">
                <input type="time" class="form-control mb-3" name="horalaboral" placeholder="Hora Laboral">
                <input type="time" class="form-control mb-3" name="horacierre" placeholder="Hora Cierre">
                <input type="text" class="form-control mb-3" name="Estado" placeholder="Estado">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </form>

          

        </div>

        <div class="col-md-7 col-md-offset-2"></div>

        <div class="row-md-7">
            <table class="table">
                <thead class="table-warning table-striped">
                    <tr style="text-align: center;">
                        <th>ID LOTERIA</th>
                        <th>NOMBRE LOTERIA</th>
                        <<th>ESTADO</th>
                        <th>DIAS LABORABLES</th>
                        <th>HORA LABORAL</th>
                        <th>HORA DE CIERRE</th>
                        <<th>ESTADO</th>

                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    foreach ($query as $row){
                    ?>
                    <tr>
                        <th><?php echo $row['idterceros']?></th>
                        <th><?php echo $row['nomusuario']?></th>
                        <!-- No es necesario mostrar la clave del usuario - Frannie
                        <th><?php //echo $row['claveusuario']?></th>
                        -->
                        <th><?php echo $row['correo']?></th>
                        <th><?php echo $row['cedula']?></th>
                        <th><?php 
                            $reply = ucfirst(por_estado_activo_inactivo($row['estado']));
                            echo $reply;
                        ?></th>
                        <th><a href="../backend/updateUsuario.php?idterceros=<?php echo $row['idterceros']?>"
                                class="btn btn-warning">EDITAR</a> </th>

                        <th><a href="delete.php?idterceros=<?php echo $row['idterceros']?>"
                                class="btn btn-danger">ELIMINAR</a> </th>

                    </tr>


                    <?php
                    }
?>
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