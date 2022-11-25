<?php
include_once(dirname(__FILE__, 3) . '/backend/llavesYTextos.php');
include_once(dirname(__FILE__, 3) . '/backend/phpfunctions/sqlRelated/sqlqueryupdate.php');
include_once(dirname(__FILE__, 3) . '/backend/phpfunctions/sqlRelated/sqlqueryselect.php');

function crear_numero_random($maxrange = null){
    if ($maxrange){
        return rand(1, $maxrange);
    }
    return rand(1, 2147483647);
}

function crear_tickets_codigo(){
    return strval(rand(1000, 9999)) . uniqid();
}

function fecha_de_hoy(int $zona = 0, string $add_day = "0", string $add_year = "0"){
    /* 
        @param $zona        0 para dominicana, 1 para new york
    */
    if ($zona == 0){
        $timezone = "America/Santo_Domingo";
    } elseif ($zona == 1){
        $timezone = "America/New_York";
    }
    
    $dt = new DateTime("now", new DateTimeZone($timezone));
    $dt -> setTimestamp(time());
    date_add($dt, date_interval_create_from_date_string("$add_day days"));
    date_add($dt, date_interval_create_from_date_string("$add_year year"));
    return $dt ->format('Y-m-d H:i:s');;
}

function por_estado_activo_inactivo($estado){
    if ($estado){
        return "activo";
    } else {
        return "inactivo";
    }
}

function convertir_int_array_to_str_array($arreglo){
    $a = array();
    foreach($arreglo as $b){
        $v = $b;
        if (is_int($b)){
            $v = (string)$b;
        }
        array_push($a, $v);
    }
    return $a;
}

function array_extract(array $a, int $start, int $end, array $skip){
    /* 
        @param $a y $skip
                                Los tipos de variable de deben coincidir entre estos 2. La longitud no importa.
        
        @param $start           El inicio del nuevo array deseado
        @param $end             El final del nuevo array
        @param $skip            Un array con indices (int) para dentro de start y end que no deseas
                                Ej:
                                Array original (0, 1, 2, 3, 4, 5, 6, 7, 8, 9)
                                Quiero los valores del indice 0 al indice 5 pero sin el indice 1 y 3 (skip)
                                Resultado (0, 2, 4, 5)
    */
    $t = array();
    $count = 0;
    foreach($a as $b){
        // echo $count;
        // var_dump($skip);
        // var_dump(!in_array($count, $skip));
        if ($start <= $count && $count <= $end){
            if (!in_array($count, $skip)){
                array_push($t, $b);
            }
        }
        $count ++;
    }
    return $t;
}

function array_remove_once(array $a, $value){
    /* 
        Removera la primera ocurrencia de $value dentro del array

        @param $a y $value 
                                Los tipos de variable del array  deben coincidir con value
        @param $value           No es un indice, es el valor a remover. Ej: 1 o "1" o [1] etc
    
    */
    $count = 0;
    // array_print($a);
    // var_dump($value);
    foreach ($a as $b){
        // echo "<br>";
        // var_dump($b == $value);
        // echo "<br>";
        if ($b == $value){
            break;
        } else {
            $count ++;
        }
    }
    // array_print($a);
    // echo "<br>";
    // echo sizeof($a)-1;
    // echo "<br>";
    // echo $count;
    return array_extract($a , 0, sizeof($a)-1, [$count]);
}

function array_remove_null(array $a){
    $t = [];

    foreach($a as $b){
        if ($b !== null){
            array_push($t, $b);
        } 
    }
    return $t;
}

function array_remove_empty_string(array $a){
    $t = [];

    foreach($a as $b){
        if ($b !== ""){
            array_push($t, $b);
        } 
    }
    return $t;
}

function array_remove_by_key(string $key, array $a, bool $mantener_keys = true){
    $i = array_search($key, array_keys($a));
    $all_keys = array_keys($a);
    $all_keys = array_extract($all_keys, 0, sizeof($a)-1, [$i]);
    $a = array_extract($a, 0, sizeof($a)-1, [$i]);

    if ($mantener_keys){
        $temp = []; // Para mantener las llaves originales
        for ($x = 0; $x < sizeof($all_keys); $x++){
            $temp[$all_keys[$x]] = $a[$x];
        }
        return $temp;
    }
    return $a;
}

