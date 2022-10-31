
         <div class="container mt-3">
     <form action="">
                <input type="text" class="form-control mb-3" name="idticket" placeholder="Id Ticket">
                <input type="text" class="form-control mb-3" name="monto" placeholder="Monto">
                <input type="date" class="form-control mb-3" name="fecha" placeholder="Fecha">
                <input type="text" class="form-control mb-3" name="estado" placeholder="Estado">
                <input type="submit" class="btn btn-primary" value="Buscar">
                <input type="submit" class="btn btn-primary" value="Eliminar">
                <input type="submit" class="btn btn-primary" value="Modificar">
            </form>

            <div class="col-md-7 col-md-offset-2"></div>

<div class="row-md-7">
    <table class="table">
        <thead class="table-warning table-striped">
            <tr style="text-align: center;">
                <th style="text-align: center;">ID  TICKET</th>
                <th style="text-align: center;">MONTO</th>
                <th style="text-align: center;">CLAVE</th>
                <th style="text-align: center;">FECHA</th>
                <th style="text-align: center;">ESTADO</th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
            </tr>
        </thead>
        <tbody>

            <?php 
            while ($row=mysqli_fetch_array($query)){
                ?>
            <tr>
                <th><?php echo $row['idticket']?></th>
                <th><?php echo $row['monto']?></th>
                <th><?php echo $row['fecha']?></th>
                <th><?php echo $row['estado']?></th>
                <th><a href=""class="btn btn-warning">EDITAR</a> </th>
                <!--ejemplo--  <../backend/updateUsuario.php?idterceros=<?php echo $row['idterceros']?>  -->
                <th><a href="#"
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

 