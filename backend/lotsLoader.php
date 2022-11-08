<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

$path = dirname(__FILE__);

include_once($path . "./phpfunctions/webscraping.php");
include_once($path . "./lotsLoaderFunction.php");
$lotosR = retornar_lot_numeros_live();
foreach ($lotosR as $LotoResultados){

/*
$nombreLoteria=$LotoResultados[0];
$Namejugada=$LotoResultados[1];
$fecha=$LotoResultados[2]; 
$resultado=[1,2];  /*explode(" ",$LotoResultados[3])
$img=$LotoResultados[4]; */

$nombreLoteria="1";
$Namejugada="1";
$fecha="1"; 
$resultado="1"; 
$img=""; 
lotsScramp($nombreLoteria, $jugada, $fecha, $img, $resultado);

/*explode(" ",$LotoResultados[3])
$img=$LotoResultados[4]; 
    lotsScramp($nombreLoteria, $jugada, $fecha, $img, $resultado);*/
} 


?>