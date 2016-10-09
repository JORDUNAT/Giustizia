<?php

// php Document
//Fecha creado: 14/07/2016
//Propósito: Crear Juzgado 

	session_start();

	header("Content-Type: text/html;charset=utf-8");
	echo "<meta charset='utf-8'>";

	require('conexion.php');

	$tipousuario=$_SESSION['s_tipusu'];
	$ususession=$_SESSION['s_usuario'];
	$Logo=$_SESSION['s_logo'];	

	$id				=$_POST['txt_item'];
	$juzgado 		=$conexion->real_escape_string(strtoupper($_POST['txt_juzgado']));
	$circuito 		=$conexion->real_escape_string(strtoupper($_POST['txt_circuito']));
	$distrito 		=$conexion->real_escape_string(strtoupper($_POST['txt_distrito']));
	$direccion 		=$conexion->real_escape_string(strtoupper($_POST['txt_direccion']));
	$telefono 		=$_POST['txt_telefono'];
	$contacto 		=$conexion->real_escape_string(strtoupper($_POST['txt_contacto']));
	$horario 		=$conexion->real_escape_string(strtoupper($_POST['txt_horario']));
	$TipJuz 		=$_POST['txt_TipJuz'];

	if ($tipousuario==1) {
		$query="UPDATE tbl_juzgados SET juz_Juzgado='$juzgado', juz_Circuito='$circuito', juz_Distrito='$distrito', juz_Direccion='$direccion', juz_Telefono='$telefono', juz_Contacto='$contacto', juz_HorarioAtencion='$horario', juz_TipoJuzgado='$TipJuz' WHERE (juz_Id='$id')";
		$resultado=$conexion->query($query);

		if($resultado>0){
			echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha guardado los cambios realizados al Juzgado '.$juzgado.' con el código '.$id;
			echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaJuzgados.php'>";		
		} else {
			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar un Juzgado, por favor contacta con el Administrador  </div>';
			echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaJuzgados.php'>";

		}
	}
	else
	{	
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span>Solo se puede modificar un Juzgado cuando se es Administrador</div>';		
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaJuzgados.php'>";

	}
?>
