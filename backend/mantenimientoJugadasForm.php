
         <div class="container mt-3">
     <form action="">
                <input type="text" class="form-control mb-3" name="idjugadas" placeholder="Id Jugada">
                <input type="text" class="form-control mb-3" name="numjugados" placeholder="Numeros Jugados">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </form>

            <div class="col-md-7 col-md-offset-2"></div>

<div class="row-md-7">
    <table class="table">
        <thead class="table-warning table-striped">
            <tr style="text-align: center;">
                <th style="text-align: center;">ID JUGADA</th>
                <th style="text-align: center;">NUMEROS JUGADOS</th>
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
              <th><a href="../backend/updateJugadas.php?idjugada=<?php echo $row['idjugada']?>"
                      class="btn btn-warning">EDITAR</a> </th>

              <th><a href="delete.php?idjugada=<?php echo $row['idjugada']?>"
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

 