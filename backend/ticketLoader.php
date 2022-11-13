<?php

$path = dirname(__FILE__);
include('../backend/phpfunctions/ticketPrintFunction.php');
$dir="direccion";
$sorteo="leidsa";
$lot="Nacional";
$tipo="Pata";
$jugada="10-12-54";
$monto="10";
$idjugada="254545";
$total="30";
$tTarjeta="MASTERCAR";
$nTarjeta="**** **** **83";
$titular="GADIEL CASCANTE";
$vDate="15-11-2021";
$tDate="15-11-2021";
$time="10:57 P,";
$barCdNum="666 666 666";
$estado="PAGO";
createTicket($dir,$sorteo,$lot,$tipo,$jugada,$monto,$idjugada,$total,$tTarjeta,$nTarjeta,$titular,$vDate,$tDate,$time,$barCdNum,$estado)




?>


