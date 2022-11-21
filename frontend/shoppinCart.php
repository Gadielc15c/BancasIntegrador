<?php 
    include_once("E:\\xampp\\htdocs\\include_me.php");
    include_once(include_me("carritoFunctions.php"));
    include_once(include_me("llavesYTextos.php"));
    include_once(include_me("sqlqueryselect.php"));
    include_once(include_me("generals.php"));
    // include('../backend/phpfunctions/carritoFunctions.php');

    $fecha = explode(" ", fecha_de_hoy())[0];

    if(isset($_SESSION[$sestabladejugadas])){
        $value = $_SESSION[$sestabladejugadas];
    } else {
        $value = seleccionar_tablajugadaventadeticket_estoyharto_por_idterceros_fk($_SESSION[$dbuserid]);
        if ($value){
            $value = convert_str_to_array_estoyharto($value[$genjuglabel]);
            $fecha = $value[strtolower($genfeclabel)];
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

