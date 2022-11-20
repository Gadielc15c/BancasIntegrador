<?php
include("conexion.php");
$con = conectar();
?>


<div class="container mt-5">
    <div class="row">

        <div class="col-md-6">
            <h1>Consulta De Tickets</h1>
            <form action=" " method="POST">
                <input type="text" class="form-control mb-3" name="idticket" placeholder="ID Ticket">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </form>

        </div>

        <div class="col-md-7 col-md-offset-2"></div>


        <div class="row-md-7">
            <table class="table">
                <thead class="table-warning table-striped">
                    <tr style="text-align: center;">
                        <th>ID TICKET</th>
                        <th>LOTERIA</th>
                        <th>TIPO JUGADA</th>
                        <th>NUMEROS</th>
                        <th>MONTO</th>
                        <th>FECHA</th>
                        <th>SUCURSAL VENTA</th>


                        <th></th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>