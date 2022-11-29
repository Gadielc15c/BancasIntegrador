<?php
include_once('sqlquerygenerals.php');
include_once('sqlqueryselect.php');

// 
// Inserts combinados
// 

function insertar_combo_pagos_paypal(int $tercerosid, array $ticket_info){
    /* 
        @param ticket_info      array       
                                            estructura: [
                                                            $lotlabel => string nombre_de_la_loteria
                                                            $solabel => string nombre_del_sorteo
                                                            $genjuglabel => arreglo cada_numero_jugado_como_int
                                                            $genmontolabel => int monto_del_ticket
                                                        ]
    
    */

    // verify_ticket_content();
    // insertar_pagosrealizados();
    // crear_tickets_codigo();


}



// 
// Inserts individuales
// 

// table terceros

function insertar_tercero(string $nomusuario, string $claveusuario, int $idterdata_fk, string $correo, string $cedula, int $idtelefonos_fk, int $idnivelacceso_fk){
    verify_correo($correo);
    $cedula = verify_cedula($cedula);
    return execute_insert(  "idterceros", "terceros", 
                            "nomusuario claveusuario idterdata_fk correo cedula idtelefonos_fk idnivelacceso_fk", 
                            func_get_args()
                        );
}

// table tickets

function insertar_ticket(int $monto, string $jugadas, int $idsorteo_fk, bool $tickestado, int $idterceros_fk, string $codigobarra, int $idsucursalventa_fk, int $idsucursalpago_fk, int $idpagometodos_fk){
    /* 
        @param jugadas      string      Va separada por un espacion. Ejemplo 1 2 3 4 5
    */
    
    verify_monto($monto);

    return execute_insert(  "idtickets", "tickets", 
                            "tickmonto tickjugadas idsorteo_fk tickestado idterceros_fk codigobarra idsucursalventa_fk idsucursalpago_fk idpagometodos_fk", 
                            func_get_args(),
                            true, 1, "tickfecha"
                        );
}

// table terceros data

function insertar_tercero_data(string $nomprimero, string $nomsegundo, string $apeprimero, string $apesegundo, string $fechanac, int $iddireccion_fk){
    verify_date($fechanac);
    return execute_insert(  "idterdata", "tercerosdata", 
                            "nomprimero nomsegundo apeprimero apesegundo fechanac iddireccion_fk", 
                            func_get_args()
                        );
}

// table nivel acceso

function insertar_nivel_acceso(string $nombre, string $descrip){
    return execute_insert(  "idnivelacceso", "nivelacceso", 
                            "nivelnombre descrip", 
                            func_get_args(),
                            false, 0, "", 100
                        );
    
}

// table monedas

function insertar_moneda(string $moneda, string $nombre){
    /* 
        @param moneda   string      es la abreviacion de la moneda. Ejemplo US, DOP, RD
    */
    return execute_insert(  "idmonedas", "monedas", 
                            "moneda monombre", 
                            func_get_args()
                        );
}

// table pagometodos

function insertar_metodo_de_pago(int $idtipometodopago_fk, int $idterceros_fk){
    return execute_insert(  "idpagometodos", "pagometodos", 
                            "idtipometodopago_fk idterceros_fk", 
                            func_get_args(),
                            false, 0, "", 300
                        );
}

// table tipotarjetas

function insertar_tipotarjeta(string $nombre){
    // Ejemplo Visa, MasterCard
    return execute_insert(  "idtipotarjetas", "tipotarjetas", 
                            "tipotarjnombre", 
                            func_get_args()
                        );
}

// table pagotarjetas

function insertar_pagotarjeta(string $nombre, int $numerotarj, int $cvc, string $fechavencimiento, int $idpagometodos_fk, int $idtipotarjetas_fk){
    verify_date($fechavencimiento);
    return execute_insert(  "idpagotarjetas", "pagotarjetas", 
                            "tarjnombre tarjnumero cvc fechaven idpagometodos_fk idtipotarjetas_fk", 
                            func_get_args()
                        );
}

// table tipometodopago

function insertar_tipometodopago(string $nombre){
    // Ejemplo Crédito, Débito, Paypal
    return execute_insert(  "idtipometodopago", "tipometodopago", 
                            "metnombre", 
                            func_get_args(),
                            false, 0, "", 300
                        );
}

// table sucursal

function insertar_sucuarsal(string $nombre, int $idterceros_fk, int $idtelefonos_fk, int $iddireccion_fk){
    return execute_insert(  "idsucursal", "sucursal", 
                            "nombresucursal idterceros_fk idtelefonos_fk iddireccion_fk", 
                            func_get_args()
                        );
}

// table loterias

function insertar_loterias(string $nombre, int $idterceros_fk){
    return execute_insert(  "idloterias", "loterias", 
                            "lotnombre idterceros_fk", 
                            func_get_args()
                        );
}

// table pagosrealizados

