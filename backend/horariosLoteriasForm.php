<?php
include("conexion.php");
$con = conectar();
$sql= "SELECT L.nombre, H.dialaboral, H.horalaboral, H.horacierre
FROM loterias
INNER JOIN h.idlothorarios = L.idlothorarios_fk";
$query=mysqli_query($con,$sql);

?>

<div class="container mt-5">
    <div class="row">
        <div class="row-md-7">
            <table class="table">
                <thead class="table-warning table-striped">
                    <tr style="text-align: center;">
                        <th>LOTERIA</th>
                        <th>DIAS LABORABLES</th>
                        <th>HORA LABORAL</th>
                        <th>HORA DE CIERRE</th>

                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    while ($row=mysqli_fetch_array($query)){
                        ?>
                    <tr>
                        <th><?php echo $row['nombre']  ?></th>
                        <th><?php echo $row['dialaboral']  ?></th>
                        <th><?php echo $row['horalaboral']  ?></th>
                        <th><?php echo $row['horacierre']  ?></th>
              
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
