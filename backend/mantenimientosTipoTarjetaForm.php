
         <?php
$path = dirname(__FILE__);
include_once($path . "/phpFunctions/sqlRelated/sqlqueryselect.php");
$query=seleccionar_todos_tipo_tarjeta();
?>

         <div class="container mt-3">
         <h2>Mantenimiento Tipo Tarjeta</h2>
     <form action="">
                <input type="text" class="form-control mb-3" name="idtipotarjetas" placeholder="Id Tipo Tarjeta">
                <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                <input type="text" class="form-control mb-3" name="estado" placeholder="Estado">
                <input type="submit" class="btn btn-primary" value="Insertar">
            </form>

            <div class="col-md-7 col-md-offset-2"></div>
<div class="row-md-7">
    <table class="table">
        <thead class="table-warning table-striped">
            <tr style="text-align: center;">
                <th style="text-align: center;">ID Tipo Tarjeta</th>
                <th style="text-align: center;">Nombre</th>
                <th style="text-align: center;">Estado</th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
            </tr>
        </thead>
        <tbody>

        <?php 
                    foreach ($query as $row){
                    ?>
                    <tr>
                    <th><?php echo $row['idtipotarjetas']?></th>
                    <th><?php echo $row['nombre']?></th>
                    <th><?php 
                            $reply = ucfirst(por_estado_activo_inactivo($row['estado']));
                            echo $reply;
                        ?></th>
                        <!-- No es necesario mostrar la clave del usuario - Frannie
                        <th><?php //echo $row['claveusuario']?></th>
                        -->
                     
                        <th><a href="../backend/updateTipoTarjetas.php?idtipotarjetas=<?php echo $row['idtipotarjetas']?>"
                                class="btn btn-warning">EDITAR</a> </th>
                        <th><a href="delete.php?idtipotarjetas=<?php echo $row['idtipotarjetas']?>"
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

 