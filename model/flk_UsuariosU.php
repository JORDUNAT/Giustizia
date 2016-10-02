<?php

// php Document
//Fecha creado: 28/09/2015
//Propósito: Editar usuario, este formulario le permitirá al usuario modificar sus datos pero no los de otros usuraios

	session_start();

	header("Content-Type: text/html;charset=utf-8");
	echo "<meta charset='utf-8'>";

	require('conexion.php');
	
	if(isset($_SESSION['s_usuario'])){
		$sesion = True;
	}
	else{
		$sesion = False;
	}

	$tipousuario=$_SESSION['s_tipusu'];
	$ususession=$_SESSION['s_usuario'];
	$Logo=$_SESSION['s_logo'];	
	


	$TipDoc 			=$_POST['sel_TipDoc'];
	$documento 			=$_POST['txt_documento'];
	$nombre 			=$conexion->real_escape_string(strtoupper($_POST['txt_nombre']));
	$apellidos 			=$conexion->real_escape_string(strtoupper($_POST['txt_apellidos']));
	$telefono 			=$conexion->real_escape_string($_POST['txt_telefono']);
	$celular 			=$conexion->real_escape_string($_POST['txt_celular']);
	$email 				=strtoupper($_POST['txt_email']);
	$genero 			=$_POST['txt_genero'];


if($ususession==$documento){
	$query="UPDATE tbl_usuarios SET usu_TipoDoc='$TipDoc', usu_Documento='$documento', usu_Nombres='$nombre', usu_Apellidos='$apellidos', usu_Email='$email',  usu_Genero='$genero', usu_Telefono='$telefono', usu_Celular='$celular'  WHERE (usu_Documento='$documento')";
	$resultado=$conexion->query($query);

	if($resultado>0){
		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha guardado los cambios realizados al usuario '.$nombre.' '.$apellidos;
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaUsuarios.php'>";		
	} else {
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar usuario, el usario ya está creado  </div>';
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaUsuarios.php'>";	
	}
}
	else
	{
	echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span>Solo se puede modificar  un Usuario cuando se es Administrador o cuando se es el usuario que se esta modificando </div>';		
	echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaUsuarios.php'>";		
	}
?>