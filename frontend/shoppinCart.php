<?php 

    for($x = 1; $x < 10; $x++){
        $path = dirname(__FILE__, $x);
        $patha = explode("\\", $path);
        if (end($patha) == "BancasIntegrador"){
            break;
        }
    }

    include_once($path . "\\include_me.php");
    include_once(include_me("carritoFunctions.php", $path));
    include_once(include_me("llavesYTextos.php", $path));
    include_once(include_me("sqlqueryselect.php", $path));
    include_once(include_me("generals.php", $path));
    // include('../backend/phpfunctions/carritoFunctions.php');

    $fecha = explode(" ", fecha_de_hoy())[0];

    if(isset($_SESSION[$sestabladejugadas])){
        $value = $_SESSION[$sestabladejugadas];
    } else {
        $value = seleccionar_tablajugadaventadeticket_estoyharto_por_idterceros_fk($_SESSION[$dbuserid]);
        if ($value){
            $fecha = $value[$genfeclabel];
            $value = convert_str_to_array_estoyharto($value[$genjuglabel]);
        } else {
            $value = false;
        }
    }

    foreach ($value as $v){
    
        $lot = $v[$lotlabel];
        $sort = $v[$solabel];
        $tipo = $v[$sotipolabel];
        $jug = $v[$gennumlabel];
        $cant = $v[$gencantlabel];
        $monto = $v[$genmontolabel];
        $tot= $cant * $monto;
        $img ="xD";
        $keyed_array = array_merge($v, [$genimagenlabel => $img]);
        shoppingMaker($cant,$lot,$sort,$tot,$jug,$tipo,$monto,$fecha,$img,$keyed_array);
        } 
?>

