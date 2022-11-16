<?php
include("conexion.php");
$con = conectar();
$sql= "SELECT * FROM lothorarios";
$query=mysqli_query($con,$sql);

?>

<div class="container mt-5">
    <div class="row">
        <div class="row-md-7">
            <table class="table">
                <thead class="table-warning table-striped">
                    <tr style="text-align: center;">
                        <th>ID</th>
                        <th>DIAS LABORABLES</th>
                        <th>HORA LABORAL</th>
                        <th>HORA DE CIERRE</th>
                        <th>ESTADO</th>


                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    while ($row=mysqli_fetch_array($query)){
                        ?>
                    <tr>
                        <th><?php echo $row['idlothorarios']  ?></th>
                        <th><?php echo $row['dialaboral']  ?></th>
                        <th><?php echo $row['horalaboral']  ?></th>
                        <th><?php echo $row['horacierre']  ?></th>
                        <th><?php echo $row['estado']  ?></th>
              
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
