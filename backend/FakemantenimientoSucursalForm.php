<div class="container mt-3">
<h2>Mantenimiento Sucursal</h2>
    <form action="">
        <input type="text" class="form-control mb-3" name="idsucursal" placeholder="Id Jugada">
        <input type="text" class="form-control mb-3" name="nombresucursal" placeholder="Numeros Jugados">
        <input type="submit" class="btn btn-primary" value="Buscar">
    </form>

    <div class="col-md-7 col-md-offset-2"></div>

    <div class="row-md-7">
        <table class="table">
            <thead class="table-warning table-striped">
                <tr style="text-align: center;">
                    <th style="text-align: center;">ID Sucursal</th>
                    <th style="text-align: center;">Nombre</th>
                    <th style="text-align: center;"></th>
                    <th style="text-align: center;"></th>
                </tr>
            </thead>
            <tbody>


                <?php 
                    foreach ($query as $row){
                    ?>
                <tr>
                <tr>
                    <th><?php echo $row['idsucursal']?></th>
                    <th><?php echo $row['nombresucursal']?></th>
                    <th><a href="./backend/updateSucursal.php?idsucursal=<?php echo $row['idsucursal']?>" class="btn btn-warning">EDITAR</a> </th>
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