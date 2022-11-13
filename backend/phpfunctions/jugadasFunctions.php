<?php

// Paginas de referencias
// https://www.conectate.com.do/loterias
// https://loteriasdominicanas.com/
// Y entre otras

$path = dirname(__FILE__);
include_once($path . "/webscraping.php");
$path = dirname(__FILE__);
include_once($path . "/generals.php");

function premios_jugadas_main(string $lot, string $jug, array $ternum, $monto_jugado = 0, $orden_importa = true){
    /*  
        @param $lot, $jug               debe ser tal cual como viene en el webscraping. Corresponde al nombre de la loteria y al nombre de la jugada.
        @param $ternum                  Es un arreglo, son los numeros jugados por el tercero, ej "1 2 3" orden importa
                                        Ejemplo, Si solo jugaron 1 numero de 5
                                            el str debe ser array(null, null, 80, null, null)

        @retorno                        
                                        Un array de 1, 2 o 4 
                                        Los array de 1:
                                        0 un error

                                        Los array de 2:
                                        0 el premio (str o int o false(si perdio))
                                        1 un array con los numeros ganadores

                                        Los array de 4:
                                        0 str con el nombre de la jugada
                                        1 true is gano, false si perdio
                                        2 moneda
                                        3 el monto a ganar

    */
    function limpiar_str($s){
        $ch_special = array("+", ":", "-", " ");
        $s = strtolower($s);
        $s = str_replace($ch_special, "_", $s);
        $s = str_replace("á", "a", $s);
        $s = str_replace("é", "e", $s);
        $s = str_replace("í", "i", $s);
        $s = str_replace("ó", "o", $s);
        $s = str_replace("ú", "u", $s);
        $s = str_replace("ñ", "n", $s);
        return $s;
    }

    $todo = retornar_lot_numeros_live();
    $func = limpiar_str($lot) . "_" . limpiar_str($jug);
    print_r($func);

    foreach($todo as $t){
        $loteria = $t[0][0];
        $jugada = $t[1][0];

        if ($loteria == $lot && $jugada == $jug){
            $lotnum = $t[3];
            $ternum = convertir_int_array_a_str_array($ternum);
            $ret = $func($ternum, $lotnum, $monto_jugado, $orden_importa);
            


            echo "<br>";
            var_dump($ret);
        }
    }
}

// premios_jugadas_main("Loteria Nacional", "Gana Más", array(77, 35, 33), 1, false);

function num_ganadores(array $ternum, array $lotnum){
    /* 
        Usarse en loterias que si o no repiten numeros. Pero el orden no importa
    */
    $temp = $lotnum;
    $ganadores = [];
    foreach($ternum as $t){
        if (in_array($t, $temp)){
            $temp = array_remove_once($temp, $t);
            array_push($ganadores, $t);
        }
    }
    return $ganadores;
}

