<?php
include("conexion.php");
$con = conectar();
$sql= "SELECT * FROM terceros";
$query=mysqli_query($con,$sql);


?>
<div class="container mt-5">
    <div class="row">
        <!-- Falta Agregar FILTROS POR PHP-->
        <div class="col-md-6">
            <h1>Consulta de  User</h1>
            <form action=" " method="POST">
                <input type="text" class="form-control mb-3" name="idTercero" placeholder="ID USER">
                <input type="text" class="form-control mb-3" name="nomUser" placeholder="Nombre de Usuario">
                <input type="text" class="form-control mb-3" name="claveUsuario" placeholder="Clave Encriptada">
                <input type="email" class="form-control mb-3" name="Correo" placeholder="Correo">
                <input type="text" class="form-control mb-3" name="Cedula" placeholder="Cedula">
                <input type="text" class="form-control mb-3" name="Estado" placeholder="Estado">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </form>

            <!--
            <form action="form.php" method="post">
                Search: <input type="text" name="term" /><br />
                <input type="submit" value="Submit" />
            </form>
-->
        </div>

        <div class="col-md-7 col-md-offset-2"></div>

<!--<input type="text" class="form-control mb-3" name="idTercero" placeholder="ID USER">
                <input type="text" class="form-control mb-3" name="nomUser" placeholder="Nombre de Usuario">
                <input type="text" class="form-control mb-3" name="claveUsuario" placeholder="Clave Encriptada">
                <input type="email" class="form-control mb-3" name="Correo" placeholder="Correo">
                <input type="text" class="form-control mb-3" name="Cedula" placeholder="Cedula">
                <input type="text" class="form-control mb-3" name="Estado" placeholder="Estado">-->


        <div class="row-md-7">
            <table class="table">
                <thead class="table-warning table-striped">
                    <tr style="text-align: center;">
                        <th>ID USUARIO</th>
                        <th>USUARIO</th>
                        <th>CLAVE</th>
                        <th>CORREO</th>
                        <th>CEDULA</th>
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
                        <th><?php echo $row['idterceros']  ?></th>
                        <th><?php echo $row['nomusuario']  ?></th>
                        <th><?php echo $row['claveusuario']  ?></th>
                        <th><?php echo $row['correo']  ?></th>
                        <th><?php echo $row['cedula']  ?></th>
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
