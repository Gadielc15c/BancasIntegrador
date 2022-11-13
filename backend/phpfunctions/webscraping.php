<?php

// Agregar segmento para fechas en especifico

function retornar_lot_numeros_live($modo_debug = false){
    /* 
        Retorna un arreglo con la loteria, jugada, fecha, y numeros, de lo contrario retornara false
    */
    $url = "https://loteriasdominicanas.com/";
    header("Content-Type: text/plain");
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    $a = [];
    if (curl_error($ch)) {
        if ($modo_debug){
            echo curl_error($ch);
        }
    } else {
        function imprimir($msg, $arreglo){
            // Funcion para modo_debug  
            echo "\n";
            print_r($msg);
            echo "\n";
            print_r($arreglo);
            
            
        }

        $response = trim(preg_replace('/\s\s+/', ' ', $response));
        $pattern = "/start game .+? end game /i";
        
        if(preg_match_all($pattern, $response, $matches)) {
            $matches = $matches[0];
            
            $lot = "None";
            foreach ($matches as $m){
                $loteria_pattern = "/([A-Za-z0-9 ]{2,})<\/a>/";
                $jugada_pattern = "/<span>([A-Za-z0-9 +:\-áéíóúñ]+)<\/span>/";
                $fecha_pattern = "/> ([0-9- A-Za-z]+) <\/d/";
                $numeros_pattern = "/>([0-9x]+)</";
                $img_pattern = "/src=\"(.*?)\"/";
                $check_pattern = "/fa fa-check text-success/";
                $check = false;

                if(preg_match_all($check_pattern, $m, $x0)) {
                    $check = true;
                } elseif ($modo_debug){
                    imprimir("No se encontro check_pattern", $m);
                }
                if(preg_match_all($numeros_pattern, $m, $x_num)) {
                    if(preg_match_all($fecha_pattern, $m, $x_fecha)) {
                        if(preg_match_all($jugada_pattern, $m, $x_jugada)) {
                            if(preg_match_all($img_pattern, $m, $x_img)) {
                                if(preg_match_all($loteria_pattern, $m, $x_loteria)) {
                                    $lot = $x_loteria[1];
                                }
                                array_push($a, array($lot, $x_jugada[1], $x_fecha[1], $x_num[1], $x_img[1], $check));
                                
                                if ($modo_debug){
                                    imprimir($lot, []);
                                }
                            } elseif ($modo_debug){
                                imprimir("No se encontro img_pattern", $m);
                            }
                        } elseif ($modo_debug){
                            imprimir("No se encontro jugada_pattern", $m);
                        }
                    } elseif ($modo_debug){
                        imprimir("No se encontro fecha_pattern", $m);
                    }
                } elseif ($modo_debug){
                    imprimir("No se encontro numeros_pattern", $m);
                }
            }
        }
    }
    header("Content-Type: text/html; charset=UTF-8");    
    curl_close($ch);
    
    return $a;
}


// $x = retornar_lot_numeros_live();

// print_r(sizeof($x)); // Son 33 jugadas

// foreach($x as $a){
//     echo "<br>";
//     var_dump($a);
//     echo "<br>";
// }

?>