<?php 
include_once('../backend/phpfunctions/jugadasFunctions.php');


?> <form  method="POST" action="">
<select name="lotsSelect" id="lotsSelect" class="lotsSelect" onchange="this.form.submit()">
                        <option value="" disable selected="selected">Seleccione una Lotería</option>
                        <?php
                       
                        
                        foreach($todo_loteria as $lotsitem){
                            echo "<option value='$lotsitem'>$lotsitem</option>";
                        }
        ?>

                    </select>

                    <select name="SortSelect" id="SortSelect" class="lotsSelect" onchange="this.form.submit()" >
                        <option value="" disable selected="selected">Seleccione sorteo</option>
                        <?php

                    
                        
                        foreach($todo_sorteo as $sorteitem){
                            echo "<option value='$sorteitem'>$sorteitem</option>";
                        }
        ?>
                    </select>
                    
                   </form>

                   <?php
  
  if(isset($_POST['submit'])){
        $selectlots=$_POST['lotsSelect'];
        echo "wtf".$selectlots;
        
        

 
  if(isset($_POST['submit'])){
  
        $selectSorts=$_POST['lotsSelect'];
        echo "wtf".$selectSorts;
        
        
               

    
  
  }
  $all= ($todo_combinado[$selectlots][$selectSorteo]);
  
  var_dump($all);
  echo $all;
}
    ?>