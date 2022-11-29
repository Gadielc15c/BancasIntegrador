<?php /*Cambio a ver klk */
function winners($nombreLoteria, $jugada, $fecha, $img, $numeros,$ver){
    
    echo '
    
         
<div class="contLots" style="margin-left:8vw;">
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

        // $Nopre=array_diff($resultado,$premiado); // el orden importa para determinar el reciduop
       
        foreach ($numeros as $val) {
  
                if($val[0]!=" "){
            echo '<span class="bolalose">'; echo $val[0]; echo '</span>'
            
            
      
                
                  
            
        ;}if($ver){
           
            echo '<span class="bola2win">'; echo $val[1]; echo '</span>';
            echo '<input type="submit" class="btn btn-success" value="COBRAR" style="margin-left:20px">
            </form>'
            
        ;}else{
            echo '<div class="contLots1">
            <h1 class="lotsnName">NO SE HA SACADO NADA</h1>
        </div>'
        ;}}
        echo'

        </div>
        
</div>
'
;}

?>