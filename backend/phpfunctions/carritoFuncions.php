
<?php 
include('../backend/MetodoPagForm.php');
function shoppingMaker(
$loteria,
$sorteo,
$total,
$jugad,
$tipo,
$monto,
$fec,
$img,
)
{

    $array=[$loteria,$sorteo,$total,$jugad,$tipo,$monto,$fec,$img];

  
   
echo '

    <div class="Letrero">
        <h3 class="Caco">JUGADAS REALIZADAS</h3>
     
    </div>


     <!-- ITERAR SI HAY MAS DE 1 -->

     <div class="col">
        <div class="jugadaContainer">
            <div class="loteryImg">

                <img src="/img/Logo.png" style="height:250px" />
            </div>
            <div class="row"> 
                <div class="detalle">
                    <h1 class="loteria">Loteria: '; echo $loteria; echo '</h1>
                    <h1 class="sorteo">Sorteo: '; echo $sorteo; echo ' </h1>
                    <h3 class="Fecha">'; echo $fec; echo '</h3>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <h3 class="Jugada">JUGADA</h3>
                            </div>
                            <div class="col">
                                <h3 class="Jugada">TIPO</h3>
                            </div>
                            <div class="col">
                                <h3 class="Jugada">MONTO</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h3 class="Jugada">';
                         
                                foreach ($jugad as $num){
                                   
                                    echo $num; 
                                   
                                    if(next($jugad)) {
                                        echo'-';
                                   }

                                }
                                
                             echo '</h3>
                            </div>
                            <div class="col">
                                <h3 class="Jugada">'; echo $tipo; echo '</h3>
                            </div>
                            <div class="col">
                                <h3 class="Jugada">RD$ '; echo $monto; echo '</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="montitos">
                    <div class="monto">TOTAL: RD$ '; echo $total; echo '</div>
                    

                </div>
            </div>

        </div>
     
    </div>
    <hr> 
 <div class="pagarto">

 
 <form action="../backend/MetodoPagForm.php">


 <input type="submit" value="PAGAR" class="boton" ">
 </form>
 </div>

';

function retornable($array){
$array=

}
}
return 

?>

