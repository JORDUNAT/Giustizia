<?php
	include_once('../clases/DatabaseClass.php');
	
	//Instanciar objeto para crear la conexión a la BD
	$datab		=	new DatabaseClass('giustizia','Localhost','JORDUNAT','Donald2904$');
	$conexion	=	$datab->connect();


	
?>
