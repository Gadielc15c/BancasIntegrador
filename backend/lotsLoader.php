<?php 

$path = dirname(__FILE__);

include_once($path . ".\phpfunctions\webscraping.php");
include_once($path . ".\lotsLoader.php");

$lotosR = retornar_lot_numeros_live();
foreach ($lotosR as $LotoResultados){

    $nombreLoteria=$LotoResultados[0];
    $Namejugada=$LotoResultados[1];
    $fecha=$LotoResultados[2];
    $resultado= explode(" ",$LotoResultados[3]);
    $img=$LotoResultados[4];
    lotsScramp($nombreLoteria, $jugada, $fecha, $img, $resultado);
} 

?>