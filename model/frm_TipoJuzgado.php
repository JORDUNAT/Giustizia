<?php

// php Document
//Fecha creado: 14/06/2016
//Propósito: Crear tipo de juzgado 

	session_start();


	header("Content-Type: text/html;charset=utf-8");
	require('../model/conexion.php');



	$oficina 			=$_SESSION['s_oficina'];
	$tipusuario			=$_SESSION['s_tipusu'];

	$qry = "SELECT MAX(tipjuz_Id) AS tipjuz_Id FROM tbl_tipojuzgado";
	$proceso = $conexion->query($qry);

	if (!$proceso)	
	{
		die("error:".$qry); 
	}

	if($resultado = mysqli_fetch_assoc($proceso)){
			$nmax= $resultado['tipjuz_Id'];	
	}
	else{
		echo "<meta charset='utf-8'>";
		// header("Location: ../vistas/Index.php");
		echo '<div class="alert alert-danger">Lo sentimos pero no se pudo crear el tipo de proceso</div>';
	}

	$id 				=$nmax + 1;
	$descripcion		=$conexion->real_escape_string(strtoupper($_POST['txt_descripcion']));

	if ($tipusuario==1) {
		$query="INSERT INTO tbl_tipojuzgado(tipjuz_Id, tipjuz_TipoJuzgado) VALUES ('$id', '$descripcion')";
		$resultado=$conexion->query($query);

		if($resultado>0){
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaTipoJuzgado.php'>";
		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha creado el tipo de juzgado '.$descripcion;
		}else{
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaTipoJuzgado.php'>";
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar este tipo de juzgado, Comunicate con el administrador de Giustizia  </div>';
		}			


	}else{
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaTipoJuzgado.php'>";
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar este tipo de juzgado, Solo puede ser creado por un super usaurio  </div>';
	}

?>
