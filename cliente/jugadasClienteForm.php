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
$m_label = "Moneda";
$monto_label = "Monto";
$num_label = "Números";

$repetir_label = "Repetir";
$borrar_label = "Borrar";


if (isset($_POST["lotsSelect"])){
    $_SESSION["lotsSelect"] = $_POST["lotsSelect"];
    $_SESSION["sortSelect"] = $sortDefault;
} elseif (isset($_SESSION["lotsSelect"])) {
    $_SESSION["lotsSelect"] = $_SESSION["lotsSelect"];
} else {
    $_SESSION["lotsSelect"] = $lotsDefault;
}

if (isset($_POST["sortSelect"])){
    $_SESSION["sortSelect"] = $_POST["sortSelect"];
} elseif (isset($_SESSION["sortSelect"])) {
    $_SESSION["sortSelect"] = $_SESSION["sortSelect"];
} else {
    $_SESSION["sortSelect"] = $sortDefault;
}

if (isset($_SESSION["tablajugada"])) {
    $_SESSION["tablajugada"] = $_SESSION["tablajugada"];
} else {
    $_SESSION["tablajugada"] = [];
}


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
                <div class="bebe">
                    <div class="papa">
                    </div>
                    <div class="col">

                    <div class=".row">
                        <?php
                        $b_value = $_SESSION["lotsSelect"] != $lotsDefault && $_SESSION["sortSelect"] != $sortDefault;
                        if ($b_value){
                            $value = $todo_combinado[$_SESSION["lotsSelect"]][$_SESSION["sortSelect"]];
                            for ($x = 0; $x < $value[$cant_b_label]; $x++){
                                echo '<input type="text" class="bebecito" name="jugada'; echo $x; echo '" placeholder="NUMERO A JUGAR" required></input>';
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
                                        $num = implode(", ", $num_og);
                                        $c_ticket = [
                                            $lot_label => $_SESSION["lotsSelect"], 
                                            $sor_label => $_SESSION["sortSelect"], 
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
                                    
                                    echo '
                                    </div>

                                    </div>
                                    <div class=" bebe" style="justify-content: flex-end">

                                        <input type="submit" class="bebecitoButton" name="imprimir" value="IMPRIMIR JUGADA">
                                    </div>


                                    <div class=" bebe" style="justify-content: flex-end">
                                        <table>';
                                        if ($_SESSION["tablajugada"]){
                                            echo '
                                            <tr>';

                                                $encabezados = [$tc_label, $lot_label, $sor_label, $m_label, $monto_label, $num_label];
                                                foreach($encabezados as $e){
                                                    echo '<th>'; echo $e; echo '</th>';
                                                }

                                                echo '
                                            </tr>';
                                                
                                                $filas = [];
                                                $count = 0;
                                                foreach($_SESSION["tablajugada"] as $ses){
                                                    // var_dump($ses);

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
                                                        <input type="submit" class="" name="'; echo $repetir_label.$count; echo '" value="'; echo $repetir_label; echo '" onclick="';
                                                        

                                                        echo 'this.form.submit()
                                                        "></input>
                                                        <input type="submit" class="" value="'; echo $borrar_label; echo '"> </input>
                                                    </form>
                                                    </td>
                                                    </tr>';
                                                    $filas[$repetir_label . $count] = $temp;
                                                    $count ++;
                                                    
                                            }
                                            for ($x = 0; $x < $count; $x++){
                                                if (isset($_POST[$repetir_label.$x])){
                                                    $indice = array_search($filas[$repetir_label.$x], $_SESSION["tablajugada"]);
                                                    $_SESSION["tablajugada"][$indice][$tc_label] ++;
                                                    break;
                                                }
                                            }
                                            // var_dump($_POST);






                                        }
                                        echo '
                                        </table>
                                    </div>
                                </div>
                            </div>
                            ' 
                            ?>
            


  