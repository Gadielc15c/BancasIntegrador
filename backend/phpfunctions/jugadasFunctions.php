<?php

// Paginas de referencias
// https://www.conectate.com.do/loterias
// https://loteriasdominicanas.com/
// Y entre otras

include_once(dirname(__FILE__) . "/webscraping.php");
include_once(dirname(__FILE__) . "/generals.php");
include_once(dirname(__FILE__) . "/sqlRelated/sqlqueryinsert.php");

$todo_loteria = ["Loteria Nacional", "Leidsa", "Loteria Real", "Loteka", "Americanas", "La Primera", "La Suerte", "LoteDom", "Anguila", "King Lottery"];


$todo_sorteo = ["Juega + Pega +", "Gana Más", "Lotería Nacional", "Pega 3 Más", "Quiniela Leidsa", "Loto Pool", "Super Kino TV", "Loto - Super Loto Más", "Loto Pool", "Quiniela Real", "Loto Real", "Quiniela Loteka", "Mega Chances", "MegaLotto", "New York Tarde", "New York Noche", "Florida Día", "Florida Noche", "Mega Millions", "PowerBall", "Cash 4 Life", "La Primera Día", "Primera Noche", "La Suerte 12:30", "La Suerte 18:00", "Quiniela LoteDom", "El Quemaito Mayor", "Anguila Mañana", "Anguila Medio Día", "Anguila Tarde", "Anguila Noche", "King Lottery 12:30", "King Lottery 7:30"];


// Estructura de la variable $todo_combinado:
// Array
//   |__Lot Array (string nombre loteria)
//       |__ Sorteo Array ( string Nombre del sorteo)
//             |___ Sorteo info Array [ Tiene 10 elementos:
//                                      0 Un array con el horario de la siguiente forma:
//                                          string Hora militar de cierre de ticket format hh:mm    si no se sabe la hora de cierre, ponerle 30 min antes del sorteo
//                                          string Hora militar del sorteo format hh:mm,
//                                          Ejemplo [["14:00", "14:30"], ["17:30", "18:00"]] esto quiere decir que un dia se sortea a las 2:30pm y otro dia a las 6pm
//                                          NOTA: La hora de cierre del ticket se aplica para los dias que son los sorteos. No para los demas dias
//                                      1 bool hora dominicana,
//                                      2 array con otro array para los dias del sorteo (de 0 siendo domingo hasta el 6 siendo sabado. o 7 si es diario). ejemplo [[1, 2, 3, 4, 5, 6], [7]] esto quiere decir que los sorteos tienen distintos dias
//                                      3 array Dias asuetos en formato mm-dd Ejemplo ["12-24", "12-25"]
//                                      4 bool moneda dominicana
//                                      5 array Con los diferentes costos Ejemplo [10, 25, 50] o sino [] si los premios son por peso
//                                      6 int Cantidad de bolos que salen
//                                      7 array Con la cantidad de bolos que salen por tombola. Ejemplo [2, 2, 1] quiere decir que en la tombola 0 salen 2 numeros y en la ultima tombola sale 1 numero
//                                      8 array Con otro array indicando el rango de los numeros por cada tombola, Formato del rango [[1, 26], [1, 26], [1, 26]]
//                                      9 array Juegos permitidos. u para unicos, q para quiniela, p para pale, t para tripleta. Ejemplo 1 ["unico"]. Ejemplo 2 ["quiniela", "pale", "tripleta"]. Ejemplo 3 ["quiniela"]
//                                    ]
//                                     FIN de Sorteo info. 
//                                     Nota: Los bolos no se repiten dentro de una misma tombola, pero si se pueden repetir los bolos de distintas tombolas
//

$hor_label = "horario";
$rd_t_label = "hora dominicana";
$dia_s_label = "dias del sorteo";
$dia_a_label = "dias asueto";
$rd_m_label = "moneda dominicana";
$costo_label = "costo de ticket";
$cant_b_label = "bolos total";
$cant_bp_label = "cantidad de bolos por tombola";
$rango_b_label = "rango de los bolos por tombola";
$jug_label = "tipo de jugada";

$q_label = "quiniela";
$p_label = "palé";
$t_label = "tripleta";
$u_label = "unica";