function insertar_pagosrealizados(int $montototal, int $monedas_fk, int $origen_fk, int $idterceros_fk){
    verify_monto($montototal);
    return execute_insert(  "idpagosrealizados", "pagosrealizados", 
                            "montototal idmonedas_fk idpagosonline_fk idtarjeta_fk idterceros_fk", 
                            func_get_args(),
                            true, 1
                        );
}

// table pagosonline
function insertar_pagosonline(string $jsoncontent, int $idpagometodos_fk){
    $v = verify_if_string_is_json($jsoncontent);
    if (!$v){
        throw new Exception("The content isn't json");
    }
    return execute_insert(  "idpagosonline", "pagosonline", 
                            "jsoncontent idpagometodos_fk", 
                            func_get_args()
                        );
}

// table sorteo

function insert_sorteo(int $idnomsorteo_fk, int $idloteria_fk, int $idzona_fk, int $idmoneda_fk){
    return execute_insert(  "idsorteo", "sorteo", 
                            "idnomsorteo_fk idloteria_fk idzona_fk idmonedas_fk", 
                            func_get_args()
                        );
}

// table asuetosorteo

function insert_asuetosorteo(string $mesdia){
    /* 
        @param mesdia   string      Formato de mesdia: 01-01, 12-25, 12-31
    */
    if (!verify_mesdia($mesdia)){
        throw new Exception("mesdia wrong format.");
    }

    return execute_insert(  "idmesdia", "asuetosorteo", 
                            "mesdia", 
                            func_get_args()
                        );
}

// table vsasuetosorteo

function insert_vsasuetosorteo(int $idmesdia_fk, int $idsorteo_fk){
    return execute_insert(  "idvsasueto", "vsasuetosorteo", 
                            "idmesdia_fk idsorteo_fk", 
                            func_get_args()
                        );
}

// table horamilitarsorteo

function insert_horamilitarsorteo(string $hora){
    /* 
        @param hora     string      Formato hh:mm, ejemplo 10:50, 00:05, 23:58
    
    */

    if (!verify_horamilitar($hora)){
        throw new Exception("hora wrong format.");
    }

    return execute_insert(  "idhoramilitar", "horamilitarsorteo", 
                            "hora", 
                            func_get_args()
                        );
}

// table horariosorteo

function insert_horariosorteo(int $idhoramilitar_fk, int $iddias_fk, int $idsorteo_fk){
    return execute_insert(  "idhorariosorteo", "horariosorteo", 
                            "idhoramilitar_fk iddias_fk idsorteo_fk", 
                            func_get_args()
                        );
}

// table tomborangosorteo

function insert_tomborangosorteo(string $inicia, string $termina, string $cantidadbolos){
    return execute_insert(  "idtr", "tomborangosorteo", 
                            "tomboinicia tombotermina cantidadbolos", 
                            func_get_args()
                        );
}

// table vstomborangosorteo

function insert_vstomborangosorteo(string $idtr_fk, string $idnomsorteo_fk){
    return execute_insert(  "idvstr", "vstomborangosorteo", 
                            "idtr_fk idnomsorteo_fk", 
                            func_get_args()
                        );
}

// table costosorteo

function insert_costosorteo(int $costo){
    verify_monto($costo);
    return execute_insert(  "idcosto", "costosorteo", 
                            "costo", 
                            func_get_args()
                        );
}

// table nomsorteo

function insert_nomsorteo(string $nom){
    return execute_insert(  "idnomsorteo", "nomsorteo", 
                            "sorteonom", 
                            func_get_args()
                        );
}

// table vscostonomsorteo

function insert_vscostonomsorteo(int $idsorteo_fk, int $idnomsorteo_fk){
    return execute_insert(  "idnomsorteo", "vscostonomsorteo", 
                            "idcosto_fk idnomsorteo_fk", 
                            func_get_args()
                        );
}

// table zonahorariautc

function insert_zonahorariautc(string $phptimezone){
    if (!in_array($phptimezone, DateTimeZone::listIdentifiers())){
        throw new Exception("Invaid TimeZone");
    }
    return execute_insert(  "idzona", "zonahorariautc", 
                            "phptimezone", 
                            func_get_args()
                        );
}

// table tiposorteo

function insert_tiposorteo(string $nomtipo){
    return execute_insert(  "idtiposorteo", "tiposorteo", 
                            "nomtipo", 
                            func_get_args()
                        );
}

// table vstiposorteo

function insert_vstiposorteo(int $idtiposorteo_fk, int $idsorteo_fk){
    return execute_insert(  "idvstiposorteo", "vstiposorteo", 
                            "idtiposorteo_fk idsorteo_fk", 
                            func_get_args()
                        );
}

// tabledata

function insert_tabledata(string $tablename, string $tableidcol){
    return execute_insert(  "idtabledata", "tabledata", 
                            "tablename tableidcol", 
                            func_get_args()
                        );
}

// table tablajugadaventadeticket

function insertar_tablajugada_estoyharto(string $jugadas, int $idterceros_fk){
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
