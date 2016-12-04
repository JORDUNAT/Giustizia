<?php
	/*Enlace la capa del modelo
	
	Fecha creado:02/09/2015*/
	include_once('conexion.php');

	//Cargue de parámetros desde Ajax
	if (isset($_POST['ajax']))
	{
		$vals 	=	$_POST[''];
		$params = 	json_decode($vals,TRUE);
	}
	

	//Clases del modelo
	class ModelEstados
	{	


		function getEstados($conexion)
		{
			$html_combo = "";
			$qrytd="SELECT * FROM tbl_estados"; // Sleccion de Tipo de Usuario
			$qry = $conexion->query($qrytd);
			

			while ($estadousuario = $qry->fetch_assoc())
			{
				$html_combo .= "<option   value='".$estadousuario['estado_Id']."'>".$estadousuario['estado_Estado']."</option>";
			}

			return $html_combo;
		}
	
		// Hasta aqui
	}
?>