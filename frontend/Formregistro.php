<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="/css/registro.css">
    <!-- <link rel="stylesheet" href="/css/cuerpoWeb.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>



<body class="registro">
    <div class="containerr">
        <div class="title">Registration</div>
        <div class="contentr">
            <form action="#">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Nombre</span>
                        <input type="text" placeholder="Ingresa tu nombre" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Fecha</span>
                        <input type="date" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Correo</span>
                        <input type="text" placeholder="Ingresa tu correo" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Numero de Telefono</span>
                        <input type="text" placeholder="Ingresa telefono" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Contraseña</span>
                        <input type="text" placeholder="Ingresa tu contraseña" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Repite la Contraseña</span>
                        <input type="text" placeholder="Repite la contraseña" required>
                    </div>
                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" id="dot-1">
                    <input type="radio" name="gender" id="dot-2">
                    <input type="radio" name="gender" id="dot-3">
                    <span class="gender-title">Genero</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Masculino</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Femenino</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">No Especificado</span>
                        </label>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Registrarse">
                </div>
                <div id="formFooter">
                    <a class="underlineHover" href="/index.php">Ya tengo una cuenta</a>

                </div>
            </form>
        </div>
    </div>

</body>



</html>