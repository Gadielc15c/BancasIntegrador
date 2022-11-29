<?php

// include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/jugadasFunctions.php');
include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/generals.php');
// include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/sqlRelated/sqlqueryinsert.php');
// include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/sqlRelated/sqlqueryupdate.php');
// include_once(dirname(__FILE__, 2) . '/backend/phpfunctions/sqlRelated/sqlqueryselect.php');





$tables_col = organize_tabledata();
$table_keys = array_keys($tables_col);
sort($table_keys);

$col_checkbox = ["recibirpago"];

$default_msg = "Seleccione una tabla";
save_post_in_session("mantenselect", $default_msg, "mantenselect");


?> 

<div class="col">
    <div class=".row">
        <div class="papa">
            <div class="papagay">
                <div class="bebe right"> 
                    <div class="bheder">
                        <h1 style="text-align:center; "> SELECCIONE SU MANTENIMIENTO</h1>
                    </div>
                    <form action="" method="post" class="form-grp">
                        <select name="mantenselect" id="mantenselect" class="lotsSelect right" onchange="this.form.submit()" place>
                            <option value="" disable selected="selected"><?php echo ucfirst($_SESSION["mantenselect"]) ?></option>
                                <?php
                                    foreach($table_keys as $t){
                                        if ($t != $_SESSION["mantenselect"]){
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

if(isset($_SESSION["mantenselect"])){

    $v = $_SESSION["mantenselect"];
    if ($v != $default_msg){
        $arr = get_fk_related_tables($v, $tables_col);
        $resultados = $arr[0];

        if (isset($_POST) && !in_array("mantenselect", array_keys($_POST))){
            $data = (explode("_", end($_POST)));
            $idcol = $data[0];
            $spec_id = $data[1];
            
            $retrieve_cols = [];

            foreach($arr[1] as $tab){
                $x = execute_select($tab, limit: 1);
                $retrieve_cols[$tab] = array_keys($x[0]);
            }



            // var_dump($retrieve_cols);


            // I have the IDs, now I need the columns for the where statement and combine it with the values
        }







        


?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <?php 
                if ($resultados[0]){
                    echo '<h1> Mantenimientos </h1>
                    <form action=" " method="POST">
                        <input type="text" class="form-control mb-3" name="" placeholder="">
                        <input type="submit" class="btn btn-primary" value="Buscar">
                    </form>';
                } else {
                    echo '<h1>Esta tabla no tiene contenido.</h1>';
                }
            ?>
        <div class="col-md-7 col-md-offset-2"></div>
        <div class="row-md-7">
            <table class="table">
                <thead class="table-warning table-striped">
                    <tr style="text-align: center;">
                        <?php 
                            $count = 0;
                            $rkey = array_keys($resultados[0]);
                            $estado_pos = [];
                            foreach($rkey as $r){
                                if ($count != 0){
                                    echo '<th>'; echo ucfirst($r); echo '</th>';
                                }
                                if (in_array($r, $col_checkbox) || str_contains($r, "estado")){
                                    array_push($estado_pos, $count);
                                }
                                $count ++;
                            }
                            
                        ?>
                    </tr>
                </thead>
                <tbody>
                    
                        <?php 
                            $count = 0;
                            $tnouc = 0;
                            $hay_filas = false;

                            foreach($resultados as $resu){
                                if ($resu){
                                    //             idcol                 idvalue
                                    $tableidcol = $rkey[0] . "_" . array_values($resu)[0];
                                    echo "<form action='' method='post'> <tr>";
                                    foreach($resu as $r){
                                        $id = "$count" . "_" . "$tnouc";
                                        if ($count != 0){
                                            if (in_array($count, $estado_pos)){
                                                $c = "";
                                                if ($r){
                                                    $c = "checked";
                                                }
                                                echo "<td style='text-align:center;'>
                                                <input type='checkbox' name='"; echo $rkey[$count]; echo "' value='1' $c></td>
                                                ";
                                            } else {
                                                echo "<td><input type='text' name='"; echo $rkey[$count] ;echo "' value='"; echo ucfirst($r); echo "'></td></td>";
                                            }
                                            
                                            $hay_filas = true;
                                        }
                                        $count ++;
                                    }
                                    $count = 0;
                                    $tnouc++;

                                    if ($hay_filas){
                                        echo "<td><button name='editar_$id' value='$tableidcol' class='btn btn-warning'>EDITAR</button></td></form>";
                                    }
                                    echo '</tr>';
                                }
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
    </div>
</div>
</div>

<?php
    }
}




function get_fk_related_tables($table, $all_tables_with_col){
    $sql_result = execute_select($table);
    $rkey = array_keys($sql_result[0]);
    $fkkey = get_foreign_keys_or_id_from_table($rkey, true);

    $related_tables = [];
    foreach($fkkey as $fk){
        $t = array_search($fk, $all_tables_with_col);
        if ($t){
            array_push($related_tables, $t);
        }
    }
    
    if ($related_tables){
        $values = execute_view($table, only_tables: $related_tables, print_sql: false);
    } else {
        $result = execute_select($table);
    }

    $ids = [];

    if ($related_tables){
        $a = array_keys($values[0]);
        $a1 = get_foreign_keys_or_id_from_table($a);
        $a2 = get_foreign_keys_or_id_from_table($a, true);
        $fkkey = array_merge($a1, $a2, $fkkey);
        $fkkey = array_remove_dupe(array_values($fkkey));

        $id_col = get_foreign_keys_or_id_from_table($rkey, true);

        $result = [];
        foreach($values as $v){
            $temp = $v;
            foreach($fkkey as $fk){
                $temp = array_remove_by_key($fk, $temp);
            }
            array_push($result, $temp);
            
            $t = [];
            foreach($id_col as $id){
                $t[$id] = $v[$id];
            }
            array_push($ids, $t);
        }
     
    }
    return [$result, $related_tables, $ids];
}


?>
