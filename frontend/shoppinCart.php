<?php 

if(isset($_SESSION['tablajugada'])){

    $a=$_SESSION['tablajugada'];

    }

include('../backend/phpfunctions/carritoFuncions.php');




foreach ($a as $detalleJugada){
   
    $lot = $detalleJugada["Lotería"];
    $sort = $detalleJugada["Sorteo"];
    $tipo = $detalleJugada["Modalidad"];

    $string = "Maggie,Panqué,Guayaba";
    $sep = ",";
    $justring = $detalleJugada["Números"];
    $jug = explode($sep, $justring);
    
    $tot=0;
    $mon = $detalleJugada["Monto"];
    foreach ($jug as $totalito){
        $tot+=$mon;


    }
    
    
    
    $date = "15/11/2022";
    $img ="xD";
    shoppingMaker($lot,$sort,$tot,$jug,$tipo,$mon,$date,$img);
     } 
?>

