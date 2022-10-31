<?php

function crear_numero_random(){
    return rand(1, 2000000000);
}

function crear_tickets_codigo(){
    return strval(rand(100000, 999999)) . uniqid();
}

// echo crear_tickets_codigo();

?>