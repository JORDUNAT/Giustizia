<?php

// php Document
//Fecha creado: 14/06/2016
//Propósito: Crear departamento 

	session_start();


	header("Content-Type: text/html;charset=utf-8");
	require('../model/conexion.php');



	$oficina 			=$_SESSION['s_oficina'];
	$tipusuario			=$_SESSION['s_tipusu'];
	$id 				=($_POST['txt_codigo']);

	if($id<10){
		$codigo = '0'.$id;
	}else{
		$codigo = $id;
	}

	$departamento1	=$conexion->real_escape_string(strtoupper($_POST['txt_departamento']));
	$departamento 	= strtr($departamento1, 'áéíóúñ', 'ÁÉÍÓÚÑ');
	$capital1 		=$conexion->real_escape_string(strtoupper($_POST['txt_capital']));
	$capital 	 	= strtr($capital1, 'áéíóúñ', 'ÁÉÍÓÚÑ');

	if ($tipusuario==1) {
		$query="INSERT INTO tbl_departamentos(depa_Id, depa_Codigo, depa_Departamento, depa_Capital) VALUES ('$id',  '$codigo', '$departamento', '$capital')";
		$resultado=$conexion->query($query);

		if($resultado>0){
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaDepartamentos.php'>";
		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha creado el departamento '.$departamento;
		}else{
		echo "<META HTTP-EQUIV='refresh' CONTENT='4; URL=../vistas/frm_ListaDepartamentos.php'>";
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar este departamento, al parecer ya existe un departamento con el código que se está usando  </div>';
		}			


	}else{
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaDepartamentos.php'>";
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar este departamento, Solo puede ser creado por un super usaurio  </div>';
	}

?>