$todo_combinado = [  "Loteria Nacional" =>   [  "Juega + Pega +" =>         [$hor_label => [["14:00", "14:30"]], $rd_t_label => true, $dia_s_label => [1, 2, 3, 4, 5, 6], $dia_a_label => [], $rd_m_label => true, $costo_label => [25], $cant_b_label => 5, $cant_bp_label => [2, 2, 1], $rango_b_label => [[1, 26], [1, 26], [1, 26]], $jug_label => [$u_label]], 
                                                "Gana Más" =>               [$hor_label => [["14:00", "14:30"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]],
                                                "Lotería Nacional" =>       [$hor_label => [["20:30", "21:00"], ["17:30", "18:00"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => ["1-1", "1-21", "12-24", "12-25", "12-31"], $rd_m_label => true, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]],
                                            ],
                     "Leidsa" =>             [  "Pega 3 Más" =>             [$hor_label => [["20:25", "20:55"], ["15:25", "15:55"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [3], $rango_b_label => [[00, 50]], $jug_label => [$u_label]],
                                                "Quiniela Leidsa" =>        [$hor_label => [["20:25", "20:55"], ["15:25", "15:55"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]],
                                                "Loto Pool" =>              [$hor_label => [["20:25", "20:55"], ["15:25", "15:55"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [20], $cant_b_label => 5, $cant_bp_label => [5], $rango_b_label => [[01, 31]], $jug_label => [$u_label]],
                                                "Super Kino TV" =>          [$hor_label => [["20:25", "20:55"], ["15:25", "15:55"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [25], $cant_b_label => 20, $cant_bp_label => [20], $rango_b_label => [[01, 80]], $jug_label => [$u_label]],
                                                "Loto - Super Loto Más" =>  [$hor_label => [["20:25", "20:55"]], $rd_t_label => true, $dia_s_label => [3, 6], $dia_a_label => [], $rd_m_label => true, $costo_label => [30, 50, 100], $cant_b_label => 8, $cant_bp_label => [6, 1, 1], $rango_b_label => [[01, 38], [01, 10], [01, 15]], $jug_label => [$u_label]],
                                            ],
                     "Loteria Real"  =>      [  "Loto Pool" =>              [$hor_label => [["12:30", "13:00"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [10], $cant_b_label => 4, $cant_bp_label => [4], $rango_b_label => [[00, 99]], $jug_label => [$u_label]],
                                                "Quiniela Real" =>          [$hor_label => [["12:25", "12:55"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]],
                                                "Loto Real" =>              [$hor_label => [["12:25", "12:55"]], $rd_t_label => true, $dia_s_label => [2, 5], $dia_a_label => [], $rd_m_label => true, $costo_label => [10, 25], $cant_b_label => 6, $cant_bp_label => [6], $rango_b_label => [[01, 38]], $jug_label => [$u_label]], #11
                                            ],
                     "Loteka"  =>            [
                                                "Quiniela Loteka" =>        [$hor_label => [["19:25", "19:55"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]],
                                                "Mega Chances" =>           [$hor_label => [["19:25", "19:55"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [20], $cant_b_label => 5, $cant_bp_label => [5], $rango_b_label => [[00, 99]], $jug_label => [$u_label]],
                                                "MegaLotto" =>              [$hor_label => [["19:25", "19:55"]], $rd_t_label => true, $dia_s_label => [1, 2, 3, 4], $dia_a_label => [], $rd_m_label => true, $costo_label => [10], $cant_b_label => 6, $cant_bp_label => [6], $rango_b_label => [[00, 49]], $jug_label => [$u_label]],
                                            ],
                     "Americanas"  =>        [
                                                "New York Tarde" =>         [$hor_label => [["14:00", "14:30"]], $rd_t_label => false, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]], #15
                                                "New York Noche" =>         [$hor_label => [["10:00", "10:30"]], $rd_t_label => false, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]],
                                                "Florida Día" =>            [$hor_label => [["13:00", "13:30"]], $rd_t_label => false, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]],
                                                "Florida Noche" =>          [$hor_label => [["21:15", "21:45"]], $rd_t_label => false, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]],
                                                "Mega Millions" =>          [$hor_label => [["21:59", "23:00"]], $rd_t_label => false, $dia_s_label => [2, 5], $dia_a_label => [], $rd_m_label => false, $costo_label => [2], $cant_b_label => 6, $cant_bp_label => [5, 1], $rango_b_label => [[01, 70], [01, 25]], $jug_label => [$u_label]],
                                                "PowerBall" =>              [$hor_label => [["21:59", "22:59"]], $rd_t_label => false, $dia_s_label => [3, 6], $dia_a_label => [], $rd_m_label => false, $costo_label => [2], $cant_b_label => 6, $cant_bp_label => [5, 1], $rango_b_label => [[01, 69], [01, 26]], $jug_label => [$u_label]],
                                                "Cash 4 Life" =>            [$hor_label => [["20:00", "21:00"]], $rd_t_label => false, $dia_s_label => [3, 6], $dia_a_label => [], $rd_m_label => false, $costo_label => [2], $cant_b_label => 6, $cant_bp_label => [5, 1], $rango_b_label => [[01, 60], [01, 04]], $jug_label => [$u_label]],
                                            ],
                     "La Primera"  =>        [
                                                "La Primera Día" =>         [$hor_label => [["11:30", "12:00"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]], #22
                                                "Primera Noche" =>          [$hor_label => [["19:30", "20:00"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]],
                                            ],
                     "La Suerte"  =>         [
                                                "La Suerte 12:30" =>        [$hor_label => [["12:00", "12:30"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]],
                                                "La Suerte 18:00" =>        [$hor_label => [["17:30", "18:00"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]],
                                            ],
                     "LoteDom"  =>           [
                                                "Quiniela LoteDom" =>       [$hor_label => [["13:25", "13:55"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]], #26
                                                "El Quemaito Mayor" =>      [$hor_label => [["13:25", "13:55"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [], $cant_b_label => 1, $cant_bp_label => [1], $rango_b_label => [[00, 99]], $jug_label => [$u_label]],
                                            ],
                     "Anguila"  =>           [
                                                "Anguila Mañana" =>         [$hor_label => [["09:30", "10:00"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => false, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]],
                                                "Anguila Medio Día" =>      [$hor_label => [["12:30", "13:00"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => false, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]],
                                                "Anguila Tarde" =>          [$hor_label => [["17:30", "18:00"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => false, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]],
                                                "Anguila Noche" =>          [$hor_label => [["20:30", "21:00"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => false, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]],   
                                            ],
                     "King Lottery"  =>      [
                                                "King Lottery 12:30" =>     [$hor_label => [["12:00", "12:30"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]],
                                                "King Lottery 7:30" =>      [$hor_label => [["19:00", "19:30"]], $rd_t_label => true, $dia_s_label => [7], $dia_a_label => [], $rd_m_label => true, $costo_label => [], $cant_b_label => 3, $cant_bp_label => [1, 1, 1], $rango_b_label => [[00, 99], [00, 99], [00, 99]], $jug_label => [$q_label, $p_label, $t_label]],
                                            ]
];


// var_dump(array_keys($todo_combinado["King Lottery"]));

// Funcion principal para los premios
function premios_jugadas_main(string $lot, string $sorteo, array $ternum, int $monto_jugado = 0, string $fecha_del_ticket = null, string $fecha_especifica = null){
    /*  
        @param $lot, $sorteo            debe ser tal cual como viene en el webscraping. Corresponde al nombre de la loteria y al nombre de la jugada.
        @param $ternum                  un array con los numeros jugados por el cliente, ya sea un array de int o de strings
        @param $fecha_del_ticket        tal cual como viene del webscraping. formato Y-m-d H:i:s       
                                        Es necesario para los que estan jugando La Primera La Primera Dia

        @param $fecha_especifica        string formato dd-mm-yyyy 
        @retorno                        
                                        Un array de 1, 2 o 5 
                                        Los array de 1:
                                        0 un error

                                        Los array de 2:
                                        0 el premio (str o int o false(si perdio))
                                        1 array con los numeros ganadores

                                        Los array de 5:
                                        0 str con el nombre de la jugada
                                        1 true is gano, false si perdio
                                        2 moneda
                                        3 el monto a ganar
                                        4 array con los numeros ganadores

    */

    $todo = return_lot_numbers_live(fecha_especifica: $fecha_especifica);
    $func = clean_str($lot) . "_" . clean_str($sorteo);
    
    foreach($todo as $t){
        $loteria = $t[0][0];
        $sor = $t[1][0];
        $lotnum = $t[3];

        if ($loteria == "Loteria Nacional" && $sor == "Gana Más"){
            $lngm = $t;
        }
        if ($loteria == "Loteria Nacional" && $sor == "Lotería Nacional"){
            $lnln = $t;
        }

        if ($loteria == $lot && $sor == $sorteo){
            $ternum = convertir_int_array_to_str_array($ternum);
            if ("la_primera_la_primera_dia" == $func){
                return la_primera_la_primera_dia($ternum, $lotnum, $monto_jugado, $fecha_del_ticket, $lngm, $lnln);
            } else {
                return $func($ternum, $lotnum, $monto_jugado);
            }
        }
    }
    return ["Error con loteria: '" . $lot . "' y sorteo: '". $sorteo . "'"];
}

// No se deberia usar las funciones debajo

function num_ganadores(array $ternum, array $lotnum){
    /* 
        Usarse en loterias que si o no repiten numeros.
    */
    $temp = $lotnum;
    $ganadores = [];
    foreach($ternum as $t){
        if (in_array($t, $temp)){
            $temp = array_remove_once($temp, $t);
            array_push($ganadores, $t);
        }
    }
    return [$ganadores, $temp];
}


function las_3_jugadas(array $ternum, array $lotnum,   
                        int $q1 = 60, int $q2 = 8, int $q3 = 4,                                                      
                        int $p1 = 1000, int $p2 = 1000, int $p3 = 100,                                                         
                        int $t1 = 20000, int $t2 = 100, 
                        int $monto_jugado = 0, string $moneda = "RD"){
    /* 
    - Quiniela (pata): seleccionar un números
    - Palé: seleccionar dos números
    - Tripleta: seleccionar tres números

    @param $ternum                      un arreglo con los valores de los numeros jugados por el tercero.
    @param $lotnum                      los numeros de la loteria tal cual como retorna el webscraper
    @param $q1 (opcional)               valor del primer premio de quiniela
    @param $q2 (opcional)               valor del segundo premio de quiniela
    @param $q3 (opcional)               valor del tercer premio de quiniela
    @param $p1 (opcional)               valor de primera y segunda de pale
    @param $p2 (opcional)               valor de primera y tercera de pale
    @param $p3 (opcional)               valor de segunda y tercera de pale
    @param $t1 (opcional)               valor de pegar 3 en tripleta
    @param $t2 (opcional)               valor de pegar 2 en tripleta
    @param $monto_jugado (opcional)     monto jugado por el tercero
    @param $moneda (opcional)           denominacion de la moneda a usar, RD por defecto

    @return                             
                                        Retorna 2 tipos de array:

                                        Un array con 1 elementos:
                                        0 un msg con el error
                                        
                                        El array a retornar contiene 5 elementos:
                                        0 str con el nombre de la jugada
                                        1 true is gano, false si perdio
                                        2 moneda
                                        3 el monto a ganar
                                        4 array con los numeros ganadores
    */

    $s = sizeof($ternum);

    if (!in_array($s, [1, 2, 3])){
        return ["no cumple requisitos"];
    }

    $q_label = "quiniela";
    $p_label = "pale";
    $t_label = "tripleta";
    
    if ($s == 1){         
        $v = [$q_label, true, $moneda, 0, $ternum];                         // Quiniela
        if ($ternum[0] == $lotnum[0]){                                      // Primera
            $v[3] = $q1*$monto_jugado;
        } elseif ($ternum[0] == $lotnum[1]){                                // Segunda
            $v[3] = $q2*$monto_jugado;
        } elseif ($ternum[0] == $lotnum[2]){                                // Tercera
            $v[3] = $q3*$monto_jugado;
        } else {
            $v[1] = false;
            $v[4] = []; 
        }
    } elseif ($s == 2){                                                     // Pale
        $v = [$p_label, true, $moneda, 0, $ternum]; 
        if ($ternum[0] == $lotnum[0] && $ternum[1] == $lotnum[1]){          // Primera y Segunda
            $v[3] = $p1*$monto_jugado;
        } elseif ($ternum[0] == $lotnum[1] && $ternum[1] == $lotnum[0]){
            $v[3] = $p1*$monto_jugado;
        } elseif ($ternum[0] == $lotnum[0] && $ternum[1] == $lotnum[2]){    // Primera y Tercera
            $v[3] = $p2*$monto_jugado;
        } elseif ($ternum[0] == $lotnum[2] && $ternum[1] == $lotnum[0]){
            $v[3] = $p2*$monto_jugado;
        } elseif ($ternum[0] == $lotnum[1] && $ternum[1] == $lotnum[2]){    // Segunda y Tercera
            $v[3] = $p3*$monto_jugado;
        } elseif ($ternum[0] == $lotnum[2] && $ternum[1] == $lotnum[1]){
            $v[3] = $p3*$monto_jugado;
        } else {
            $v[1] = false;
            $v[4] = []; 
        }
    } else {                                                                // Tripleta
        $n = num_ganadores($ternum, $lotnum)[0];
        $v = [$t_label, true, $moneda, 0, $n];                              // 3 aciertos
        if (sizeof($n) == 3){
            $v[3] = $t1*$monto_jugado;
        } elseif (sizeof($n) == 2){                                         // 2 aciertos
            $v[3] = $t2*$monto_jugado;
        } else {
            $v[1] = false;
            $v[4] = []; 
        }
    } 
    return $v;
}

function mega_millions_y_powerball(array $ternum, array $lotnum, int $sorteo){
    /* 
        @param $sorteo          0 para mega millions, 1 para powerball
    */
    $megaplier = 1;     //El multiplicador
    if (sizeof($lotnum) == 7){
        $megaplier = $lotnum[6];
        if ($megaplier == "2x"){
            $megaplier = 2;
        } elseif ($megaplier == "3x"){
            $megaplier = 3;
        } elseif ($megaplier == "4x"){
            $megaplier = 4;
        } elseif ($megaplier == "5x"){
            $megaplier = 5;
        } elseif ($megaplier == "10x" && $sorteo == 1){
            $megaplier = 10;
        } else {
            $megaplier = 1;
        }
    }

    $mb = false;        // MegaBall
    if ($ternum[5] == $lotnum[5]){
        $mb = true;
    }

    $n = num_ganadores(array_slice($ternum, 0, 5), array_slice($lotnum, 0, 5))[0]; // Los primeros 5 numeros. Que no incluye mb ni megaplier
    $s = sizeof($n);

    if ($s == 5 && $mb){
       $v = "premio mayor";
    } elseif ($s == 5){
        if ($sorteo == 0){
            $v = 1000000 * $megaplier;
        } elseif ($sorteo == 1){
            if ($megaplier == 1){
                $v = 1000000;
            } else {
                $v = 2000000;
            }
        }
    } elseif ($s == 4 && $mb){
        if ($sorteo == 0){
            $v = 10000 * $megaplier;
        } elseif ($sorteo == 1){
            $v = 50000 * $megaplier;
        }
    } elseif ($s == 4){
        if ($sorteo == 0){
            $v = 500 * $megaplier;
        } elseif ($sorteo == 1){
            $v = 100 * $megaplier;
        }
    } elseif ($s == 3 && $mb){
        if ($sorteo == 0){
            $v = 200 * $megaplier;
        } elseif ($sorteo == 1){
            $v = 100 * $megaplier;
        }
    } elseif ($s == 3){
        if ($sorteo == 0){
            $v = 10 * $megaplier;
        } elseif ($sorteo == 1){
            $v = 7 * $megaplier;
        }
    } elseif ($s == 2 && $mb){
        if ($sorteo == 0){
            $v = 10 * $megaplier;
        } elseif ($sorteo == 1){
            $v = 7 * $megaplier;
        }
    } elseif ($s == 1 && $mb){
        $v = 4 * $megaplier;
    } elseif ($s == 0 && $mb){
        if ($sorteo == 0){
            $v = 2 * $megaplier;
        } elseif ($sorteo == 1){
            $v = 4 * $megaplier;
        } 
    } else {
        $v = false;
    }
    if ($mb){
        array_push($n, $ternum[5]);
    }
    return [$v, $n];
}

function ajustes_anguila(array $ternum, array $lotnum, int $monto_jugado){
    $q1 = 20; $q2 = 2; $q3 = 1;                                                      
    $p1 = 1000; $p2 = 1000; $p3 = 100;                                                         
    $t1 = 20000; $t2 = 100; 
    $moneda = "US";

    $r = las_3_jugadas($ternum, $lotnum, $q1, $q2, $q3, $p1, $p2, $p3, $t1, $t2, 1, $moneda);
    if (sizeof($r) == 5 && $r[1] == true){
        $m = $monto_jugado/0.30;
        $m = (int)$m;

        if ($r[0] == "tripleta"){
            $s = sizeof($r[4]);
            if ($s == 3){
                $r[3] = 10000;
            } else {
                $pos1 = array_search($r[4][0], $lotnum);    // Retorna la posicion del num
                $pos2 = array_search($r[4][1], $lotnum);
                if ($pos1 > $pos2){
                    $temp = $pos1;
                    $pos1 = $pos2;
                    $pos2 = $temp;
                }
                if ($pos1 == 0 && $pos2 == 1){              // Primera y Segunda
                    $r[3] = 1000;
                } else {                                    // Primera y Tercera // Segunda y Tercera      Mismo premio en la anguila
                    $r[3] = 100;
                }
            }
        }
        $r[3] *= $m;
    }
    return $r;
}

// funciones espeficias de las loterias

function loteria_nacional_juega___pega__(array $ternum, array $lotnum, int $monto_jugado){
    /* 
    // se pueden repetir los numeros por cada tombola
    //
    // return           un array con 2 valores: el premio (str o int o false(si perdio)) y un array con los numeros ganadores
    */

    $l = $lotnum;
    $t = $ternum;
    $tombola1 = [$l[0], $l[1]];
    $tombola2 = [$l[2], $l[3]];
    $tombola3 = [$l[4]];

    $b0 = in_array($t[0], $tombola1);
    $b1 = in_array($t[1], $tombola1);
    $b2 = in_array($t[2], $tombola2);
    $b3 = in_array($t[3], $tombola2);
    $b4 = in_array($t[4], $tombola3);

    if ($b0 && $b1 && $b2 && $b3 && $b4){
        return ["premio mayor", $t];
    }
    if ($b0 && $b1 && $b2 && $b3){
        return [300000, array_slice($t, 0, 4)];
    }
    if (($b0 && $b1) && ($b2 || $b3)){
        if ($b2){
            return [3000, array_slice($t, 0, 3)];
        } else {
            return [3000, array($t[0], $t[1], $t[3])];
        }
    }
    if (($b0 || $b1) && ($b2 && $b3)){
        if ($b0){
            return [3000, array($t[0], $t[2], $t[3])];
        } else {
            return [3000, array_slice($t, 1, 3)];
        }
    }
    if ($b0 && $b1){
        return [100, [$t[0], $t[1]]];
    }
    if ($b2 && $b3){
        return [100, [$t[2], $t[3]]];
    }
    if (($b0 || $b1) && ($b2 || $b3)){
        $v = [];
        if($b0){array_push($v, $t[0]);}
        if($b1){array_push($v, $t[1]);}
        if($b2){array_push($v, $t[2]);}
        if($b3){array_push($v, $t[3]);}

        return [100, $v];
    }
    if ($b0 || $b1){
        $v = [];
        if($b0){array_push($v, $t[0]);}
        if($b1){array_push($v, $t[1]);}
        return ["ticket gratis", $v];
    }
    if ($b2 || $b3){
        $v = [];
        if($b2){array_push($v, $t[2]);}
        if($b3){array_push($v, $t[3]);}
        return ["ticket gratis", $v];
    }
    return [false, []];
}

function loteria_nacional_gana_mas(array $ternum, array $lotnum, int $monto_jugado){
    return las_3_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado);
}

function loteria_nacional_loteria_nacional(array $ternum, array $lotnum, int $monto_jugado){
    return las_3_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado);
}

function leidsa_pega_3_mas(array $ternum, array $lotnum, int $monto_jugado = 0){
    $n = num_ganadores($ternum, $lotnum)[0];
    $s = sizeof($n);
    $m = (string)$monto_jugado;
    $m = (int)substr_replace($m,"0",-1);
    $m = (int)$m/10;

    if ($s == 3){
        $v = 30000*$m;
    } elseif ($s == 2){
        $v = 600*$m;
    } elseif ($s == 1){
        $v = 10*$m;
    } else {
        $v = false;
    }
    return [$v, $n];
}

function leidsa_quiniela_leidsa(array $ternum, array $lotnum, int $monto_jugado){
    return las_3_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado);
}

function leidsa_loto_pool(array $ternum, array $lotnum, int $monto_jugado){
    $n = num_ganadores($ternum, $lotnum)[0];
    $s = sizeof($n);

    if ($s == 5){
        $v = 5000000;
    } elseif ($s == 4){
        $v = 5000;
    } elseif ($s == 3){
        $v = 50;
    } else {
        $v = false;
    }
    return [$v, $n];
}

function leidsa_super_kino_tv(array $ternum, array $lotnum, int $monto_jugado){
    $n = num_ganadores($ternum, $lotnum)[0];
    $s = sizeof($n);

    if ($s == 10){
        $v = 25000000;
    } elseif ($s == 9){
        $v = 150000;
    } elseif ($s == 8){
        $v = 10000;
    } elseif ($s == 7){
        $v = 1000;
    }elseif ($s == 6){
        $v = 300;
    }elseif ($s == 5){
        $v = 60;
    }elseif ($s == 0){
        $v = 80;
    } else {
        $v = false;
    }
    return [$v, $n];
}

function leidsa_loto_super_loto_mas(array $ternum, array $lotnum, int $monto_jugado){
    $ts = sizeof($ternum);
    $tn = array_slice($ternum, 0, 6);
    $n = num_ganadores($tn, $lotnum)[0];
    $s = sizeof($n);

    if ($s == 6){                                                                       // loto 
        $v = "acumulado del loto, minimo 15000000";
        if ($ts >= 7 && $ternum[6] == $lotnum[6]){                                      // loto mas
            $v = "acumulado del loto + acumulado del más, minimo 50000000";
            array_push($n, $ternum[6]);
            if ($ts == 8 && $ternum[7] == $lotnum[7]){                                  // super loto mas
                $v = "acumulado del loto + acumulado del más, minimo 200000000";
                array_push($n, $ternum[7]);
            }
        } 
    } elseif ($s == 5){
        $v = 18448;
    } elseif ($s == 4){
        $v = 1000;
    } elseif ($s == 3){
        $v = 50;
    } else {
        $v = false;
    }

    return [$v, $n];
}

function loteria_real_loto_pool(array $ternum, array $lotnum, int $monto_jugado){
    $n = num_ganadores($ternum, $lotnum)[0];
    $s = sizeof($n);

    if ($s == 4){
        $v = "5000000 pero puede dividirse entre los ganadores";
    } elseif ($s == 3){
        $v = 20000;
    } elseif ($s == 2){
        $v = 100;
    } elseif ($s == 1){
        $v = 10;
    } else {
        $v = false;
    }
    return [$v, $n];
}

function loteria_real_quiniela_real(array $ternum, array $lotnum, int $monto_jugado){
    return las_3_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado);
}

function loteria_real_loto_real(array $ternum, array $lotnum, int $monto_jugado){
    $n = num_ganadores($ternum, $lotnum)[0];
    $s = sizeof($n);

    if ($s == 6){
        $v = "mínimo 10000000 + acumulado";
    } elseif ($s == 5){
        $v = "acumulado acorde a los números pegados";
    } elseif ($s == 4){
        $v = "acumulado acorde a los números pegados";
    } elseif ($s == 3){
        $v = "acumulado acorde a los números pegados";
    } else {
        $v = false;
    }
    return [$v, $n];
}

function loteka_quiniela_loteka(array $ternum, array $lotnum, int $monto_jugado){
    return las_3_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado);
}

function loteka_mega_chances(array $ternum, array $lotnum, int $monto_jugado){
    $n = num_ganadores($ternum, $lotnum)[0];
    $s = sizeof($n);

    if ($s == 5){
        $v = "50000000 + Jeepeta Taho del año";
    } elseif ($s == 4){
        $v = 500000;
    } elseif ($s == 3){
        $v = 5000;
    } elseif ($s == 2){
        $v = 100;
    } else {
        $v = false;
    }
    return [$v, $n];
}

function loteka_megalotto(array $ternum, array $lotnum, int $monto_jugado){
    $n = num_ganadores($ternum, $lotnum)[0];
    $s = sizeof($n);

    if ($s == 6){
        $v = "30000000 + acumulado";
    } elseif ($s == 5){
        $v = 18000;
    } elseif ($s == 4){
        $v = 1000;
    } elseif ($s == 3){
        $v = 50;
    } else {
        $v = false;
    }
    return [$v, $n];
}

function americanas_new_york_tarde(array $ternum, array $lotnum, int $monto_jugado){
    return las_3_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado);
}

function americanas_new_york_noche(array $ternum, array $lotnum, int $monto_jugado){
    return las_3_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado);
}

function americanas_florida_dia(array $ternum, array $lotnum, int $monto_jugado){
    return las_3_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado);
}

function americanas_florida_noche(array $ternum, array $lotnum, int $monto_jugado){
    return las_3_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado);
}

function americanas_mega_millions(array $ternum, array $lotnum, int $monto_jugado){
    return mega_millions_y_powerball($ternum, $lotnum, 0);
}

function americanas_powerball(array $ternum, array $lotnum, int $monto_jugado){
    return mega_millions_y_powerball($ternum, $lotnum, 1);
}

function americanas_cash_4_life(array $ternum, array $lotnum, int $monto_jugado){
    $cb = false;                                    // Cash Ball
    if ($ternum[5] == $lotnum[5]){
        $cb = true;
    }

    $n = num_ganadores(array_slice($ternum, 0, 5), $lotnum)[0];
    $s = sizeof($n);

    if ($s == 5 && $cb){
        $v = "1000 dolares cada dia, de por vida o 7000000 millones de dolares";
    } elseif ($s == 5){
        $v = "1000 dolares cada semana, de por vida o 1000000 millones de dolares";
    } elseif ($s == 4 && $cb){
        $v = 2500;
    } elseif ($s == 4){
        $v = 500;
    } elseif ($s == 3 && $cb){
        $v = 100;
    } elseif ($s == 3){
        $v = 25;
    } elseif ($s == 2 && $cb){
        $v = 10;
    } elseif ($s == 2){
        $v = 4;
    } elseif ($s == 1 && $cb){
        $v = 2;
    } else {
        $v = false;
    }
    if ($cb){
        array_push($n, $ternum[5]);
    }
    return [$v, $n];
}

function la_primera_la_primera_dia(array $ternum, array $lotnum, int $monto_jugado, string $fecha_del_ticket, array $webscrap_nacional_pega_mas, array $webscrap_nacional_noche){
    /* 
        Esta funcion puede traer problemas por el tema de las fechas

        @param $fecha_del_ticket            formato Y-m-d H:i:s
    */
    $r = las_3_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado);

    if (!$fecha_del_ticket){
        return ["para la primera día debes introducir la fecha del ticket"];
    }

    if (is_array($r) && $r[0] == "quiniela"){
        $terfec = date('d-m-Y', strtotime($fecha_del_ticket));

        $npmfec = $webscrap_nacional_pega_mas[2][0];
        $npmnum = $webscrap_nacional_pega_mas[3];

        $nnfec = $webscrap_nacional_noche[2][0];
        $nnnum = $webscrap_nacional_noche[3];
        
        $ret = [true, 3000000 * $monto_jugado];
        if ($terfec == $nnfec && $ternum[0] == $nnnum[0]){
            return $ret;
        } elseif ($terfec == $npmfec && $ternum[0] == $npmnum[0]){
            return $ret;
        }
    }

    return $r;
}

function la_primera_primera_noche(array $ternum, array $lotnum, int $monto_jugado){
    return las_3_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado);
}

function la_suerte_la_suerte_12_30(array $ternum, array $lotnum, int $monto_jugado){
    return las_3_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado);
}

function la_suerte_la_suerte_18_00(array $ternum, array $lotnum, int $monto_jugado){
    return las_3_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado);
}

function lotedom_quiniela_lotedom(array $ternum, array $lotnum, int $monto_jugado){
    return las_3_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado);
}

function lotedom_el_quemaito_mayor(array $ternum, array $lotnum, int $monto_jugado){
    if (sizeof($ternum) == 1){
        $n = (int)$ternum[0];
        $ln = (int)$lotnum[0];
        $v = false;
        $r = [$n];
        if ($n == $ln){
            $v = 70 * $monto_jugado;
        } elseif ($n-1 == $ln || $n+1 == $ln){
            $v = 5 * $monto_jugado;
        } else {
            $r = [0];
        }
        return [$v, $r];
    } else {
        return ["solo se permite 1 número en el quemaito mayor."];
    }
}

function anguila_anguila_manana(array $ternum, array $lotnum, int $monto_jugado){
    return ajustes_anguila($ternum, $lotnum, $monto_jugado);
}

function anguila_anguila_medio_dia(array $ternum, array $lotnum, int $monto_jugado){
    return ajustes_anguila($ternum, $lotnum, $monto_jugado);
}

function anguila_anguila_tarde(array $ternum, array $lotnum, int $monto_jugado){
    return ajustes_anguila($ternum, $lotnum, $monto_jugado);
}

function anguila_anguila_noche(array $ternum, array $lotnum, int $monto_jugado){
    return ajustes_anguila($ternum, $lotnum, $monto_jugado);
}

function king_lottery_king_lottery_12_30(array $ternum, array $lotnum, int $monto_jugado){
    return las_3_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado);
}

function king_lottery_king_lottery_7_30(array $ternum, array $lotnum, int $monto_jugado){
    return las_3_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado);
}

?>