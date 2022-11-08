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


?>