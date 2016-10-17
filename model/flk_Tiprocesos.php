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
	


	$Id 			=$_POST['txt_id'];
	$tipproceso1 	=$conexion->real_escape_string(strtoupper($_POST['txt_descripcion']));
	$tipproceso		= strtr($tipproceso1, 'áéíóúñ', 'ÁÉÍÓÚÑ');


if($tipousuario==1){
	$query="UPDATE tbl_clasificacionproceso SET clapro_ClasificacionProceso='$tipproceso' WHERE (clapro_Id='$Id')";
	$resultado=$conexion->query($query);

	if($resultado>0){
		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha guardado los cambios realizados a la Clasificación de Procesos No. '.$Id;
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaTipoProcesos.php'>";		
	} else {
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar la Clasificación, por favor contacta con el Administrador  </div>';
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaTipoProcesos.php'>";

	}
}
	else
	{	echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span>Solo se puede modificar  un Tipo de Proceso cuando se es Administrador</div>';		
	echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaTipoProcesos.php'>";

	}
?>