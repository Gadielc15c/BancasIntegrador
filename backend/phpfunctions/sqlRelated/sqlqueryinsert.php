<?php
include_once('sqlquerygenerals.php');
include_once('sqlqueryselect.php');

// table terceros

function insertar_tercero(string $nomuser, string $claveuser, string $correo){
    $nivelacceso = 4; //4 Pertenece al cliente comun
    $idcol = "idterceros";
    $table = "terceros";
    $id = crear_id($idcol, $table);
    $sql = "INSERT INTO $table ($idcol, nomusuario, claveusuario, correo, idnivelacceso_fk) VALUES (?, ?, ?, ?, ?)";
    return ejecutarQuery($sql, array($id, $nomuser, $claveuser, $correo, $nivelacceso));
}

// table tickets

function insertar_ticket(int $monto, int $idter, int $monedas_fk = 1, array $jugadas, string $codigobarra = null, int $sucursalventa_fk = null, int $sucursalpago_fk = null){

    $idcol = "idtickets";
    $table = "tickets";
    $id = crear_id($idcol, $table);
    $fecha = fecha_de_hoy();
    if ($codigobarra == null){
        $codigobarra = crear_tickets_codigo();
    }
    $jugadas = implode(" ", $jugadas);
    
    $sql = "INSERT INTO $table ($idcol, monto, monedas_fk, fecha, jugadas, idterceros_fk, codigobarra) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    if ($monto < 0){
        return false;
    }
    
    return ejecutarQuery($sql, array($id, $monto, $monedas_fk, $fecha, $idter, $codigobarra));
}

// table terceros data

function insertar_tercero_data($nomprimero = null, $nomsegundo  = null, $apeprimero  = null, $apesegundo  = null, $fechanac  = null){
    $idcol = "idterdata";
    $table = "tercerosdata";
    $id = crear_id($idcol, $table);
    $sql = "INSERT INTO $table ($idcol, nomprimero, nomsegundo, apeprimero, apesegundo, fechanac) VALUES (?, ?, ?, ?, ?, ?)";
    $value = ejecutarQuery($sql, array($id, $nomprimero, $nomsegundo, $apeprimero, $apesegundo, $fechanac));
    if ($value){
        return $id;
    }
    return $value; //false

}

// table nivel acceso

function insertar_nivel_acceso($nombre, $idnivelacceso = null, $descrip = null){
    $idcol = "idnivelacceso";
    $table = "nivelacceso";
    $maxrange = 100;
    if ($idnivelacceso <= $maxrange && verificar_existencia_de_valor($idnivelacceso, $idcol, $table)){
        $idnivelacceso =crear_id($idcol, $table, $maxrange);
    }
    $sql = "INSERT INTO $table ($idcol, nombre, descrip) VALUES (?, ?, ?)";
    return ejecutarQuery($sql, array($idnivelacceso, $nombre, $descrip));
    
}

// table monedas

function insertar_moneda($moneda, $nombre, $idmonedas = null){
    $idcol = "idmonedas";
    $table = "monedas";
    $maxrange = 300;
    if ($idmonedas <= $maxrange && verificar_existencia_de_valor($idmonedas, $idcol, $table)){
        $idmonedas =crear_id($idcol, $table, $maxrange);
    }
    $sql = "INSERT INTO $table ($idcol, moneda, nombre) VALUES (?, ?, ?)";
    return ejecutarQuery($sql, array($idmonedas, $moneda, $nombre));

}

// table pago metodos

function insertar_metodo_de_pago($metodo_fk, $idter, $principal = 0, $estado = 0){

    $idcol = "idpagometodos";
    $table = "pagometodos";
    $maxrange = 300;
    $id = crear_id($idcol, $table, $maxrange);
    $sql = "INSERT INTO $table ($idcol, metodo_fk, principal, idterceros_fk, estado) VALUES (?, ?, ?, ?, ?)";
    $value = ejecutarQuery($sql, array($id, $metodo_fk, $principal, $idter, $estado));

    if ($value){
        return $id;
    }
    return $value; //false
}

// table tipo tarjetas

function insertar_tipo_tarjeta($tipo){
    $idcol = "idtipotarjetas";
    $table = "tipotarjetas";
    $maxrange = 300;
    $id = crear_id($idcol, $table, $maxrange);
    $sql = "INSERT INTO $table ($idcol, nombre) VALUES (?, ?)";
    $value = ejecutarQuery($sql, array($id, $tipo));

    if ($value){
        return $id;
    }
    return $value; //false
}

// table pago tarjetas

function insertar_pago_tarjeta($nombre, $numerotarj, $cvc, $fechavencimiento, $idpagometodos_fk, $idtipotarjeta_fk, $estado = 1){
    // @param $fechavencimiento         Este valor debe estar encriptado para poder funcionar bien en la BD

    $idcol = "idpagotarjetas";
    $table = "pagotarjetas";
    $id = crear_id($idcol, $table);
    $sql = "INSERT INTO $table ($idcol, nombre, numerotarj, cvc, fechaven, idpagometodos_fk, idtipotarjetas_fk, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    return ejecutarQuery($sql, array($id, $nombre, $numerotarj, $cvc, $fechavencimiento, $idpagometodos_fk, $idtipotarjeta_fk, $estado));

}

// table tipo metodo pago

function insertar_tipometodopago($nom, $estado = 1){
    $idcol = "idtipometodopago";
    $table = "tipometodopago";
    $maxrange = 300;
    $id = crear_id($idcol, $table, $maxrange);
    $sql = "INSERT INTO $table ($idcol, nombre, estado) VALUES (?, ?, ?)";
    $value = ejecutarQuery($sql, array($id, $nom, $estado));

    if ($value){
        return $id;
    }
    return $value; //false
}

