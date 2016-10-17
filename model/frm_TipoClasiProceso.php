<?php

// php Document
//Fecha creado: 14/06/2016
//Propósito: Crear Clasificación de Proceso

	session_start();


	header("Content-Type: text/html;charset=utf-8");
	require('../model/conexion.php');



	$oficina 			=$_SESSION['s_oficina'];
	$tipusuario			=$_SESSION['s_tipusu'];

	$qry = "SELECT MAX(clapro_Id) AS clapro_Id FROM tbl_clasificacionproceso";
	$proceso = $conexion->query($qry);

	if (!$proceso)	
	{
		die("error:".$qry); 
	}

	if($resultado = mysqli_fetch_assoc($proceso)){
			$nmax= $resultado['clapro_Id'];	
	}
	else{
		echo "<meta charset='utf-8'>";
		// header("Location: ../vistas/Index.php");
		echo '<div class="alert alert-danger">Lo sentimos pero no se pudo crear el tipo de proceso</div>';
	}

	$id 				=$nmax + 1;
	$descripcion1		=$conexion->real_escape_string(strtoupper($_POST['txt_descripcion']));
	$descripcion		= strtr($descripcion1, 'áéíóúñ', 'ÁÉÍÓÚÑ');

	if ($tipusuario==1) {
		$query="INSERT INTO tbl_clasificacionproceso(clapro_Id, clapro_ClasificacionProceso, clapro_Estado) VALUES ('$id', '$descripcion', '1')";
		$resultado=$conexion->query($query);

		if($resultado>0){
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaTipoProcesos.php'>";
		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha creado la Clasificación de Procesos '.$descripcion;
		}else{
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaTipoProcesos.php'>";
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar este Clasificación de Procesos, Comunicare con el administrador de Giustizia  </div>';
		}			


	}else{
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaTipoProcesos.php'>";
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar este Clasificación de Procesos, Solo puede ser creado por un super usaurio  </div>';
	}
	
?>
