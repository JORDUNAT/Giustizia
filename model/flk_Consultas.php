

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
	$observaciones1 	=$conexion->real_escape_string(strtoupper($_POST['txt_observaciones']));
	$observaciones 		= strtr($observaciones1, 'áéíóúñ', 'ÁÉÍÓÚÑ');

	if($observaciones1=""){
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-floppy-remove"></span> Debes diligenciar en obseraciones las causas por las cuales se archvia la Consulta. ';
	}else{

		if($tipousuario<>'3' || $tipousuario<>'6'){
			$query="UPDATE tbl_consultas SET cons_Cuantia='$cuantia', cons_TipoAccion='$TipoAccion', cons_DetalleConsulta='$detalleconsulta', cons_Observaciones='$observaciones', 	cons_Estado='1' WHERE (cons_NoConsulta='$consulta')";
			$resultado=$conexion->query($query);

			if($resultado>0){
				echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha guardado los cambios realizados a la  consulta '.$consulta.', estamos preparando el expediente.';
				echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaConsultas.php'>";		
			} else {
				echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al archivar la Consulta, por favor contacta con el Administrador  </div>';
				echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaConsultas.php'>";

			}
		}
		else
		{	
			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span>No cuentas con los privilegios suficientes para archviar  una Consulta. </div>';		
			echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaConsultas.php'>";

		}
	}
?>