<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <h2 class="active"> Iniciar </h2>


        <form action="#" method="POST" class="form-grp" onsubmit="ValidarEmpty()">
            <p id="ERROR"></p>
            <input type="text" id="login" class="fadeIn second" name="usuario" placeholder="Usuario">
            <i class="fa fa-times u_times"></i>
            <i class="fa fa-check u_check"></i>
            <input type="password" id="password" class="fadeIn third" name="clave" placeholder="Contraseña">
            <i class="fa fa-times p_times"></i>
            <i class="fa fa-check p_check"></i>
            <input type="submit" class="fadeIn fourth" value="Entrar" name="login-btn">
        </form>
        <div id="formFooter">
            <a class="underlineHover" href="../frontend/Formregistro.php">REGISTRATE</a>

        </div>
        <div id="formFooter">
            <a class="underlineHover" href="#">Olvidaste tu contraseña?</a>

        </div>

    </div>
</div>
</div>