<?php



include_once(dirname(__FILE__, 2) . '\backend\winnersFunctions.php');
include_once(dirname(__FILE__, 2) . '\backend\phpfunctions\sqlRelated\sqlquerygenerals.php');
include_once(dirname(__FILE__, 2) . '\backend\phpfunctions\generals.php');
include_once(dirname(__FILE__, 2) . '\backend\phpfunctions\jugadasFunctions.php');

$table = "tablajugadaventadeticket";
$select = execute_select($table);
$img = "/img/Logo.png";
$bbs = $select[0];



if (!empty($bbs)) {

    foreach ($bbs as $bb) {

        $fecha = $bbs["fecha"];

        $nicedickbro = convert_str_to_array_estoyharto($bbs["jugadas"]);

        foreach ($nicedickbro as $dingdong) {
            $lot = $dingdong["Lotería"];
            $sort = $dingdong["Sorteo"];
            $jugt = $dingdong["Tipo de Jugada"];
            $mon = $dingdong["Moneda"];
            $mont = $dingdong["Monto"];
            $num  = explode(",", $dingdong["Números"]);
            $premio = premios_jugadas_main($lot, $sort, $num, $mont, $fecha, $fecha);

            if (sizeof($premio) == 0) {
                $var1 = " ";
                $estado = " ";
                $size=0;
                winners($premio[0], $premio = " ", $fecha, $img, $var1, $estado,$size);

            } elseif (sizeof($premio) == 2) {
                $var1 = $premio[1];
                $size=2;
                if (!empty($premio[1])) {
                    $gano = true;
                    winners($lot, $premio[0], $fecha, $img, $var1, $gano,$size);
                }
            } elseif (sizeof($premio) == 5) {
                $size=3;
                $ganadores = $premio[4];
                $estado = $premio[1];
                winners($lot, $premio[0], $fecha, $img, $ganadores, $estado,$size);
            }
        }
    }
}

// idtablajugada
// jugadas
// fecha
// idterceros_fk
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
