<?php
include_once('../backend/prueba.php');
$consulta=select_historial_jugadas();
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
            while($fila=$consulta->fetch_assoc()){
                ?>
                
                <tr>    
                    <td><?php echo $fila['idjugada'];?></td>
                    <td><?php echo['jugnumeros'];?></td>
                    <td><?php echo['nombre'];?></td>
                    <td><?php echo$fila['nombre'];?></td>
                    <td><?php echo$fila['idticket'];?></td>
                    <td><?php echo $fila['monto'];?></td>
                    <td><?php echo$fila['moneda_fk'];?></td>
                    <td><?php echo$fila['fecha'];?></td>
                    <td><?php echo$fila['estado'];?></td>
                    <td><?php echo$fila['idterceros_fk'];?></td>
                    <td><?php echo$fila['codigobarra'];?></td>
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
