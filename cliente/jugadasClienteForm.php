<div class=".container">

    <div class=".row">
        <div class="bheder">
            <h1 style="text-align:center; "> VENTA DE TICKET</h1>
        </div>

    </div>
    <form action="#" method="POST" class="form-grp">
        <div class=".row">

            <div class="papa">
                <div class="bebe">
                    <h2>Selecione Su Loteria</h2>
                    <select name="lotsSelect" id="lotsSelect" class="lotsSelect" place>
                        <option value="">Seleccione una Lotería</option>
                        <option value="Leidsa">Leidsa</option>
                        <option value="Nacional">Nacional</option>
                        <option value="Real">Real</option>
                        <option value="Loteka">Loteka</option>
                    </select>
                </div>

                <div class="bebe">

                <fieldset>
                    <legend>
                        <h2>Selecione Su Tipo de Jugada</h2>
                    </legend>

                    <div>
                        <div class="bebe">
                            <input type="radio" id="pata" name="tipo" value="pata" checked>
                            <label for="pata">Pata</label>
                        </div>

                        <div class="bebe">
                        <input type="radio" id="pale" name="tipo" value="pale">
                        <label for="pale">Palé</label>
                    </div>
                        <div class="bebe">
                        <input type="radio" id="tripleta" name="tipo" value="tripleta">
                        <label for="tripleta">Tripleta</label>
                    </div>
                </fieldset>
                
                </div>

                

                <div class="bebe">
                    <div class="papa">
                        <div class="bebe">
                            <H6> JUGADA</H2>
                        </div>
                        <div class="bebe">
                            <H6>MONTO </H2>
                        </div>
                    </div>

                    <form action="" method="POST">
                        <div class=".row">
                            <input type="text" class="bebecito" name="jugada1" placeholder="NUMERO A JUGAR""></input>
                        <input type=" text" class="bebecito" name="jugada1" placeholder="MONTO""> </input>
                    </div>
                 
                    <div class=" .row">
                            <input type="text" class="bebecito" name="jugada2" placeholder="NUMERO A JUGAR""></input>
                        <input type=" text" class="bebecito" name="jugada2" placeholder="MONTO""> </input>
                   </div>

                    
                    <div class=" .row">
                            <input type="text" class="bebecito" name="jugada2" placeholder="NUMERO A JUGAR""></input>
                        <input type=" text" class="bebecito" name="jugada2" placeholder="MONTO""> </input>
                    </form>
                </div>
                

            </div>
            
        </div>
        <div class=" bebe" style="justify-content: flex-end">

                            <input type="button" class="bebecitoButton" name="jugada2" placeholder="NUMERO A JUGAR"
                                value="Enviar"></input>
                        </div>


                </div>
            </div>
    </form>