function array_keep_lowest_key_array(array $a, array $b){
    $ak = array_keys($a);
    $bk = array_keys($b);
    $aks = sizeof($ak);
    $bks = sizeof($bk);
    
    if ($aks < $bks) {
        $gk = $bk;
    } elseif ($aks > $bks) {
        $gk = $ak;
    } else {
        return [$a, $b];
    }

    foreach($gk as $k){
        if (!array_key_exists($k, $a)){
            $b = array_remove_by_key($k, $b);
        } elseif (!array_key_exists($k, $b)){
            $a = array_remove_by_key($k, $a);
        }
    }
    return [$a, $b];
}

function array_print(array $a){
    foreach($a as $b){
        echo "<br>";
        var_dump($b);
        echo "<br>";
    }
}

function is_included(string $include_full_dir){
    if (in_array($include_full_dir, get_included_files())){
        return true;
    }
    return false;
}

function save_post_in_session(string $session_key, $session_default, string $post_key, string $session_mantener_key = "", $session_mantener_var = null){
    /* 
        Esta funcion va a capturar un nuevo $_POST y lo va a guardar en una session y tambien va a mantener 1 llave y el valor del $_POST anterior
        Se utiliza cuando tienes que hacer 2 $_POST uno detras de otro y no quieres que el sistema olvide el $_POST anterior

    @param $session_key             string      La llave para asignarle a la session en donde se guardara tu variable despues de un $_POST                   
    @param $session_default         any         La variable a asignarle a la session para inicializarla cuando se arranque la pagina por primera vez
    @param $post_key                string      La llave en el $_POST en donde se encuentra la variable que deseas guardar en la session
    @param $session_mantener_key    string      La llave del viejo valor en session que no quieres que se borre al hacer $_POST
    @param $session_mantener_var    any         La vieja variable que no deseas que se borre al hacer $_POST
    
    */

    if (isset($_POST[$post_key])){
        $_SESSION[$session_key] = $_POST[$post_key];
        if ($session_mantener_key !== "" && $session_mantener_var !== null){
            $_SESSION[$session_mantener_key] = $session_mantener_var;
        }
    } else {
        persistent_session(session_key: $session_key, session_default: $session_default);
    }
}



/* 
    //Ejemplo de save_post_in_session para capturar $_POST

    //Ejemplo con session en la cual se desea mantener la anterior
    if (isset($_POST["lotsSelect"])){
        $_SESSION["lotsSelect"] = $_POST["lotsSelect"];             // lotSelect es el session_key, y coincidencialmente tambien es el post_key
        $_SESSION["sortSelect"] = $sortDefault;                     // La session a mantener mantener_key y mantener_var
    } elseif (isset($_SESSION["lotsSelect"])) {
        $_SESSION["lotsSelect"] = $_SESSION["lotsSelect"];
    } else {
        $_SESSION["lotsSelect"] = $lotsDefault;                     // La variable a asignarle por defecto si no existe
    }


    //Ejemplo con session sin mantener la anterior

    if (isset($_POST["sortSelect"])){
        $_SESSION["sortSelect"] = $_POST["sortSelect"];             // sortSelect es el session_key, y coincidencialmente tambien es el post_key
    } elseif (isset($_SESSION["sortSelect"])) {
        $_SESSION["sortSelect"] = $_SESSION["sortSelect"];
    } else {
        $_SESSION["sortSelect"] = $sortDefault;                     // La variable a asignarle por defecto si no existe
    }
*/

function persistent_session(string $session_key, $session_default){
    /* 
        A diferencia de la funcion anterior (save_post_in_session), esta funcion no captura $_POST, simplemente lo que hace es
        mantener el valor de una $_SESSION

    @param $session_key             string      La llave en $_SESSION en donde esta la variable a mantener                   
    @param $session_default         any         La variable por defecto a asignarle a la session para inicializarla cuando se arranque la pagina por primera vez
    
    */

    if (isset($_SESSION[$session_key])) {
        $_SESSION[$session_key] = $_SESSION[$session_key];
    } else {
        $_SESSION[$session_key] = $session_default;
    }
}

