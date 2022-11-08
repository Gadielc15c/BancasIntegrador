<?php 
$path = dirname(__FILE__);
include_once($path . "./lotsLoaderFunction.php");
$nombreLoteria="Leidsa";
$jugada="Palé";
$fecha="15-16-2421";
$img="../img/Logo.png";
$resultado= [
    1,2,1,2,3,4
];
lotsScramp($nombreLoteria, $jugada, $fecha, $img, $resultado);
?>