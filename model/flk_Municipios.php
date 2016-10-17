<?php	
// PHP
//Fecha creado: 27/06/2016
//Propósito: Modificación Municipios

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
	


	$Id 			=($_POST['txt_id']);
	$municipio1 	=$conexion->real_escape_string(strtoupper($_POST['txt_descripcion']));
	$municipio 	 	= strtr($municipio1, 'áéíóúñ', 'ÁÉÍÓÚÑ');


if($tipousuario==1){
	$query="UPDATE tbl_municipios SET muni_Municipio='$municipio' WHERE (muni_Codigo='$Id')";
	$resultado=$conexion->query($query);

	if($resultado>0){
		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha guardado los cambios realizados al Municipio con el código '.$Id;
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaMunicipios.php'>";		
	} else {
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar un Municipio, por favor contacta con el Administrador  </div>';
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaMunicipios.php'>";

	}
}
	else
	{	echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span>Solo se puede modificar un Municipio cuando se es Administrador</div>';		
	echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaMunicipios.php'>";

	}
?>