<?php

function crear_numero_random($maxrange = null){
    if ($maxrange){
        return rand(1, $maxrange);
    }
    return rand(1, 2147483647);
}

function crear_tickets_codigo(){
    return strval(rand(100000, 999999)) . uniqid();
}

function fecha_de_hoy(){
    $timezone = "America/Santo_Domingo";
    $dt = new DateTime("now", new DateTimeZone($timezone));
    $dt -> setTimestamp(time());
    return $dt->format('Y-m-d H:i:s');
}

function por_estado_activo_inactivo($estado){
    if ($estado){
        return "activo";
    } else {
        return "inactivo";
    }
}

function convertir_int_array_a_str_array($arreglo){
    $a = array();
    foreach($arreglo as $b){
        $v = $b;
        if (is_int($b)){
            $v = (string)$b;
        }
        array_push($a, $v);
    }
    return $a;
}

function array_extract(array $a, int $start, int $end, array $skip){
    /* 
        @param $a y $skip
                                Los tipos de variable de deben coincidir entre estos 2. La longitud no importa.
        
        @param $start           El inicio del nuevo array deseado
        @param $end             El final del nuevo array
        @param $skip            Un array con indices (int) para dentro de start y end que no deseas
                                Ej:
                                Array original (0, 1, 2, 3, 4, 5, 6, 7, 8, 9)
                                Quiero los valores del indice 0 al indice 5 pero sin el indice 1 y 3 (skip)
                                Resultado (0, 2, 4, 5)
    */
    $t = array();
    $count = 0;
    foreach($a as $b){
        if ($start <= $count && $count <= $end){
            if (!in_array($count, $skip)){
                array_push($t, $b);
            }
        }
        $count ++;
    }
    return $t;
}

function array_remove_once(array $a, $value){
    /* 
        Removera la primera ocurrencia de $value dentro del array

        @param $a y $value 
                                Los tipos de variable del array  deben coincidir con value
        @param $value           No es un indice, es el valor a remover. Ej: 1 o "1" o [1] etc
    
    */
    $count = 0;
    foreach ($a as $b){
        if ($b == $value){
            break;
        }
        $count ++;
    }
    return array_extract($a , 0, sizeof($a)-1, [$count]);
}

function array_remove_null(array $a){
    $t = [];
    foreach($a as $b){
        if ($b !== null){
            array_push($t, $b);
        } 
    }
    return $t;
}

?>