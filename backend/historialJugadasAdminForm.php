
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
                <th style="text-align: center;"></th>
                <th style="text-align: center;"></th>
            </tr>
        </thead>
        <tbody>

         
          <?php 
          foreach ($query as $row){
          ?>
          <tr>
          <th><?php echo $row['idjugada']?></th>
          <th><?php echo $row['jugnumeros']?></th>
              <th><?php 
                  $reply = ucfirst(por_estado_activo_inactivo($row['estado']));
                  echo $reply;
              ?></th>
              

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
