<?php

// include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/jugadasFunctions.php');
include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/generals.php');
// include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/sqlRelated/sqlqueryinsert.php');
// include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/sqlRelated/sqlqueryupdate.php');
// include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/sqlRelated/sqlqueryselect.php');





$tables_col = organize_tabledata();
$table_keys = array_keys($tables_col);
sort($table_keys);

?> 

<div class="col">
    <div class=".row">
        <div class="papa">
            <div class="papagay">
                <div class="bebe right">
                    <form action="" method="post" class="form-grp">
                        <select name="mantenselect" id="mantenselect" class="lotsSelect right" onchange="this.form.submit()" place>
                            <option value="" disable selected="selected"><?php if(isset($_POST["mantenselect"])){echo ucfirst($_POST["mantenselect"]);} ?></option>
                                <?php
                                    foreach($table_keys as $t){
                                        $b = true;
                                        if(isset($_POST["mantenselect"]) && $t == $_POST["mantenselect"]){
                                            $b = false;
                                        }
                                        if ($b){
                                            echo "<option value='$t'>"; echo ucfirst($t); echo "</option>";
                                        }
                                    }
                                ?>
                        </select>
                    </form>   
                </div>
            </div>
        </div>
    </div>
</div>

<?php

if(isset($_POST["mantenselect"])){
    $v = $_POST["mantenselect"];
    $resultados = execute_select($v);
    // echo "<BR>";
    // echo "<BR>";
    // var_dump($resultados);
    // echo "<BR>";
    // echo "<BR>";
    // foreach($resultados as $r){
    //     echo "<BR>";
    //     var_dump($r);
    //     echo "<BR>";
    // }


?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1> Mantenimientos </h1>
            <form action=" " method="POST"> 
                <input type="text" class="form-control mb-3" name="" placeholder="">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </form>
        </div>

        <div class="col-md-7 col-md-offset-2"></div>

        <div class="row-md-7">
            <table class="table">
                <thead class="table-warning table-striped">
                    <tr style="text-align: center;">
                        <?php 
                            $count = 0;
                            $rkey = array_keys($resultados[0]);
                            foreach($rkey as $r){
                                if ($count != 0){
                                    echo '<th>'; echo ucfirst($r); echo '</th>';
                                }
                                $count ++;
                            }
                            
                        ?>
                    </tr>
                </thead>
                <tbody>
                    
                        <?php 
                            $count = 0;
                            $hay_filas = false;
                            foreach($resultados as $resu){
                                echo '<tr>';
                                foreach($resu as $r){
                                    if ($count != 0){
                                        echo '<th>'; echo ucfirst($r); echo '</th>';
                                        $hay_filas = true;
                                    }
                                    $count ++;
                                }
                                $count = 0;
                                
                                if ($hay_filas){
                                    echo '<th><a href="" class="btn btn-warning">EDITAR</a></th>
                                    ';
                                }
                                echo '</tr>';
                                
                                
                            }
                        ?>
                    <style>
                        th {
                            text-align: justify;
                        }
                    </style>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
}
?>
