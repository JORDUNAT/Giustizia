<?php

// php Document
//Fecha creado: 14/06/2016
//Propósito: Crear tipo de documento 

	session_start();


	header("Content-Type: text/html;charset=utf-8");
	require('../model/conexion.php');



	$oficina 			=$_SESSION['s_oficina'];
	$tipusuario			=$_SESSION['s_tipusu'];

	$qry = "SELECT MAX(tipdoc_Id) AS tipdoc_Id FROM tbl_tipodocumento";
	$proceso = $conexion->query($qry);

	if (!$proceso)	
	{
		die("error:".$qry); 
	}

	if($resultado = mysqli_fetch_assoc($proceso)){
			$nmax= $resultado['tipdoc_Id'];	
	}
	else{
		echo "<meta charset='utf-8'>";
		// header("Location: ../vistas/Index.php");
		echo '<div class="alert alert-danger">Lo sentimos pero no se pudo crear el tipo de proceso</div>';
	}

	$id 				=$nmax + 1;
	$descripcion		=$conexion->real_escape_string(strtoupper($_POST['txt_descripcion']));

	if ($tipusuario==1) {
		$query="INSERT INTO tbl_tipodocumento(tipdoc_Id, tipdoc_Descripcion) VALUES ('$id', '$descripcion')";
		$resultado=$conexion->query($query);

		if($resultado>0){
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaTipoDocumento.php'>";
		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha creado el tipo de documento '.$descripcion;
		}else{
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaTipoDocumento.php'>";
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar este tipo de documento, Comunicare con el administrador de Giustizia  </div>';
		}			


	}else{
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaTipoDocumento.php'>";
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar este tipo de documento, Solo puede ser creado por un super usaurio  </div>';
	}

?>
