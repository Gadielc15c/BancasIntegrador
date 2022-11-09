<?php 


$path = dirname(__FILE__);

include_once($path . "./phpfunctions/webscraping.php");
include_once($path . "./lotsLoaderFunction.php");
$lotosR = retornar_lot_numeros_live();

foreach ($lotosR as $l){
$nom= $l[0][0];
$jug = $l[1][0];
$fec = $l[2][0];
$img = $l[4][0];
$num = $l[3];
lotsScramp($nom, $jug, $fec, $img, $num);
 } 
 

?>