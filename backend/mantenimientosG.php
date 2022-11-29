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
            $t = array_keys($_POST);
            $data = (explode("_", end($t)));
            $idcol = $data[0];
            $spec_id = $data[1];
            
            $ids = [];
            // var_dump($_POST);
            foreach($arr[2] as $zz){
                if ((int)$spec_id == $zz[$idcol]){
                    $ids = $zz;
                    break;
                }
            }
            if ($ids == []){
                $x = execute_select($arr[1][0], limit: 1)[0];
                $tab = array_keys($x);

                $set_values = [];
                foreach($tab as $col){
                    if (str_contains($col, "_fk")){
                        // Do nothing
                    } elseif (str_contains($col, "estado")){
                        if(in_array($col,array_keys($_POST))){
                            $set_values[$col] = true;
                        } else {
                            $set_values[$col] = false;
                        }

                    } elseif (in_array($col, array_keys($ids))){
                        // Do nothing
                    } else {
                        if (in_array($col, array_keys($_POST))){
                            $set_values[$col] = $_POST[$col];
                        }
                    }
                }

                $x = execute_update($arr[1][0], $set_values, [$idcol => $spec_id]);
            } else {
                $retrieve_cols = [];
                foreach($arr[1] as $tab){
                    $x = execute_select($tab, limit: 1);
                    $retrieve_cols[$tab] = array_keys($x[0]);
                }

                $to_update = [];
                foreach($retrieve_cols as $z => $tab){
                    $t = ["table" => $z];
                    $tt = [];
                    foreach($tab as $col){
                        if (str_contains($col, "_fk")){
                            // Do nothing
                        } elseif (str_contains($col, "estado")){
                            if(in_array($col,array_keys($_POST))){
                                $tt[$col] = true;
                            } else {
                                $tt[$col] = false;
                            }

                        } elseif (in_array($col, array_keys($ids))){
                            $t["id"] = [$col => $ids[$col]];
                        } else {
                            if (in_array($col, array_keys($_POST))){
                                $tt[$col] = $_POST[$col];
                            } elseif (str_contains($col, "id")){
                                $t["id"] = [$col => $spec_id];
                            }
                        }
                    }
                    $t["sets"] = $tt;
                    array_push($to_update, $t);
                }
                $ids[$idcol] = $spec_id;

                foreach($to_update as $upd){
                    $x = execute_update($upd["table"], $upd["sets"], $upd["id"]);
                }
            }

            // execute_update()

            // $temp = array_remove_by_key($fk, $temp);
            // str_contains($r, "estado")


            // echo "<BR>";
            // var_dump($to_update);
            // echo "<BR>";
            // echo "<BR>";
            // echo "<BR>";
            // var_dump($ids);
            // echo "<BR>";
            // echo "<BR>";
            // var_dump($retrieve_cols);
            // echo "<BR>";
            // echo "<BR>";
            // var_dump($data);
            // echo "<BR>";
            // echo "<BR>";
            // var_dump($_POST);
        }

        $arr = get_fk_related_tables($v, $tables_col);
        $resultados = $arr[0];







        


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
                            $hay_filas = false;

                            foreach($resultados as $resu){
                                if ($resu){
                                    //             idcol                 idvalue
                                    $tableidcol = $rkey[0] . "_" . array_values($resu)[0];

                                    echo "<form action='' method='post'> <tr>";

                                    foreach($resu as $r){

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
                                    if ($hay_filas){
                                        echo "<td><button name='$tableidcol' class='btn btn-warning'>EDITAR</button></td></form>";
                                    }
                                    echo '</tr>';

                                    $count = 0;

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
        $id_col = array_merge([$rkey[0]], $id_col);

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
        // var_dump($id_col);
     
    }
    return [$result, array_merge($related_tables, [$table]), $ids];
}


?>
