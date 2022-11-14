
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

                            {
                                echo'
                                <tr>
                                <td>'.$fila['idjugada'].'</td>
                                <td>'.$fila['jugnumeros'].'</td>
                                <td>'.$fila['nombre'].'/td>
                                <td>'.$fila['nombre'].'</td>
                                <td>'.$fila['idticket'].'</td>
                                <td>'.$fila['monto'].'</td>
                                <td>'.$fila['moneda_fk'].'</td>
                                <td>'.$fila['fecha'].'</td>
                                <td>'.$fila['estado'].'</td>
                                <td>'.$fila['idterceros_fk'].'</td>
                                <td>'.$fila['codigobarra'].'</td>
                                </tr>
                                ';
                               
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
