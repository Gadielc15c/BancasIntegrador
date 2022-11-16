<?php 

session_start();
$metodoPago=[$metodo1=["Visa","****-****-****-**41","IVAN","MENDOZA"],$metodo2=["MASTER CARD","****-****-****-**41","IVAN","MENDOZA"]];
$_SESSION['MDP']=$metodoPago[0];
if (isset($_SESSION['array'])) {
    $_SESSION['arrayT']=$Areglo=$_SESSION['array'];
    


}



if(!isset($_SESSION['nivel'])){

header('location:  ../index.php');
    
}else {
    if($_SESSION['nivel']!=4){

header('location: ../index.php');

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Error</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta name="description" />
    <meta name="generator" content="HAPedit 3.1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/cuerpoWeb.css" />
    <link rel="stylesheet" href="/css/ventas.css" />

</head>
<header>
<?php include('../frontend/nav.php');?>
</header>

<body>

    <div class="container2">

        <div class="cuadrado" style="display: flex;align-items: center;justify-content: center; ">
            <div class="cuadraiso">

                <center>
                    <h3 class="font-weight-bold " style=" padding: 30px; ">
                        SELECCIONE O AGREGE UN METODO DE PAGO PARA COMPLETAR LA TRANSACCION
                    </h3>
                    
                    <select name="lotsSelect" id="lotsSelect" class="lotsSelect" onchange="this.form.submit()">
                        <option value="" disable selected="selected">Seleccione una Metodo de pago</option>
                        <?php
                       
                        
                        foreach($metodoPago as $metodo){
                            echo "<option value='$metodo[0]'>$metodo[0]</option>";
                           
                        }
        ?>
                    </select>

                    <form action="../frontend/ticketDisplayer.php">
                        <input class="botoncito" type="submit" name="submit" class="btn btn-primary btn-block"
                            value="Add Metodo">
                        <input class="botoncito" type="submit" name="submit" class="btn btn-primary btn-block"
                            value="Select Metodo">
                    </form>

                    <br>

                </center>
            </div>
        </div>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<footer>
    <?php include("../frontend/footer.php") ?>
</footer>

</html>