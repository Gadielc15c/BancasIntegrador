<?php 
include('../backend/phpfunctions/jugadasFunctions.php');


?>

<div class=".container">

<?php 

$lotsDefault = "Seleccione una Lotería"; 
$sortDefault = "Seleccione sorteo";



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
                                echo '<input type="text" class="bebecito" name="jugada1" placeholder="NUMERO A JUGAR"></input>';
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
                                    echo '<input type=" text" class="bebecito" name="monto" placeholder="MONTO"> </input>
                                    </div>
                                    </div>
                                    
                                    </div>     
                                    <div>   
                                        <input type="submit" class="bebecitoButton" value="Jugar"> </input>
                                        <input type="submit" class="bebecitoButton" value="Jugar en Todas"> </input>

                                    </div>
                                    </div>

                                    </div>
                                    <div class=" bebe" style="justify-content: flex-end">

                                        <input type="summit" class="bebecitoButton" name="jugada2" value="IMPRIMIR JUGADA">
                                    </div>


                                    <div class=" bebe" style="justify-content: flex-end">
                                        <h2 class="font-weight-bold " style=" padding-top: 55px; padding-left: 25px">INSERTAR TABLA ACA
                                        </h2>

                                    </div>

                                </div>
                            </div>
                                    ';
                                }
                                
                            ?>
            </form>


  