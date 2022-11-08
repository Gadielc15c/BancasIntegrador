<?php 
function lotsScramp($nombreLoteria, $jugada, $fecha, $img, $resultado){
    echo '
<div class="contLots">
    <form action="#">
        <div class="contLots1">
            <h1 class="lotsnName">';echo $nombreLoteria; echo '</h1>
        </div>
        
        <h3 class="lotsDate">';echo $fecha; echo '</h3>
        <div class="contLots2">
            <h1 class="nomjugada">Jugada: '; echo $jugada; echo '</h1>
            <img class="imgLots" src="';echo $img; echo'" alt="">
        </div>
      
        <div class="bolasConten"> ';  
        ;'<';
        foreach ($resultado as $val) {
           

            ;echo '<span class="bola1">'; echo $val; '</span>'
            
             
          
        ;}'
                   
        
</div>
</form>
';}

?>