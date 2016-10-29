

<?php	
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
	


	$consulta 			=$_POST['txt_consulta'];
	$cuantia 			=$_POST['txt_cuantia'];
	$TipoAccion			=$_POST['txt_TipAcc'];
	$detalleconsulta1	=$conexion->real_escape_string(strtoupper($_POST['txt_detaconsulta']));
	$detalleconsulta	= strtr($detalleconsulta1, 'áéíóúñ', 'ÁÉÍÓÚÑ');
	$observaciones1 	=$conexion->real_escape_string(strtoupper($_POST['txt_observaciones1']));
	$observaciones 		= strtr($observaciones1, 'áéíóúñ', 'ÁÉÍÓÚÑ');


if($tipousuario<>'3' || $tipousuario<>'6'){
	$query="UPDATE tbl_consultas SET cons_NoConsulta='$consulta', usu_Documento='$documento', usu_Nombres='$nombre', usu_Apellidos='$apellidos', usu_Email='$email', usu_FechaNacimiento='$fecha', usu_Genero='$genero', usu_Direccion='$direccion', usu_Telefono='$telefono', usu_Celular='$celular', usu_Estado='$estado'  WHERE (usu_Documento='$documento')";
	$resultado=$conexion->query($query);

	if($resultado>0){
		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha guardado los cambios realizados al usuario '.$nombre.' '.$apellidos;
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaClientes.php'>";		
	} else {
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar Cliente, por favor contacta con el Administrador  </div>';
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaClientes.php'>";

	}
}
	else
	{	echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span>Solo se puede modificar  un Cliente cuando se es Administrador o cuando se es el usuario que se esta modificando </div>';		
	echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaClientes.php'>";

	}
?>