function las_5_jugadas(array $ternum, array $lotnum = [],   
                        int $q1 = 60, int $q2 = 8, int $q3 = 4,                                                      
                        int $p1 = 1000, int $p2 = 1000, int $p3 = 100,                                                         
                        int $t1 = 20000, int $t2 = 100, 
                        int $monto_jugado = 0, string $moneda = "RD", bool $orden_importa = true){
    /* 
    - Quiniela: Apostando una cantidad de dinero a el o los números deseado.                                                                (2 null, 1 valor) con orden
    - Palé: seleccionar dos números que formen un palé y que para acertar deben coincidir con los números ganadores sin importar el orden.  (1 null, 2 valor) con orden
    - Tripleta: son tres números que para ganar deben coincidir con dos o tres de los números ganadores en el sorteo.                       (0 null, 3 valor) o (1 null, 2 valor) sin orden
    - Pata de pale es un derivado de pale
    - Pata tripleta es un derivado de tripleta

    @param $ternum                      es obligatorio, un arreglo con los valores de los numeros jugados por el tercero. Si solo se juega 1 de 3 numeros, los demas espacios se llenan con null
    @param $lotnum (opcional)           los numeros de la loteria tal cual como retorna el webscraper
    @param $q1 (opcional)               valor del primer premio de quiniela
    @param $q2 (opcional)               valor del segundo premio de quiniela
    @param $q3 (opcional)               valor del tercer premio de quiniela
    @param $p1 (opcional)               valor de primera y segunda de pale
    @param $p2 (opcional)               valor de primera y tercera de pale
    @param $p3 (opcional)               valor de segunda y tercera de pale, tambien conocida como pata de pale
    @param $t1 (opcional)               valor de pegar 3 en tripleta
    @param $t2 (opcional)               valor de pegar 2 en tripleta, tambien conocido como pata de tripleta
    @param $monto_jugado (opcional)     monto jugado por el tercero
    @param $moneda (opcional)           denominacion de la moneda a usar, RD por defecto
    @param $orden_importa (opcional)    el orden determina si es tripleta u otro

    @return                             Si solo se introduce $ternum, se retorna un str con el nombre de la jugada. Pero si tambien se introduce $lotnum, retorna un array
                                        
                                        Aparte del str, retorna 2 tipos de array:

                                        Un array con 1 elementos:
                                        0 un msg con el error
                                        
                                        El array a retornar contiene 4 elementos:
                                        0 str con el nombre de la jugada
                                        1 true is gano, false si perdio
                                        2 moneda
                                        3 el monto a ganar
    */

    $s = sizeof(array_remove_null($ternum));

    if (($orden_importa && $s == 3) || (!$orden_importa && $s == 1) || sizeof($ternum) != 3){
        return ["no cumple requisitos"];
    }

    $p_label = "palé";
    $q_label = "quiniela";

    if($orden_importa){
        if ($lotnum){
            $v = [$p_label, true, $moneda];
            if ($s == 2){                                                           // Pale
                if ($ternum[0] == $lotnum[0] && $ternum[1] == $lotnum[1]){          // Primera y Segunda
                    array_push($v, $p1*$monto_jugado);
                } elseif ($ternum[0] == $lotnum[0] && $ternum[2] == $lotnum[2]){    // Primera y Tercera
                    array_push($v, $p2*$monto_jugado);;
                } elseif ($ternum[1] == $lotnum[1] && $ternum[2] == $lotnum[2]){    // Segunda y Tercera
                    $v[0] = "pata de palé";
                    array_push($v, $p3*$monto_jugado);
                } else {
                    $v[1] = false;
                    array_push($v, 0);
                }
                return $v;
            } else {        
                $v[0] = $q_label;                                                   // Quiniela
                if ($ternum[0] == $lotnum[0]){                                      // Primera
                    array_push($v, $q1*$monto_jugado);
                } elseif ($ternum[1] == $lotnum[1]){                                // Segunda
                    array_push($v, $q2*$monto_jugado);
                } elseif ($ternum[2] == $lotnum[2]){                                // Tercera
                    array_push($v, $q3*$monto_jugado);
                } else {
                    $v[1] = false;
                    array_push($v, 0);
                }
                return $v;
            }
        } elseif ($s == 2){
            return $p_label;
        } else {
            return $q_label;
        }
    } else {
        $jug = "tripleta";
        if ($lotnum){
            $count = sizeof(num_ganadores($ternum, $lotnum));
            if ($count == 2){
                $jug = "pata de tripleta";
            }
            $v = [$jug, true, $moneda];
            if ($count == 3){                                                       // Tripleta
                array_push($v, $t1*$monto_jugado);
            } elseif ($count == 2) {                                                // Pata tripleta
                array_push($v, $t2*$monto_jugado);
            } else {
                $v[1] = false;
                array_push($v, 0);
            }
            return $v;
        } else {
            return $jug;
        }
    }
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

    $n = num_ganadores(array_slice($ternum, 0, 5), array_slice($lotnum, 0, 5)); // Los primeros 5 numeros. Que no incluye mb ni megaplier
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

function ajustes_anguila(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    $q1 = 20; $q2 = 2; $q3 = 1;                                                      
    $p1 = 1000; $p2 = 1000; $p3 = 100;                                                         
    $t1 = 20000; $t2 = 100; 
    $moneda = "US";

    $r = las_5_jugadas($ternum, $lotnum, $q1, $q2, $q3, $p1, $p2, $p3, $t1, $t2, 1, $moneda, $orden_importa);
    if (is_array($r) && sizeof($r) == 4 && $r[1] == true){
        $m = $monto_jugado/0.30;
        $m = (int)$m;

        if ($r[0] == "tripleta" || $r[0] == "pata de tripleta"){
            $n = num_ganadores($ternum, $lotnum);
            $s = sizeof($n);
            if ($s == 3){
                $r[3] = 10000;
            } else {
                $pos1 = array_search($n[0], $lotnum);   //Retorna la posicion del num
                $pos2 = array_search($n[1], $lotnum);
                if ($pos1 > $pos2){
                    $temp = $pos1;
                    $pos1 = $pos2;
                    $pos2 = $temp;
                }
                if ($pos1 == 0 && $pos2 == 1){        // Primera y Segunda
                    $r[3] = 1000;
                } else {
                    $r[3] = 100;
                }
            }
        }
        $r[3] *= $m;
    }
    return $r;
}

// funciones espeficias de las loterias

function loteria_nacional_juega___pega__(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    /* 
    // se pueden repetir los numeros por cada tombola
    // premios referenciados de https://www.loteriasdominicanas.com.do/loteria-nacional/juega-mas-pega-mas
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

function loteria_nacional_gana_mas(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return las_5_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado, orden_importa: $orden_importa);
}

function loteria_nacional_loteria_nacional(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    if (sizeof(array_remove_null($ternum)) == 1 && sizeof($ternum) == 3){
        return las_5_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado, orden_importa: true);
    } else {
        return ["solo se permiten quinielas en la lotería nacional de la noche. 1 num 2 null"];
    }
}

function leidsa_pega_3_mas(array $ternum, array $lotnum, int $monto_jugado = 0, bool $orden_importa){
    $n = num_ganadores($ternum, $lotnum);
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

function leidsa_quiniela_leidsa(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return las_5_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado, orden_importa: $orden_importa);
}

function leidsa_loto_pool(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    $n = num_ganadores($ternum, $lotnum);
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

function leidsa_super_kino_tv(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    $n = num_ganadores($ternum, $lotnum);
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

function leidsa_loto_super_loto_mas(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    $ts = sizeof($ternum);
    $tn = array_slice($ternum, 0, 6);
    $n = num_ganadores($tn, $lotnum);
    $s = sizeof($n);

    if ($s == 6){                                                                       // loto 
        $v = "acumulado del loto, minimo 15000000";
        if ($ts >= 7 && $ternum[6] == $lotnum[6]){                                      //loto mas
            $v = "acumulado del loto + acumulado del más, minimo 50000000";
            array_push($n, $ternum[6]);
            if ($ts == 8 && $ternum[7] == $lotnum[7]){                                  //super loto mas
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

function loteria_real_loto_pool(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    $n = num_ganadores($ternum, $lotnum);
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

function loteria_real_quiniela_real(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return las_5_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado, orden_importa: $orden_importa);
}

function loteria_real_loto_real(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    $n = num_ganadores($ternum, $lotnum);
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

function loteka_quiniela_loteka(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return las_5_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado, orden_importa: $orden_importa);
}

function loteka_mega_chances(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    $n = num_ganadores($ternum, $lotnum);
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

function americanas_new_york_tarde(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return las_5_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado, orden_importa: $orden_importa);
}

function americanas_new_york_noche(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return las_5_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado, orden_importa: $orden_importa);
}

function americanas_florida_dia(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return las_5_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado, orden_importa: $orden_importa);
}

function americanas_florida_noche(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return las_5_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado, orden_importa: $orden_importa);
}

function americanas_mega_millions(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return mega_millions_y_powerball($ternum, $lotnum, 0);
}

function americanas_powerball(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return mega_millions_y_powerball($ternum, $lotnum, 1);
}

function americanas_cash_4_life(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    $cb = false;                                    // Cash Ball
    if ($ternum[5] == $lotnum[5]){
        $cb = true;
    }

    $n = num_ganadores(array_slice($ternum, 0, 5), $lotnum);
    $s = sizeof($n);

    if ($s == 5 && $cb){
        $v = "1000 dolares cada dia, de por vida o 7000000";
    } elseif ($s == 5){
        $v = "1000 dolares cada semana, de por vida o 1000000";
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

function la_primera_la_primera_dia(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa, string $fecha_del_ticket, array $webscrap_nacional_pega_mas, array $webscrap_nacional_noche){
    /* 
        Esta funcion puede traer problemas por el tema de las fechas

        @param $fecha_del_ticket            formato Y-m-d H:i:s
    */
    $r = las_5_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado, orden_importa: $orden_importa);

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

function la_primera_la_primera_noche(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return las_5_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado, orden_importa: $orden_importa);
}

