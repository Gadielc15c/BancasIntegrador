<?php
include_once('dbConstruct.php');

// Estas funciones deben actualiazarse ya que se le realizaron cambios a la BD
// Pero los cambios se van a postponer porque se considera que no se deben eliminar los datos, sino realizar un update cambiando el estado


// table terceros

function delete_un_usuario_por_nombre($nomuser){
    $sql = "DELETE FROM terceros WHERE nomusuario = ?";
    return ejecutarQuery($sql, array($nomuser));
}

function delete_un_usuario_por_idtercero($id){
    $sql = "DELETE FROM terceros WHERE idterceros = ?";
    return ejecutarQuery($sql, array($id));
}

// table tickets

function delete_ticket_por_idticket($id){
    $sql = "DELETE FROM tickets WHERE idtickets = ?";
    return ejecutarQuery($sql, array($id));
}

function delete_ticket_por_codigobarra($codigobarra){
    $sql = "DELETE FROM tickets WHERE codigobarra = ?";
    return ejecutarQuery($sql, array($codigobarra));
}

// table monedas

function delete_moneda_por_idmonedas($id){
    $sql = "DELETE FROM monedas WHERE idmonedas = ?";
    return ejecutarQuery($sql, array($id));
}

//table pago tarjetas

function delete_pagotarjeta_por_idtarjeta($id){
    $sql = "DELETE FROM pagotarjetas WHERE idpagotarjetas = ?";
    return ejecutarQuery($sql, array($id));
}

function delete_pagotarjeta_por_idpagometodos_fk($id){
    //Tener cuidado usando esta funcion

    $sql = "DELETE FROM pagotarjetas WHERE idpagometodos_fk = ?";
    return ejecutarQuery($sql, array($id));
}

function delete_pagotarjeta_por_idtipotarjetas_fk($id){
    //Tener cuidado usando esta funcion

    $sql = "DELETE FROM pagotarjetas WHERE idtipotarjetas_fk = ?";
    return ejecutarQuery($sql, array($id));
}

// Table pago metodos

function delete_pagometodo_por_idpagometodos($id){
    // Tener cuidado, se va a borrar todos los pagos de tarjeta vinculado a este metodo
    
    delete_pagotarjeta_por_idpagometodos_fk($id);

    $sql = "DELETE FROM pagometodos WHERE idpagometodos = ?";
    return ejecutarQuery($sql, array($id));
}

function delete_pagometodo_por_metodo_fk($metodo_fk){
    // Tener cuidado, se va a borrar todos los pagos de tarjeta vinculado a este metodo
    
    delete_pagotarjeta_por_idpagometodos_fk($metodo_fk);

    $sql = "DELETE FROM pagometodos WHERE metodo_fk = ?";
    return ejecutarQuery($sql, array($metodo_fk));
}

// table tipo tarjetas

function delete_tipotarjetas_por_idtipotarjetas($id){
    // Tener cuidado, se va a borrar todos los pagos de tarjeta que contengan este tipo de tarjeta
    
    delete_pagotarjeta_por_idtipotarjetas_fk($id);

    $sql = "DELETE FROM tipotarjetas WHERE idtipotarjetas = ?";
    return ejecutarQuery($sql, array($id));
}

// table tipo metodo pago

function delete_tipometodopago_por_idtipometodopago($id){
    // Tener cuidado, se va a borrar todos los pagos de tarjeta que contengan este tipo de tarjeta
    
    delete_pagometodo_por_metodo_fk($id);

    $sql = "DELETE FROM tipometodopago WHERE idtipometodopago = ?";
    return ejecutarQuery($sql, array($id));
}

// table sucursal

// No se deberian borrar por ahora




// table loterias


// No se deberian borrar por ahora


// table tablajugadaventadeticket

function delete_tablajugadaventadeticket_estoyharto_por_idterceros_fk($id){
    $sql = "DELETE FROM tablajugadaventadeticket WHERE idterceros_fk = ?";
    return ejecutarQuery($sql, array($id));
}

?>