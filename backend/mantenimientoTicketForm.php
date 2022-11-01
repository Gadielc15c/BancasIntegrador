<?php
$path = dirname(__FILE__);
include_once($path . "/phpFunctions/sqlRelated/sqlqueryselect.php");
$query=seleccionar_todos_tickets();

?>

<div class="container mt-3">
    <form action="">
        <input type="text" class="form-control mb-3" name="idticket" placeholder="Id Ticket">
        <input type="text" class="form-control mb-3" name="monto" placeholder="Monto">
        <input type="date" class="form-control mb-3" name="fecha" placeholder="Fecha">
        <input type="text" class="form-control mb-3" name="estado" placeholder="Estado">
        <input type="submit" class="btn btn-primary" value="Buscar">

    </form>

    <div class="col-md-7 col-md-offset-2"></div>

    <div class="row-md-7">
        <table class="table">
            <thead class="table-warning table-striped">
                <tr style="text-align: center;">
                    <th class="Tabla">ID TICKET</th>
                    <th class="Tabla">MONTO</th>
                    <th class="Tabla">MONEDA</th>
                    <th class="Tabla">FECHA</th>
                    <th class="Tabla">ID Tercero</th>
                    <th class="Tabla">CODIGO DE BARRA</th>
                    <th class="Tabla">ESTADO</th>
                    <th class="Tabla"></th>
                    <th class="Tabla"></th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    foreach ($query as $row){
                    ?>
                <tr>
                    <th class="Tabla"><?php echo $row['idtickets']?></th>
                    <th class="Tabla"><?php echo $row['monto']?></th>
                    <th class="Tabla"><?php echo $row['moneda']?></th>
                    <th class="Tabla"><?php echo $row['fecha']?></th>
                    <th><?php 
                            $reply = ucfirst(por_estado_activo_inactivo($row['estado']));
                            echo $reply;
                        ?></th>
                    
                    <th><a href="../backend/updateTickets.php?idtickets=<?php echo $row['idtickets']?>"
                           class="btn btn-warning">EDITAR</a> </th>
                           
                    <!--ejemplo--  <../backend/updateUsuario.php?idterceros=<?php echo $row['idtickets']?>  -->
                    <th><a href="#" class="btn btn-danger">ELIMINAR</a> </th>




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