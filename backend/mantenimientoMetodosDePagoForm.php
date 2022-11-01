
         <div class="container mt-3">
     <form action="">
                <input type="text" class="form-control mb-3" name="idmetodopago" placeholder="Id Metodo de Pago">
                <input type="text" class="form-control mb-3" name="metodo" placeholder="Metodo">
                <input type="text" class="form-control mb-3" name="principal" placeholder="Principal">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </form>

            <div class="col-md-7 col-md-offset-2"></div>

<div class="row-md-7">
    <table class="table">
        <thead class="table-warning table-striped">
            <tr style="text-align: center;">
                <th style="text-align: center;">ID METODO DE PAGO</th>
                <th style="text-align: center;">METODO</th>
                <th style="text-align: center;">PRINCIPAL</th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
            </tr>
        </thead>
        <tbody>

            <?php 
            while ($row=mysqli_fetch_array($query)){
                ?>
            <tr>
                <th><?php echo $row['idpagometodos']?></th>
                <th><?php echo $row['metodo']?></th>
                <th><?php echo $row['principal']?></th>
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

 