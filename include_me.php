<?php

function include_me(string $filename, string $path = "E:\\xampp\\htdocs"){
    /* 
        funcion para realizar include_once con facilidad. Lamentablemente hay que
        incluir esta funcion tambien pero se hace de manera sencilla.

        Ejemplo de su uso
        include_once("E:\\xampp\\htdocs\\include_me.php");      // Para incluir esta funcion
        include_once(include_me("llavesYTextos.php"));          // incluir el archivo llavesYTextos.php

        @param $filename    string      El nombre del archivo que quieres include_once con su extension
        Case-Sensitive                  Ejemplos:
                                        inicioCliente.php
                                        F1.jpg
                                        carritoFunctions.php
    
    */

    $files = scandir($path);
    // echo $path;
    // echo "<br>";
    $v = "";
    foreach($files as $f){
        if (!in_array($f, [".", "..", ".git", ".vscode", ".gitignore"])){
            // echo $f;
            // echo "<br>";
            $new_path = $path . "\\$f";
            if (is_dir($new_path)){
                $v = include_me($filename, $new_path);
            }
            if ($f == $filename){
                return $new_path;
            } elseif ($v){
                return $v;
            }
        }
    }
    return "";
}

//echo include_me("dbConstruct.php");

?>




