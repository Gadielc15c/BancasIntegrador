<?php 
    include_once("E:\\xampp\\htdocs\\include_me.php");
    include_once(include_me("carritoFunctions.php"));
    include_once(include_me("llavesYTextos.php"));
    // include('../backend/phpfunctions/carritoFunctions.php');

    if(isset($_SESSION[$sestabladejugadas])){
        $value =$_SESSION[$sestabladejugadas];
    } else {
        // extraer de sql
    }

    
    foreach ($value as $v){
    
        $lot = $v[$lotlabel];
        $sort = $v[$solabel];
        $tipo = $v[$sotipolabel];

        $string = "Maggie,Panqué,Guayaba";
        $sep = ",";
        $justring = $v["Números"];
        $jug = explode($sep, $justring);
        
        $tot=0;
        $mon = $v["Monto"];
        foreach ($jug as $totalito){
            $tot+=$mon;


        }
        
        
        
        $date = "15/11/2022";
        $img ="xD";
        shoppingMaker($lot,$sort,$tot,$jug,$tipo,$mon,$date,$img);
        } 
?>

