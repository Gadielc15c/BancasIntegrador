
 
<?php 

function shoppingMaker(
$cant,
$loteria,
$sorteo,
$total,
$jugad,
$tipo,
$monto,
$fec,
$img,
$keyed_array,
$id,
$poster
)
{

    $_SESSION['arrayT']=$keyed_array;

echo '
<div class="col">

<form action="../backend/MetodoPagForm.php">

  <div class="jugadaContainer">
    <div class="loteryImg">
      <img src="'; echo $img; echo '" style="height: 250px" />
    </div>
    <div class="row">
      <div class="detalle">
        <h1 class="loteria">Loteria: '; echo $loteria; echo '</h1>
        <h1 class="sorteo">Sorteo: '; echo $sorteo; echo '</h1>
        <h3 class="Fecha">'; echo $fec; echo '</h3>
        <div class="col">
          <div class="row">
            <div class="col">
              <h3 class="Jugada">Tickets</h3>
            </div>
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
              <h3 class="Jugada">'; echo $cant; echo '</h3>
              
 '; echo '

            </div>
            <div class="col">
              <h3 class="Jugada">'; echo $jugad; echo '</h3>
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
        <div class="control-group">
            <input type="checkbox"/> 
            <div class="control_indicator"></div>
          
        </div>
        
      </div>
      
    </div>   
    <input type="hidden" id="input-';echo strval($id); echo'" name="title" value="';

     foreach($poster as $array){
      echo$array;
      echo"-";
      
          }
          echo '">
    <div class="pagarto">
  
    <input id="'; echo $id; echo '" onClick="idsender(this.id)"value=" PAGAR" class="boton" >
    
  </form>
  
  <hr />
</div>

  </div>
</div>

 

';


}


?>

