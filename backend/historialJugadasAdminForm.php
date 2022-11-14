
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
          foreach ($query as $row){
            $query="SELECT J.idjugadas, J.jugnumeros,
                            T.nombre,
                            L.nombre,
                            T.idticket,T.monto, T.moneda_fk, T.fecha, T.estado, T.idterceros_fk, T.codigobarra
                            FROM jugadas J
                            INNER JOIN tipojugadas T ON J.idtipojugada_fk = T.idtipojugadas
                            INNER JOIN loterias L ON J.idloteria_fk  = L.idloteria
                            INNER JOIN tickets T ON J.idticket_fk = T.idticket";
                            $consulta=$conexion->query($query);
                            while($fila=$consulta->fetch(PDO::FETCH_ASSOC))
          ?>
          <tr>
          <th><?php echo $row['idjugada']?></th>
          <th><?php echo $row['jugnumeros']?></th>
          <th><?php echo $row['nombre']?></th>
          <th><?php echo $row['nombre']?></th>
          <th><?php echo $row['idticket']?></th>
          <th><?php echo $row['monto']?></th>
          <th><?php echo $row['moneda_fk']?></th>
          <th><?php echo $row['fecha']?></th>
          <th><?php echo $row['estado']?></th>
          <th><?php echo $row['idterceros_fk']?></th>
          <th><?php echo $row['codigobarra']?></th>
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
