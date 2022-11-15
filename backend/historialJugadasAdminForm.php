<?php
include("conexion.php");
$con = conectar();

?>
<div class="row-md-7">
    <table class="table">
        <thead class="table-warning table-striped">
            <tr style="text-align: center;">
                <th style="text-align: center;">ID JUGADA</th>
                <th style="text-align: center;">NUMEROS JUGADOS</th>
                <th style="text-align: center;">TIPO JUGADA</th>
                <th style="text-align: center;">LOTERIA</th>
                <th style="text-align: center;">ID TICKET</th>
                <th style="text-align: center;">MONTO</th>
                <th style="text-align: center;">MONEDA</th>
                <th style="text-align: center;">FECHA</th>
                <th style="text-align: center;">ESTADO</th>
                <th style="text-align: center;">USUARIO</th>
                <th style="text-align: center;">CODIGO BARRA</th>
               
            </tr>
        </thead>
        <tbody>

         
        <?php 

            $sql= "SELECT J.idjugadas, J.jugnumeros,
                        T.nombre,
                        L.nombre,J.idticket_fk, TI.monto, M.moneda, TI.fecha, TI.estado, TER.nomusuario, TI.codigobarra
                        FROM jugadas J
                        INNER JOIN tipojugadas T ON J.idtipojugada_fk = T.idtipojugadas
                        INNER JOIN loterias L ON J.idloteria_fk  = L.idloteria
                        INNER JOIN tickets TI ON J.idticket_fk = TI.idticket
                        INNER JOIN monedas M ON TI.monedas_fk = M.idmonedas
                        INNER JOIN terceros TER ON TI.idterceros_fk = TER.idterceros";

                        $query=mysqli_query($con,$sql);
                 while($row=mysqli_fetch_array($query)){
        ?>
                
                <tr>    
                    <th><?php echo $row['idjugada'] ?></th>
                    <th><?php echo $row['jugnumeros'] ?></th>
                    <th><?php echo $row['nombre'] ?></th>
                    <th><?php echo $row['nombre'] ?></th>
                    <th><?php echo $row['idticket_fk'] ?></th>
                    <th><?php echo $row['monto'] ?></th>
                    <th><?php echo $row['moneda'] ?></th>
                    <th><?php echo $row['fecha'] ?></th>
                    <th><?php echo $row['estado'] ?></th>
                    <th><?php echo $row['nomusuario'] ?></th>
                    <th><?php echo $row['codigobarra'] ?></th>
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
