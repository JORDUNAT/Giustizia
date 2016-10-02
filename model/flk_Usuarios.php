<?php
// JavaScript Document
//Fecha creado: 27/09/2015
//Propósito: Editar usuarios empleados de la oficina desde el adminsitrador 
//           Adicionalmente el perfil secretario(a) podrá modificar los clientes pero no los usuarios

	session_start();

	header("Content-Type: text/html;charset=utf-8");
	echo "<meta charset='utf-8'>";

	if(isset($_SESSION['s_usuario'])){ 
		$sesion = True;
	}
	else{
		$sesion = False;
	}

	$tipousuario=$_SESSION['s_tipusu'];
	$ususession=$_SESSION['s_usuario'];
	$Logo=$_SESSION['s_logo'];	
	
	require('conexion.php');

	$TipDoc 			=$_POST['sel_TipDoc'];
	$documento 			=$_POST['txt_documento'];
	$nombre 			=$conexion->real_escape_string(strtoupper($_POST['txt_nombre']));
	$apellidos 			=$conexion->real_escape_string(strtoupper($_POST['txt_apellidos']));
	$telefono 			=$conexion->real_escape_string($_POST['txt_telefono']);
	$celular 			=$conexion->real_escape_string($_POST['txt_celular']);
	$email 				=strtoupper($_POST['txt_email']);
	$genero 			=$_POST['txt_genero'];
	$tipusu 			=$_POST['sel_tipusu'];
	$estado 			=$_POST['sel_estado'];


//Actualización de la tabla tbl_usuarios con las modificaciones realizadas
if($tipousuario=='1' || $tipousuario=='5' || $ususession==$documento){
	$query="UPDATE tbl_usuarios SET usu_TipoDoc='$TipDoc', usu_Documento='$documento', usu_Nombres='$nombre', usu_Apellidos='$apellidos', usu_Email='$email', usu_tipusu='$tipusu', usu_Estado='$estado', usu_Genero='$genero', usu_Telefono='$telefono', usu_Celular='$celular', usu_logo='$Logo'  WHERE (usu_Documento='$documento')";
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
	//Mensaje de error
	echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span>Solo se puede modificar  un Usuario cuando se es Administrador o cuando se es el usuario que se esta modificando </div>';		
	echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaUsuarios.php'>";
	}
?>