// Ejemplos de persistent_sesison debajo

function many_persistent_sessions(array $session_key, array $session_default){
    /* 
        Similar a la funcion anterior. Esta funcion te permite realizar varias sessiones persistentes por medio de arrays.
        Los array deben estar en orden. Ejemplo key     {A_key,     B_key,      C_key,      D_key}
                                                default {A_anyvar,  B_anyvar,   C_anyvar,   D_anyvar}

        De lo contrarior tus valores seran guardados en diferentes llaves a la cual no perteneces

    @param $session_key         array   Un arreglo con las llaves en $_SESSION en donde estan las variables a mantener                   
    @param $session_default     array   Un arreglo con las variable por defecto a asignarle a la session para inicializarla cuando se arranque la pagina por primera vez
    
    */

    $error_msg = "Error usando many_persistent_session. ";
    $sk = sizeof($session_key);
    if ($sk != sizeof($session_default)){
        echo $error_msg . "Los sizeof no coinciden.";
        return False;
    }
    
    for ($x = 0; $x < $sk; $x++) {
        if (is_string($session_key[$x])){
            persistent_session($session_key[$x], $session_default[$x]);
        } else {
            echo $error_msg . "Hay una variable en session_key que no es un string. Todos deben ser strings.";
            return False;
        }
      }
}

/* 
    //Ejemplos de persistent_session a la cual se pueden agrupar en many_persistent_session

    // Session persistente 1
    if (isset($_SESSION["tablajugada"])) {
        $_SESSION["tablajugada"] = $_SESSION["tablajugada"];
    } else {
        $_SESSION["tablajugada"] = [];
    }

    // Session persistente 2
    if (isset($_SESSION["filasjugadas"])) {
        $_SESSION["filasjugadas"] = $_SESSION["filasjugadas"];
    } else {
        $_SESSION["filasjugadas"] = [];
    }

    // Session persistente 3
    if (isset($_SESSION["conteojugadas"])) {
        $_SESSION["conteojugadas"] = $_SESSION["conteojugadas"];
    } else {
        $_SESSION["conteojugadas"] = 0;
    }
*/

function create_simple_session(string $session_key, $session_default){
    $_SESSION[$session_key] = $session_default;
}


function convert_array_to_str_estoyharto(array $jugadas){
    global $encabezados;
    $estoyharto_string = "";
    foreach($jugadas as $estoy){
        foreach($encabezados as $harto){
            $estoyharto_string = $estoyharto_string . "-" . $harto . "-" . $estoy[$harto] . "-";
        }
    }
    return $estoyharto_string;
}

function convert_str_to_array_estoyharto(string $sq){
    if ($sq == ""){
        return [];
    }

    $v = str_replace("--", "-", $sq);
    $v = explode('-', $v);
    $t = [];
    foreach($v as $b){
        if ($b){
            array_push($t, $b);
        }
    }

    $primer = $t[0];
    $temp = [];
    $result = [];
    for ($x = 0; $x < sizeof($t); $x += 2) {
        if ($x != 0 && $t[$x] == $primer){
            array_push($result, $temp);
        }
        $temp[$t[$x]] = $t[$x+1];

    }
    array_push($result, $temp);
    return $result;
}

function remover_jugada_estoyharto($terid, array $pago){
    global $dbuserid; global $genjuglabel;
    $sq = seleccionar_tablajugadaventadeticket_estoyharto_por_idterceros_fk($_SESSION[$dbuserid]);
    if ($sq){
        $a = convert_str_to_array_estoyharto($sq[$genjuglabel]);
        $temp = [];
        foreach($a as $aa){
            $r = array_keep_lowest_key_array($aa, $pago);
            array_push($r[0], $temp);
            $pago = $r[1];
        }
        
        $a = array_remove_once($a, $pago);
        $a = convert_array_to_str_estoyharto($a);
        update_tablajugadaventadeticket_estoyharto_por_idtercero($a, $terid);
        return $a;
    }
    return false;
}

// convert_str_to_array_estoyharto($sq);

?>