<?php

function retornar_lot_numeros_live(){
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
        echo curl_error($ch);
    } else {
        $response = trim(preg_replace('/\s\s+/', ' ', $response));
        $pattern = "/start game .+? end game /i";
        
        if(preg_match_all($pattern, $response, $matches)) {
            $matches = $matches[0];
            
            $lot = "None";
            foreach ($matches as $m){
                $loteria_pattern = "/([A-Za-z0-9 ]{2,})<\/a>/";
                $jugada_pattern = "/<span>([A-Za-z0-9 +:-]+)<\/span>/";
                $fecha_pattern = "/> ([0-9-]+) <\/d/";
                $numeros_pattern = "/>([0-9x]+)</";
                $img_pattern = "/src=\"(.*?)\"/";
                $check_pattern = "/fa fa-check text-success/";
                if(preg_match_all($check_pattern, $m, $x0)) {
                    if(preg_match_all($numeros_pattern, $m, $x_num)) {
                        if(preg_match_all($fecha_pattern, $m, $x_fecha)) {
                            if(preg_match_all($jugada_pattern, $m, $x_jugada)) {
                                if(preg_match_all($img_pattern, $m, $x_img)) {
                                    if(preg_match_all($loteria_pattern, $m, $x_loteria)) {
                                        $lot = $x_loteria[1];
                                        array_push($a, array($lot, $x_jugada[1], $x_fecha[1], $x_num[1], $x_img[1]));
                                    } else {
                                        array_push($a, array($lot, $x_jugada[1], $x_fecha[1], $x_num[1], $x_img[1]));
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    header("Content-Type: text/html; charset=UTF-8");    
    curl_close($ch);
    
    return $a;
}

/* $x = retornar_lot_numeros_live();

echo gettype($x); */

?>