<?php 
	// Parametros a configurar para la conexion de la base de datos 
	$host = "us-cdbr-east-06.cleardb.net";    // sera el HOST v de nuestra BD 
	$basededatos = "heroku_607c4ead21a11f6";    // sera el Nombre de nuestra BD 
	$usuariodb = " b04805fc3016f3";    // sera el USER de nuestra BD 
	$clavedb = "3306";    // sera el PASS de nuestra BD 
	
    
    $tabla_db1 = "empleados"; 	   //Campo no necesario solo utilizo para pruebas  GADIEL CASCANTE 
	

	
	
	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);


	if ($conexion->connect_errno) {
	    echo "Nuestro sitio experimenta fallos....";

              #TODO agregar formulario de error
              
	    exit();
	}

?>