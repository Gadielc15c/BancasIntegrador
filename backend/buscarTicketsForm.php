<?php
include("conexion.php");
$con = conectar();
$sql= "SELECT * FROM archivos";
$query=mysqli_query($con,$sql);


?>

    <div class="container mt-5">
        <div class="row">

            <div class="col-md-6">
                <h1>Buscar Ticket</h1>
                <form action="insertar.php" method="POST">
                    <input type="text" class="form-control mb-3" name="CodDeptop" placeholder="Codigo de departamento">
                    <input type="text" class="form-control mb-3" name="AreaReferencia" placeholder="Area de Referencia">
                    <input type="text" class="form-control mb-3" name="Delivery" placeholder="Persona que entrega">
                    <input type="date" class="form-control mb-3" name="FechaIn" placeholder="Fecha de Ingreso Digital">
                    <input type="text" class="form-control mb-3" name="ArchivoFisico" placeholder="Archivo Físico">
                    <input type="submit" class="btn btn-primary" value="Buscar">

                </form>





                <form action="form.php" method="post">
                    Search: <input type="text" name="term" /><br />
                    <input type="submit" value="Submit" />
                </form>

            </div>

            <div class="col-md-75 col-md-offset-2"></div>





            <div class="row-md-10">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr style="text-align: center;">
                            <th>Codigo</th>
                            <th>Codigo departamento</th>
                            <th>Area Referencia</th>
                            <th>Suministrador</th>
                            <th>Numero de Copias</th>
                            <th>Fecha Ingreso</th>
                            <th>Archivo Fisico</th>
                            <th>Tiempo Conservacion</th>
                            <th>Observaciones</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                    while ($row=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <th><?php echo $row['CodigoArchivo']  ?></th>
                            <th><?php echo $row['CodDepto']  ?></th>
                            <th><?php echo $row['AreaReferencia']  ?></th>
                            <th><?php echo $row['Delivery']  ?></th>
                            <th><?php echo $row['NumCopias']  ?></th>
                            <th><?php echo $row['FechaIn']  ?></th>
                            <th><?php echo $row['ArchivoFisico']  ?></th>
                            <th><?php echo $row['Tiempo']  ?></th>
                            <th><?php echo $row['Obser']  ?></th>
                            <th><a href="Actualizar.php?id=<?php echo $row['CodigoArchivo']?>"
                                    class="btn btn-info">EDITAR</a> </th>

                            <th><a href="delete.php?id=<?php echo $row['CodigoArchivo']?>"
                                    class="btn btn-danger">ELIMINAR</a> </th>




                        </tr>


                        <?php
                    }
?>
                        <style>
                        th {
                            text-align: center;
                        }
                        </style>
                    </tbody>
                </table>
            </div>