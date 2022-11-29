<?php 

    include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/sqlRelated/sqlqueryselect.php');
    include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/generals.php');
    include_once(dirname(__FILE__, 2) . '/backend/llavesYTextos.php');
    include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/carritoFunctions.php');

    $fecha = explode(" ", fecha_de_hoy())[0];
    $id=0;
    if(isset($_SESSION[$sestabladejugadas])){
        $value = $_SESSION[$sestabladejugadas];
    } else {
        $value = seleccionar_tablajugadaventadeticket_estoyharto_por_idterceros_fk($_SESSION[$dbtercerosid]);
        if ($value){
            $fecha = $value[$genfeclabel];
            $value = convert_str_to_array_estoyharto($value[$genjuglabel]);
        } else {
            $value = false;
        }
    }
    if ($value){
        foreach ($value as $v){
    
            $lot = $v[$lotlabel];
            $sort = $v[$solabel];
            $tipo = $v[$sotipolabel];
            $jug = $v[$gennumlabel];
            $cant = $v[$gencantlabel];
            $monto = $v[$genmontolabel];
            $tot= $cant * $monto;
            $img ="../img/Logo.png ";
            $keyed_array = array_merge($v, [$genimagenlabel => $img]);
            $id=$id+1;
            $poster=[$cant,$lot,$sort,$tot,$jug,$tipo,$monto,$fecha,$img];
            shoppingMaker($cant,$lot,$sort,$tot,$jug,$tipo,$monto,$fecha,$img,$keyed_array,$id,$poster);
            } 
    }
    
?>

