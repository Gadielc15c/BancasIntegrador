<?php
include_once('sqlquerygenerals.php');
include_once('sqlqueryselect.php');

function insertar_tercero($nomuser, $claveuser, $correo){
    $nivelacceso = 4; //4 Pertenece al cliente comun
    $idcol = "idterceros";
    $table = "terceros";
    $id = crear_id($idcol, $table);
    $sql = "INSERT INTO $table ($idcol, nomusuario, claveusuario, correo, idnivelacceso_fk) VALUES (?, ?, ?, ?, ?)";
    return ejecutarQuery($sql, array($id, $nomuser, $claveuser, $correo, $nivelacceso));
}

function insertar_ticket($monto, $nomuser, $monedas_fk = 1, $sucursalventa_fk = null, $sucursalpago_fk = null){

    $idcol = "idtickets";
    $table = "tickets";
    $id = crear_id($idcol, $table);
    $fecha = fecha_de_hoy();
    $idter = seleccionar_id_tercero_por_nombre($nomuser);
    $codigobarra = crear_tickets_codigo();
    $sql = "INSERT INTO $table ($idcol, monto, monedas_fk, fecha, idterceros_fk, codigobarra) VALUES (?, ?, ?, ?, ?, ?)";
    
    if ($monto < 0){
        return false;
    }
    
    return ejecutarQuery($sql, array($id, $monto, $monedas_fk, $fecha, $idter, $codigobarra));
}

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

function insertar_moneda($idmonedas = null, $moneda, $nombre){
    $idcol = "idmonedas";
    $table = "monedas";
    $maxrange = 300;
    if ($idmonedas <= $maxrange && verificar_existencia_de_valor($idmonedas, $idcol, $table)){
        $idmonedas =crear_id($idcol, $table, $maxrange);
    }
    $sql = "INSERT INTO $table ($idcol, moneda, nombre) VALUES (?, ?, ?)";
    return ejecutarQuery($sql, array($idmonedas, $moneda, $nombre));

}

function insertar_metodo_de_pago($metodo, $principal = 0, $idter){
    // @param $metodo       ejemplo paypal, credito, debito, etc

    $idcol = "idpagometodos";
    $table = "pagometodos";
    $maxrange = 300;
    $id = crear_id($idcol, $table, $maxrange);
    $sql = "INSERT INTO $table ($idcol, metodo, principal, idterceros_fk) VALUES (?, ?, ?, ?)";
    $value = ejecutarQuery($sql, array($id, $metodo, $principal, $idter));

    if ($value){
        return $id;
    }
    return $value; //false
}

function insertar_tipo_targeta($tipo){
    // @param $tipo         ejemplo mastercard, visa, etc

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

function insertar_pago_tarjeta($nombre, $numerotarj, $cvc, $fechavencimiento, $idpagometodos_fk, $idtipotarjeta_fk){
    // @param $fechavencimiento         Este valor debe estar encriptado para poder funcionar bien en la BD

    $idcol = "idpagotarjetas";
    $table = "pagotarjetas";
    $id = crear_id($idcol, $table);
    $sql = "INSERT INTO $table ($idcol, nombre, numerotarj, cvc, fechaven, idpagometodos_fk, idtipotarjetas_fk) VALUES (?, ?, ?, ?, ?, ?, ?)";
    return ejecutarQuery($sql, array($id, $nombre, $numerotarj, $cvc, $fechavencimiento, $idpagometodos_fk, $idtipotarjeta_fk));



}





?>