function la_suerte_la_suerte_12_30(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return las_5_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado, orden_importa: $orden_importa);
}

function la_suerte_la_suerte_18_00(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return las_5_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado, orden_importa: $orden_importa);
}

function lotedom_quiniela_lotedom(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return las_5_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado, orden_importa: $orden_importa);
}

function lotedom_el_quemaito_mayor(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    if (sizeof(array_remove_null($ternum)) == 1 && sizeof($ternum) == 3){
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
        return ["solo se permite 1 número en el quemaito mayor. [num, null, null]"];
    }
}

function anguila_anguila_manana(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return ajustes_anguila($ternum, $lotnum, $monto_jugado, $orden_importa);
}

function anguila_anguila_medio_dia(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return ajustes_anguila($ternum, $lotnum, $monto_jugado, $orden_importa);
}

function anguila_anguila_tarde(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return ajustes_anguila($ternum, $lotnum, $monto_jugado, $orden_importa);
}

function anguila_anguila_noche(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    return ajustes_anguila($ternum, $lotnum, $monto_jugado, $orden_importa);
}

function king_lottery_king_lottery_12_30(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    if (sizeof(array_remove_null($ternum)) == 1 && sizeof($ternum) == 3){
        return las_5_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado, orden_importa: true);
    } else {
        return ["solo se permiten quinielas en king lottery 12:30. 1 num 2 null"];
    }
}

function king_lottery_king_lottery_7_30(array $ternum, array $lotnum, int $monto_jugado, bool $orden_importa){
    if (sizeof(array_remove_null($ternum)) == 1 && sizeof($ternum) == 3){
        return las_5_jugadas($ternum, $lotnum, monto_jugado: $monto_jugado, orden_importa: true);
    } else {
        return ["solo se permiten quinielas en king lottery 7:30. 1 num 2 null"];
    }
}

?>