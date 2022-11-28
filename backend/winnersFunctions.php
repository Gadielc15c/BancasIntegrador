<?php /*Cambio a ver klk */
function winners($nombreLoteria, $jugada, $fecha, $img, $resultado,$premiado){
    $buttonMaker=false;
    echo '
    
            <div class="col">
<div class="contLots">
    <form action="#">
        <div class="contLots1">
            <h1 class="lotsnName">';echo $nombreLoteria;  echo '</h1>
        </div>
        
        <h3 class="lotsDate">Fecha:';echo $fecha; echo '</h3>
        <div class="contLots2">
            <h1 class="nomjugada"><ion-icon name="paper"></ion-icon>Jugada: '; echo $jugada; echo '</h1>
            <img class="imgLots" src="';echo $img; echo'" alt="">
        </div>
      
        <div class="bolasConten"> ';  

        $Nopre=array_diff($resultado,$premiado); // el orden importa para determinar el reciduop
       


        foreach ($premiado as $prem){
        foreach ($resultado as $val) {
       
               
            if ($val==$prem){
            echo '<span class="bola2win">'; echo $val; echo '</span>'
            ;$buttonMaker=true;
        }else{
            foreach(  $Nopre as $perdidos){
                echo '<span class="bolalose">'; echo $perdidos; echo '</span>'
                    ;}
            ;}  
            }
        ;}if ($buttonMaker!=true){

        }else{
            echo '<input type="submit" class="btn btn-success" value="COBRAR" style="margin-left:20px">
            </form>'
            
        ;}
        echo 
        
        '

        </div>
        
</div></div>
';}

?>