// table sucursal

function insertar_sucuarsal($nom, $idterceros_fk = null, $idtelefonos_fk = null, $iddireccion_fk = null, $estado = 1){
    $idcol = "idsucursal";
    $table = "sucursal";
    $id = crear_id($idcol, $table);
    $sql = "INSERT INTO $table ($idcol, nombresucursal, idterceros_fk, idtelefonos_fk, iddireccion_fk, estado) VALUES (?, ?, ?, ?, ?, ?)";
    $value = ejecutarQuery($sql, array($id, $nom, $idterceros_fk, $idtelefonos_fk, $iddireccion_fk, $estado));

    if ($value){
        return $id;
    }
    return $value; //false
}

// table loterias

function insertar_loterias($nom, $idterceros_fk = null, $estado = 1){
    $idcol = "idloterias";
    $table = "loterias";
    $id = crear_id($idcol, $table);
    $sql = "INSERT INTO $table ($idcol, nombre, idterceros_fk, estado) VALUES (?, ?, ?, ?)";
    $value = ejecutarQuery($sql, array($id, $nom, $idterceros_fk, $estado));

    if ($value){
        return $id;
    }
    return $value; //false
}

// table lothorarios ya no existe

// function insertar_lothorarios($dialaboral, $horainicio, $horacierre, $diasorteo, $horasorteo, $estado = 1){
//     /*
//         @param $dialaboral y diasorteo      
//                                             poner un str en referencia al dia separado por un espacio, ej: 
//                                             0 para domingo, 1 lunes, 2 martes, 3 miercoles, 4 jueves, 5 viernes, 6 sabado
//                                             7 si es diario
//                                             Ejemplo: 
//                                             si es martes y domingo "0 2" (orden importa)
//                                             Si es diario "7"
//                                             Si es lunes, martes, y jueves "1 2 4" 
//                                             El orden si importa
//                                             Nunca combinar el 7 con otro dia

//         @param $horainicio y $horacierre        en hora militar, 
//                                                 empieza en 00:00 y termina en 23:59, 
//                                                 format hh:mm:ss (los segundos son opcionales)
//     */
//     $idcol = "idlothorarios";
//     $table = "lothorarios";
//     $id = crear_id($idcol, $table);
//     $sql = "INSERT INTO $table ($idcol, dialaboral, horainicio, horacierre, diasorteo, horasorteo, estado) VALUES (?, ?, ?, ?, ?, ?, ?)";
//     $value = ejecutarQuery($sql, array($id, $dialaboral, $horainicio, $horacierre, $diasorteo, $horasorteo, $estado));

//     if ($value){
//         return $id;
//     }
//     return $value; //false
// }

// table tipojugadas

function insertar_tipojugadas($nombre, $idloteria_fk, $estado = 1){
    $idcol = "idtipojugadas";
    $table = "tipojugadas";
    $id = crear_id($idcol, $table);
    $sql = "INSERT INTO $table ($idcol, nombre, idloteria_fk, estado) VALUES (?, ?, ?, ?)";
    $value = ejecutarQuery($sql, array($id, $nombre, $idloteria_fk, $estado));

    if ($value){
        return $id;
    }
    return $value; //false
}

// table jugadas

function insertar_jugadas($jugnumeros, $idtipojugada_fk, $idticket_fk, $estado = 1){
    /*
        @param $jugnumeros          debe insertar un string de numeros separados por un espacio, ejemplo 10 50 60 80 8 23 6

    */
    $idcol = "idjugadas";
    $table = "jugadas";
    $id = crear_id($idcol, $table);
    $sql = "INSERT INTO $table ($idcol, jugnumeros, idtipojugada_fk, idticket_fk, estado) VALUES (?, ?, ?, ?, ?)";
    $value = ejecutarQuery($sql, array($id, $jugnumeros, $idtipojugada_fk, $idticket_fk, $estado));

    if ($value){
        return $id;
    }
    return $value; //false
}

// table pagos realizados

function insertar_pagosrealizados($montototal, $monedas_fk, $origen_fk, $idterceros_fk, $estado = 1){
    $idcol = "idpagosrealizados";
    $table = "pagosrealizados";
    $id = crear_id($idcol, $table);
    $fecha = fecha_de_hoy();
    $sql = "INSERT INTO $table ($idcol, montototal, fecha, monedas_fk, origen_fk, idterceros_fk, estado) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $value = ejecutarQuery($sql, array($id, $montototal, $fecha, $monedas_fk, $origen_fk, $idterceros_fk, $estado));

    if ($value){
        return $id;
    }
    return $value; //false
}

// table ticketsvspagosrealizados

function insertar_ticketsvspagosrealizados($idtickets_fk, $idpagosrealizados_fk){
    $idcol = "idtpr";
    $table = "ticketsvspagosrealizados";
    $id = crear_id($idcol, $table);
    $sql = "INSERT INTO $table ($idcol, idtickets_fk, idpagosrealizados_fk) VALUES (?, ?, ?)";
    $value = ejecutarQuery($sql, array($id, $idtickets_fk, $idpagosrealizados_fk));

    if ($value){
        return $id;
    }
    return $value; //false
}

// table tablajugadaventadeticket

function insertar_tablajugada_estoyharto(string $jugadas, $idterceros_fk){
    $idcol = "idtablajugada";
    $table = "tablajugadaventadeticket";
    $fecha = fecha_de_hoy();
    $id = crear_id($idcol, $table);
    $sql = "INSERT INTO $table ($idcol, jugadas, fecha, idterceros_fk) VALUES (?, ?, ?, ?)";
    $value = ejecutarQuery($sql, array($id, $jugadas, $fecha, $idterceros_fk));

    if ($value){
        return $id;
    }
    return $value; //false
}

?>
