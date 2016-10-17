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
	


	$Id 			= ($_POST['txt_id'])*1;
	$Codigo			= $_POST['txt_id'];
	$departamento1 	= $conexion->real_escape_string(strtoupper($_POST['txt_descripcion']));
	$departamento 	= strtr($departamento1, 'áéíóúñ', 'ÁÉÍÓÚÑ');
	$capital 		= $conexion->real_escape_string(strtoupper($_POST['txt_capital']));


if($tipousuario==1){
	$query="UPDATE tbl_departamentos SET depa_Departamento='$departamento', depa_Capital='$capital' WHERE (depa_Id='$Id')";
	$resultado=$conexion->query($query);

	if($resultado>0){
		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha guardado los cambios realizados al Departamento con código '.$Id;
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaDepartamentos.php'>";		
	} else {
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar un Departamento, por favor contacta con el Administrador  </div>';
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaDepartamentos.php'>";

	}
}
	else
	{	echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span>Solo se puede modificar un Departamento cuando se es Administrador</div>';		
	echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaDepartamentos.php'>";

	}
?>