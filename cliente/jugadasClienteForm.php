<?php 

include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/jugadasFunctions.php');
include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/generals.php');
include_once(dirname(__FILE__, 2) . '/backend/llavesYTextos.php');
include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/sqlRelated/sqlqueryinsert.php');
include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/sqlRelated/sqlqueryupdate.php');
include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/sqlRelated/sqlqueryselect.php');

?>

<div class=".container">

<?php 

$lotsDefault = "Seleccione una Lotería"; 
$sortDefault = "Seleccione sorteo";

$repetir_label = "Repetir";
$borrar_label = "Borrar";

$sq = seleccionar_tablajugadaventadeticket_estoyharto_por_idterceros_fk($_SESSION[$dbtercerosid]);

if ($sq){
    $tempvar = convert_str_to_array_estoyharto($sq[$genjuglabel]);
} else {
    $tempvar = [];
}

save_post_in_session("lotsSelect", $lotsDefault, "lotsSelect", "sortSelect", $sortDefault);
save_post_in_session("sortSelect", $sortDefault, "sortSelect");
many_persistent_sessions([$sestabladejugadas, "filasjugadas", "conteojugadas"], [$tempvar, [], 0]);


?>

    <div class=".row">
        <div class="bheder">
            <h1 style="text-align:center; "> VENTA DE TICKET</h1>
        </div>
    </div>

    <div class=" col">
    <div class=".row">
        <div class="papa">
        <div class="papagay">
            <div class="bebe right">
                <form action="" method="post" class="form-grp">
                    <select name="lotsSelect" id="lotsSelect" class="lotsSelect right" onchange="this.form.submit()" place>
                        <option value="" disable selected="selected"><?php echo $_SESSION["lotsSelect"]; ?></option>
                        <?php
                            foreach($todo_loteria as $lotsitem){
                                if ($lotsitem != $_SESSION["lotsSelect"]){
                                    echo "<option value='$lotsitem'>$lotsitem</option>";
                                }
                            }
                        ?>
                    </select>
                </form>   
            </div>
           
            
            <div class="bebe left">
                <form action="" method="post" class="form-grp">  
                    <select name="sortSelect" id="sortSelect" class="lotsSelect left" onchange="this.form.submit()" place>
                        <option value="" disable selected="selected"><?php echo $_SESSION["sortSelect"]; ?></option>
                        <?php
                            if ($_SESSION["lotsSelect"] != $lotsDefault){
                                foreach(array_keys($todo_combinado[$_SESSION["lotsSelect"]]) as $sortItem){
                                    if ($sortItem != $_SESSION["sortSelect"]){
                                        echo "<option value='$sortItem'>$sortItem</option>";
                                    }
                                }
                            }
                        ?>
                    </select>
                </form>
            
            </div>
                 
          
            </div>
            </div>
            <form action="" method="post" id="formJ" class="form-grp">  
                <?php
                        $b_value = $_SESSION["lotsSelect"] != $lotsDefault && $_SESSION["sortSelect"] != $sortDefault;
                        if ($b_value){
                            echo '<div class="bebe">
                                <div class="papa">
                                </div>
                                <div class="col">

                                <div class=".row">';
                        
                            $value = $todo_combinado[$_SESSION["lotsSelect"]][$_SESSION["sortSelect"]];
                            $modalidad = $value[$jug_label];
                            $req = "required";
                            if (in_array($t_label, $modalidad) || in_array($p_label, $modalidad)){
                                $req = "";
                            }
                            echo '<input type="text" class="bebecito" id="numj" name="jugada'; echo 0; echo '" placeholder="NUMERO A JUGAR"></input>';
                            for ($x = 1; $x < $value[$cant_b_label]; $x++){
                                
                                echo '<input type="text" class="bebecito" id="numj" name="jugada'; echo $x; echo '" placeholder="NUMERO A JUGAR"'; echo $req; echo '></input>';
                            }
                        }

                        ?>
                    </div>
                 
                    <div class=" col">

                        <div class=".row">
                            <?php
                                if ($b_value){
                                    $moneda = $value[$rd_m_label];
                                    if ($moneda){
                                        $m = "RD";
                                    } else {
                                        $m = "US";
                                    }
                                    echo "<label for='monto' >MONEDA: "; echo $m; echo "$</label>";
                                    echo '<input id="montoJ" "type=" text" class="bebecito" name="'; echo $genmontolabel; echo '" placeholder="MONTO" required> </input>
                                    
                                    </div>
                                    </div>
                                    
                                    </div>     
                                    <div>   
                                        <input type="submit" class="bebecitoButton" value="Jugar"> </input>
                                        <p class="warnings" id="warnings"></p>

                                    </div>
                                    </form>';
                                    save_post_in_session($genmonlabel, $m, $genmonlabel);
                                    
                                    if (isset($_POST["jugada0"])){
                                        $num_og = array_slice($_POST, 0, sizeof($_POST)-1);
                                        $num_o = array_remove_empty_string($num_og);
                                        $num = implode(", ", $num_o);
                                        
                                        $modali = ucfirst($q_label);
                                        if (in_array($t_label, $modalidad)){
                                            $s = sizeof($num_o);
                                            if ($s == 3){
                                                $modali = ucfirst($t_label);
                                            } elseif ($s == 2){
                                                $modali = ucfirst($p_label);
                                            } 
                                        } else {
                                            if (!in_array($q_label, $modalidad)){
                                                $modali = "Propia";
                                            }
                                        }

                                        $c_ticket = [
                                            $lotlabel => $_SESSION["lotsSelect"], 
                                            $solabel => $_SESSION["sortSelect"], 
                                            $sotipolabel => $modali,
                                            $genmonlabel => $m, 
                                            $genmontolabel => floatval($_POST[$genmontolabel]), 
                                            $gennumlabel => $num
                                        ];

                                        $der = [];
                                        foreach ($_SESSION[$sestabladejugadas] as $ses){
                                            $ses = array_remove_by_key($gencantlabel, $ses);
                                            array_push($der, $ses);
                                        }

                                        if (in_array($c_ticket, $der)){
                                            $indice = array_search($c_ticket, $der);
                                            $_SESSION[$sestabladejugadas][$indice][$gencantlabel] ++;
                                        } else {
                                            $c_ticket[$gencantlabel] = 1;
                                            array_push($_SESSION[$sestabladejugadas], $c_ticket);
                                        }

                                        $_SESSION[$gennumlabel] = $_POST;
                                    } else {
                                        persistent_session($gennumlabel, []);
                                    }
                                } // Cierre del if que esta mas arriba, no borrar
                                
                                // Actualizar las jugadas despues de darle al boton repetir
                                for ($x = 0; $x < $_SESSION["conteojugadas"]; $x++){
                                    if (isset($_POST[$repetir_label.$x])){
                                        $indice = array_search($_SESSION["filasjugadas"][$repetir_label.$x], $_SESSION[$sestabladejugadas]);
                                        $_SESSION[$sestabladejugadas][$indice][$gencantlabel] ++;
                                        break;
                                    }
                                }

                                // Borrar la jugadas despues de darle al boton borrar
                                for ($x = 0; $x < $_SESSION["conteojugadas"]; $x++){
                                    if (isset($_POST[$borrar_label.$x])){
                                        $_SESSION[$sestabladejugadas] = array_remove_by_key($repetir_label.$x, $_SESSION["filasjugadas"], false);
                                        break;
                                    }
                                }

                                    echo '
                                    </div>

                                    </div>
                                    <div class="bebe" style="justify-content: flex-end">
                                    </div>

                                    <div class=" bebe" style="justify-content: flex-end">
                                       
                                    <table class="table table-bordered">';
                                        
                                        if ($_SESSION[$sestabladejugadas]){
                                            echo '
                                            <tr>';

                                                
                                                foreach($encabezados as $e => $encabezado){
                                                    echo '<th class="th">'; echo $encabezado; echo '</th>';
                                                    if ($e === array_key_last($encabezados)) {
                                                        echo '<th class="th"> </th>';
                                                    }
                                                }

                                                echo '
                                            </tr>';
                                              
                                                $count = 0;
                                                $_SESSION["filasjugadas"] = [];
                                                foreach($_SESSION[$sestabladejugadas] as $ses){

                                                    echo '<tr>';
                                                    $temp = [];
                                                    foreach($encabezados as $e){
                                                        
                                                        $temp[$e] = $ses[$e];
                                                        echo '<td>
                                                    '; echo $ses[$e]; echo '
                                                        </td>';
                                                    }
                                                    
                                                    echo '
                                                    <td>
                                                    <form action="" method="post" class="form-grp">
                                                        <input type="submit" class="btn btn-outline-info btn-sm" name="'; echo $repetir_label.$count; echo '" value="'; echo $repetir_label; echo '" onclick="this.form.submit()"></input>
                                                        <input type="submit" class="btn btn-outline-danger btn-sm" name="'; echo $borrar_label.$count; echo '" value="'; echo $borrar_label; echo '"> </input>
                                                    </form>
                                                    </td>
                                                    </tr>';
                                                    $_SESSION["filasjugadas"][$repetir_label . $count] = $temp;
                                                    $count ++;
                                            }
                                            $_SESSION["conteojugadas"] = $count;
                                            
                                        }
                                        echo '
                                        </table>
                                        <div class=" bebe" style="justify-content: flex-end">
                                        ';

                                        if ($_SESSION[$sestabladejugadas]){
                                            echo '
                                                <form action="../cliente/pagosCliente.php" method="post" class="form-grp">
                                                    <input onclick=" " type="submit" class="bebecitoButton" name="imprimir" value="FINALIZAR JUGADA">
                                                </form>';
                                        } 

                                        echo '
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
//

$estoyharto_string = convert_array_to_str_estoyharto($_SESSION[$sestabladejugadas]);

// limite de 65,535 caracteres. se debe establecer
// var_dump($sq);
if ($sq){
   $x= execute_update("tablajugadaventadeticket", ["jugadas" =>$estoyharto_string], ["idterceros_fk" => $_SESSION[$dbtercerosid]]);
} else {
    try {
        insertar_tablajugada_estoyharto($estoyharto_string, $_SESSION[$dbtercerosid]);
    }
    catch (Exception $e){
        // Como solucionar todo problema
        // Escondiendolo


        // Es broma
    }
}


?>
                            