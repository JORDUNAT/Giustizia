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
	$direccion 			=$conexion->real_escape_string(strtoupper($_POST['txt_direccion']));
	$telefono 			=$conexion->real_escape_string($_POST['txt_telefono']);
	$celular 			=$conexion->real_escape_string($_POST['txt_celular']);
	$email 				=$conexion->real_escape_string(strtoupper($_POST['txt_email']));

if($ususession==$documento){
	$query="UPDATE tbl_usuarios SET usu_TipoDoc='$TipDoc', usu_Documento='$documento', usu_Nombres='$nombre', usu_Direccion='$direccion', usu_Email='$email', usu_Telefono='$telefono', usu_Celular='$celular'  WHERE (usu_Documento='$ususession')";
	$resultado=$conexion->query($query);

	if($resultado>0){
		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha guardado los cambios realizados a la oficina  '.$nombre;
		echo "<META HTTP-EQUIV='refresh' CONTENT='15; URL=../vistas/frm_Base.php'>";		
	} else {
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar los nuevos datos, comunicate con el Administrador de Giustizia.  </div>';
		echo "<META HTTP-EQUIV='refresh' CONTENT='15; URL=../vistas/frm_Base.php'>";	
	}
}
	else
	{
	echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span>Solo se puede modificar los datos de la Oficina Jurídica cuando se es Administrador</div>';		
	echo "<META HTTP-EQUIV='refresh' CONTENT='15; URL=../vistas/frm_Base.php'>";		
	}
?>