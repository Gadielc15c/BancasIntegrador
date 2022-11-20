<?php 
include_once('../backend/phpfunctions/jugadasFunctions.php');
include_once('../backend/phpfunctions/generals.php');
?>

<div class=".container">

<?php 

$lotsDefault = "Seleccione una Lotería"; 
$sortDefault = "Seleccione sorteo";
$tc_label = "Cantidad";
$lot_label = "Lotería";
$sor_label = "Sorteo";
$mod_label = "Modalidad";
$m_label = "Moneda";
$monto_label = "Monto";
$num_label = "Números";

$repetir_label = "Repetir";
$borrar_label = "Borrar";

save_post_in_session("lotsSelect", $lotsDefault, "lotsSelect", "sortSelect", $sortDefault);
save_post_in_session("sortSelect", $sortDefault, "sortSelect");
many_persistent_sessions(["tablajugada", "filasjugadas", "conteojugadas"], [[], [], 0]);


?>

    <div class=".row">
        <div class="bheder">
            <h1 style="text-align:center; "> VENTA DE TICKET</h1>
        </div>
    </div>

    
    <div class=".row">
        <div class="papa">
            <div class="bebe">
                <h2>Selecione Su Loteria</h2>
                <form action="" method="post" class="form-grp">
                    <select name="lotsSelect" id="lotsSelect" class="lotsSelect" onchange="this.form.submit()" place>
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

                <form action="" method="post" class="form-grp">  
                    <select name="sortSelect" id="sortSelect" class="lotsSelect" onchange="this.form.submit()" place>
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
            <form action="" method="post" class="form-grp">  
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
                            echo '<input type="text" class="bebecito" name="jugada'; echo 0; echo '" placeholder="NUMERO A JUGAR" required></input>';
                            for ($x = 1; $x < $value[$cant_b_label]; $x++){
                                
                                echo '<input type="text" class="bebecito" name="jugada'; echo $x; echo '" placeholder="NUMERO A JUGAR"'; echo $req; echo '></input>';
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
                                    echo '<input type=" text" class="bebecito" name="monto" placeholder="MONTO" required> </input>
                                    
                                    </div>
                                    </div>
                                    
                                    </div>     
                                    <div>   
                                        <input type="submit" class="bebecitoButton" value="Jugar"> </input>

                                    </div>
                                    </form>';
                                    
                                    $cliente_num_label = "numeros";
                                    $cliente_moneda_label = "moneda";
                                    
                                    if (isset($_POST["moneda"])){
                                        $_SESSION["moneda"] = $m;
                                    } elseif (isset($_SESSION["moneda"])) {
                                        $_SESSION["moneda"] = $_SESSION["moneda"];
                                    } else {
                                        $_SESSION["moneda"] = $m;
                                    }

                                    $ticket_cantidad = 1;
                                    
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
                                            $lot_label => $_SESSION["lotsSelect"], 
                                            $sor_label => $_SESSION["sortSelect"], 
                                            $mod_label => $modali,
                                            $m_label => $m, 
                                            $monto_label => floatval($_POST["monto"]), 
                                            $num_label => $num
                                        ];

                                        $der = [];
                                        foreach ($_SESSION["tablajugada"] as $ses){
                                            $ses = array_remove_by_key($ses, $tc_label);
                                            array_push($der, $ses);
                                        }

                                        if (in_array($c_ticket, $der)){
                                            $indice = array_search($c_ticket, $der);
                                            $_SESSION["tablajugada"][$indice][$tc_label] ++;
                                        } else {
                                            $c_ticket[$tc_label] = $ticket_cantidad;
                                            array_push($_SESSION["tablajugada"], $c_ticket);
                                        }

                                        $_SESSION["numeros"] = $_POST;
                                    } elseif (isset($_SESSION["numeros"])) {
                                        $_SESSION["numeros"] = $_SESSION["numeros"];
                                    } else {
                                        $_SESSION["numeros"] = [];
                                    }
                                } // Cierre del if que esta mas arriba, no borrar
                                
                                // Actualizar las jugadas despues de darle al boton repetir
                                for ($x = 0; $x < $_SESSION["conteojugadas"]; $x++){
                                    if (isset($_POST[$repetir_label.$x])){
                                        $indice = array_search($_SESSION["filasjugadas"][$repetir_label.$x], $_SESSION["tablajugada"]);
                                        $_SESSION["tablajugada"][$indice][$tc_label] ++;
                                        break;
                                    }
                                }

                                // Borrar la jugadas despues de darle al boton borrar
                                for ($x = 0; $x < $_SESSION["conteojugadas"]; $x++){
                                    if (isset($_POST[$borrar_label.$x])){
                                        $_SESSION["tablajugada"] = array_remove_by_key($_SESSION["filasjugadas"], $repetir_label.$x, false);
                                        break;
                                    }
                                }

                                    echo '
                                    </div>

                                    </div>
                                    <div class=" bebe" style="justify-content: flex-end">';
                                    if ($b_value){

                                        echo '<form action="../cliente/pagosCliente.php" method="post" class="form-grp">
                                        <input onclick=" " type="submit" class="bebecitoButton" name="imprimir" value="FINALIZAR JUGADA">
                                        </form>';

                                    } echo '

                                        
                                    </div>


                                    <div class=" bebe" style="justify-content: flex-end">
                                        <table>';
                                        if ($_SESSION["tablajugada"]){
                                            echo '
                                            <tr>';

                                                $encabezados = [$tc_label, $lot_label, $sor_label, $mod_label, $m_label, $monto_label, $num_label];
                                                foreach($encabezados as $e){
                                                    echo '<th>'; echo $e; echo '</th>';
                                                }

                                                echo '
                                            </tr>';
                                              
                                                $count = 0;
                                                $_SESSION["filasjugadas"] = [];
                                                foreach($_SESSION["tablajugada"] as $ses){

                                                    echo '<tr>';
                                                    $temp = [];
                                                    foreach($encabezados as $e){
                                                        $temp[$e] = $ses[$e];
                                                        echo '<td>
                                                        <input type="text"  name="color_1" value="'; echo $ses[$e]; echo '" readonly/>
                                                        </td>';
                                                    }
                                                    echo '
                                                    <td>
                                                    <form action="" method="post" class="form-grp">
                                                        <input type="submit" class="" name="'; echo $repetir_label.$count; echo '" value="'; echo $repetir_label; echo '" onclick="this.form.submit()"></input>
                                                        <input type="submit" class="" name="'; echo $borrar_label.$count; echo '" value="'; echo $borrar_label; echo '"> </input>
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
                                    </div>
                                </div>
                            </div>
                            ' 
                            ?>
                            