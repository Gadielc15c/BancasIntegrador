<?php 



include_once(dirname(__FILE__, 2) . '\backend\winnersFunctions.php');
include_once(dirname(__FILE__, 2) . '\backend\phpfunctions\sqlRelated\sqlquerygenerals.php');
include_once(dirname(__FILE__, 2) . '\backend\phpfunctions\generals.php');
include_once(dirname(__FILE__, 2) . '\backend\phpfunctions\jugadasFunctions.php');
$table = "tablajugadaventadeticket";
$select=execute_select($table);
foreach($select as $bb){
    $fecha=$bb["fecha"];
    var_dump($fecha);
    $nicedickbro = convert_str_to_array_estoyharto($bb["jugadas"]);
    foreach($nicedickbro as $dingdong){
    $c=$dingdong["Cantidad"];
    $lot=$dingdong["Lotería"];
    $sort=$dingdong["Sorteo"];
    $jugt=$dingdong["Tipo de Jugada"];
    $mon=$dingdong["Moneda"];
    $mont=$dingdong["Monto"];
    $num  = explode (",", $dingdong["Números"]);;
    $premio=premios_jugadas_main($lot,$sort, $num, $mont, $fecha,$fecha);
 
    }
}


// idtablajugada
// jugadas
// fecha
// idterceros_fk
foreach($premio as $waos){

$jug =  $waos[0];
var_dump($jug);
// $fec = "15/10/2021";
// $img =
// $num = [1, 2, 3];
// $win = [7,2,7,9];
// winners($nom, $jug, $fec, $img, $num, $win);
}

// array(1) {
//      [0]=> array(4) { ["idtablajugada"]=> int(626342605) ["jugadas"]=> string(1066) "-Cantidad-7--Lotería-La
//     Primera--Sorteo-La Primera Día--Tipo de Jugada-Palé--Moneda-RD--Monto-4--Números-12, 12--Cantidad-1--Lotería-La
//     Primera--Sorteo-Primera Noche--Tipo de Jugada-Palé--Moneda-RD--Monto-2--Números-2, 2--Cantidad-2--Lotería-La
//     Primera--Sorteo-Primera Noche--Tipo de Jugada-Palé--Moneda-RD--Monto-3--Números-1, 2--Cantidad-4--Lotería-La
//     Primera--Sorteo-Primera Noche--Tipo de Jugada-Palé--Moneda-RD--Monto-1--Números-1,
//     2--Cantidad-1--Lotería-Loteka--Sorteo-Quiniela Loteka--Tipo de Jugada-Tripleta--Moneda-RD--Monto-8--Números-10, 15,
//     20--Cantidad-1--Lotería-Loteka--Sorteo-Quiniela Loteka--Tipo de Jugada-Tripleta--Moneda-RD--Monto-14--Números-10, 14,
//     16--Cantidad-1--Lotería-Loteria Nacional--Sorteo-Lotería Nacional--Tipo de
//     Jugada-Quiniela--Moneda-RD--Monto-1--Números-1--Cantidad-1--Lotería-Loteria Nacional--Sorteo-Lotería Nacional--Tipo de
//     Jugada-Tripleta--Moneda-RD--Monto-4--Números-1, 2, 3--Cantidad-1--Lotería-Americanas--Sorteo-Mega Millions--Tipo de
//     Jugada-Propia--Moneda-US--Monto-5--Números-5, 5, 5, 5, 5, 5-"
    
//     ["fecha"]=> string(10) "2022-11-27" 
//     ["idterceros_fk"]=>
//     int(936137193) } } 
//     array(6) { [0]=> string(1) "5" [1]=> string(2) " 5" [2]=> string(2) " 5" [3]=> string(2) " 5" [4]=>
//     string(2) " 5" [5]=> string(2) " 5" }
?>