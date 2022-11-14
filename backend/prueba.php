<?php

session_star();
require_once "conexion.php";

$conexion= conexion();
$consulta='';

function select_historial_jugadas(){
    global $conexion, $consulta;

    $sql ="SELECT J.idjugadas, J.jugnumeros,
                    T.nombre,
                    L.nombre,
                    T.idticket,T.monto, M.moneda, T.fecha, T.estado, TER.nomusuarios, T.codigobarra
                    FROM jugadas J
                    INNER JOIN tipojugadas T ON J.idtipojugada_fk = T.idtipojugadas
                    INNER JOIN loterias L ON J.idloteria_fk  = L.idloteria
                    INNER JOIN tickets T ON J.idticket_fk = T.idticket
                    INNER JOIN monedas M ON T.monedas_fk = M.idmonedas
                    INNER JOIN terceros TER ON T.idterceros_fk = TER.idterceros";

                    return $conexion->query($sql);

}
?>