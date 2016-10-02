<?php

// php Document
//Fecha creado: 14/06/2016
//Propósito: Crear municipio 

	session_start();


	header("Content-Type: text/html;charset=utf-8");
	require('../model/conexion.php');



	$oficina 			=$_SESSION['s_oficina'];
	$tipusuario			=$_SESSION['s_tipusu'];
	$id 				=($_POST['txt_codigo']);

	$largo = mb_strlen($id);

	if($id<100 AND $id>=10)
	{
		$codigo = '0'.$id;
	}
	elseif($id<10)
	{
		$codigo = '00'.$id;
	}
	else
	{
		$codigo = $id;
	}

	$departamento		=$_POST['txt_Departamento'];
	$municipio 			=$conexion->real_escape_string(strtoupper($_POST['txt_Municipio']));

	if($departamento<10)
	{
		$codigo = '0'.$departamento.$codigo;
	}
	else
	{
		$codigo = $departamento.$codigo;
	}

	if($largo<4)
	{
	if ($tipusuario==1) {
		$query="INSERT INTO tbl_municipios(muni_Codigo, muni_Departamento, muni_Municipio) VALUES ('$codigo', '$departamento', '$municipio')";
		$resultado=$conexion->query($query);

		if($resultado>0){
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaMunicipios.php'>";
		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha creado el municipio '.$municipio;
		}else{
		echo "<META HTTP-EQUIV='refresh' CONTENT='4; URL=../vistas/frm_ListaMunicipios.php'>";
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar este municipio, al parecer ya existe un municipio con el código que se está usando  </div>';
		}			


	}else{
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaMunicipios.php'>";
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar este municipio, Solo puede ser creado por un super usaurio  </div>';
	}

	}else
	{
		echo "<META HTTP-EQUIV='refresh' CONTENT='4; URL=../vistas/frm_ListaMunicipios.php'>";
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> El código del municipio es mayor a tres digitos, por favor verifica la información.  </div>';
	}


?>
