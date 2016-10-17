<?php

// php Document
//Fecha creado: 14/06/2016
//Propósito: Crear tipo de acción 

	session_start();


	header("Content-Type: text/html;charset=utf-8");
	require('../model/conexion.php');



	$oficina 			=$_SESSION['s_oficina'];
	$tipusuario			=$_SESSION['s_tipusu'];

	$descripcion1		=$conexion->real_escape_string(strtoupper($_POST['descripcion']));
	$descripcion		= strtr($descripcion1, 'áéíóúñ', 'ÁÉÍÓÚÑ');

	if ($tipusuario==1) {
		$query="INSERT INTO tbl_tipoaccion(TipAcc_TipoAccion, TipAcc_Estado) VALUES ('$descripcion', '1')";
		$resultado=$conexion->query($query);

		if($resultado>0){
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaTipoaccion.php'>";
		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha creado el tipo de acción '.$descripcion;
		}else{
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaTipoaccion.php'>";
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar este tipo de acción, Comunicare con el administrador de Giustizia  </div>';
		}			


	}else{
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaTipoaccion.php'>";
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar este tipo de acción, Solo puede ser creado por un super usaurio  </div>';
	}

?>
