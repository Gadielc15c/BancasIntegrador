<?php 

include('../backend/phpfunctions/carritoFuncions.php');

$loteria="Nacional";
$sorteo="ganamas";
$total="4.00";
$fecha="15/10/2021";
$jugada=[02,48,11];
$tipo="Tripleta";
$monto=10;

$jugada1=[$loteria,$sorteo,$total,$jugada,$tipo,$monto,$fecha];
$jugada2=[$loteria,$sorteo,$total,$jugada,$tipo,$monto,$fecha];
$jugada3=[$loteria,$sorteo,$total,$jugada,$tipo,$monto,$fecha];
$jugadas=[$jugada1,$jugada2,$jugada3];

foreach ($jugadas as $detalleJugada){
    $lot= $detalleJugada[0];
    $sort = $detalleJugada[1];
    $tot = $detalleJugada[2];
    $jug = $detalleJugada[3];
    $tipo = $detalleJugada[4];
    $mon = $detalleJugada[5];
    $date = $detalleJugada[6];
    $img ="xD";
    shoppingMaker($lot,$sort,$tot,$jug,$tipo,$mon,$date,$img);
     } 
?>

