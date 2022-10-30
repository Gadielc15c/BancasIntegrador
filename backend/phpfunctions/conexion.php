<?php 
	// Parametros a configurar para la conexion de la base de datos 
	
function conectar(){
	$host = "us-cdbr-east-06.cleardb.net";    // sera el HOST v de nuestra BD 
	$basededatos = "heroku_607c4ead21a11f6";    // sera el Nombre de nuestra BD 
	$usuariodb = "b04805fc3016f3";    // sera el USER de nuestra BD 
	$clavedb = "ca4df059";    // sera el PASS de nuestra BD 
	
	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);
	
	if  ($conexion->connect_errno) {
	    echo "Nuestro sitio experimenta fallos....";
		die("Connection failed: " . $conexion->connect_error);
              #TODO agregar formulario de error
              
	    exit();
	}
	return $conexion;

}

function ejecutarQuery($q, $input){
	$con = conectar();
	$q = $con -> prepare($q);
	$q->execute($input);
	return $q->get_result();
}
	






?>



