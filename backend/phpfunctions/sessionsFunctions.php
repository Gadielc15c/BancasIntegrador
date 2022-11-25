
<?php

function SessionControl($nivel)
{

    /*
    ------------------------------------------------------------------------------------------------- 
     TIEMPO GLOBAL    
    -----------------------------------------------------------------------
    Este tiempo cerrara si o si la pagina tras pasado el tiempo
    
    Esta funcion se encarga de Crear Tiempos Pico en la Aplicacion, un tiempo Global y Uno Secundario
    -----------------+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
    | TIEMPO GLOBAL |    
    -----------------------------------------------------------------------
    Este tiempo cerrara si o si la pagina tras pasado el tiempo
     -----------------------------------------------------------------------
    | TIEMPO INACTIVIDAD    
    -----------------
    Este tiempo cerrara si o si la pagina tras pasado tiempo son hacer nada
    ***************************************************************************************************
    PARAMETRO
    **********
    Esta funcion recibe el nivel con el fin de ser reautlizada con otros niveles
    ----------------------------------------------------------------------------------------------------
    Gadiel Was here que rico!
     */
    $tiempoMaxGlobal = 3600; // tiempo  Global
    $inactividadTimeUltimaActividad = 900; // Tiempo de unactividad
    $timeUltimaActividad = $_SERVER['REQUEST_TIME'];

    ini_set("session.gc_maxlifetimeUltimaActividad", $tiempoMaxGlobal);
    ini_set("session.cookie_lifetimeUltimaActividad", $tiempoMaxGlobal); 
    session_start();
    $nameSessionWAOS = session_name();


    if (isset($_COOKIE[$nameSessionWAOS])) {
        setcookie($nameSessionWAOS, $_COOKIE[$nameSessionWAOS], time() + $tiempoMaxGlobal, '/');


        if (
            isset($_SESSION['LAST_ACTIVITY']) &&

            ($timeUltimaActividad - $_SESSION['LAST_ACTIVITY']) > $inactividadTimeUltimaActividad
        ) {
            session_unset();
            session_destroy();
            header('location:  ../index.php');
        } else {


            if (!isset($_SESSION['nivel'])) {

                header('location:  ../index.php');
            } else {
                if ($_SESSION['nivel'] != $nivel) {

                    header('location:  ../index.php');
                }
            }
            $_SESSION['LAST_ACTIVITY'] = $timeUltimaActividad;
        }
    } else

        header('location:  ../index.php');
}









?>