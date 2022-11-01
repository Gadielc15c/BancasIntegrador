
<?php
$path = dirname(__FILE__);
include_once($path . "/phpFunctions/sqlRelated/sqlqueryselect.php");
$query=seleccionar_todas_monedas();
?>


<div class="container mt-5">
    <div class="row">

        <div class="col-md-6">
            <h1>Mantenimiento Monedas</h1>

            <!--ingresar el PATH DE INSERT EN FORM ACTION-->
            <form action="# " method="POST">
                <input type="text" class="form-control mb-3" name="idmonedas" placeholder="ID MONEDA">
                <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                <input type="text" class="form-control mb-3" name="estado" placeholder="Estado">
                <input type="submit" class="btn btn-primary" value="Insertar">
                
            </form>



        </div>

        <div class="col-md-7 col-md-offset-2"></div>

        <div class="row-md-7">
            <table class="table">
                <thead class="table-warning table-striped">
                    <tr style="text-align: center;">
                        <th>ID MONEDA</th>
                        <th>MONEDA</th>
                        <th>NOMBRE MONEDA</th>
                        <th>ESTADO</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
    foreach ($query as $row){
    ?>
                    <tr>
                    <th class="Tabla"><?php echo $row['idmonedas']?></th>
                        <th class="Tabla"><?php echo $row['moneda']?></th>
                        <th class="Tabla"><?php echo $row['nombre']?></th>
                        <th><?php 
                         $reply = ucfirst(por_estado_activo_inactivo($row['estado']));
                        echo $reply; ?></th>
                        <th><a href="../backend/updateTickets.php?idmonedas=<?php echo $row['idmonedas']?>"
                                class="btn btn-warning">EDITAR</a> </th>
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
</div>