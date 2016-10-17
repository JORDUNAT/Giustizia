<?php

// php Document
//Fecha creado: 14/07/2016
//Propósito: Crear Juzgado 

	session_start();


	header("Content-Type: text/html;charset=utf-8");
	require('../model/conexion.php');



	$oficina 			=$_SESSION['s_oficina'];
	$tipusuario			=$_SESSION['s_tipusu'];

	$qry = "SELECT MAX(juz_Id) AS juz_Id FROM tbl_juzgados";
	$proceso = $conexion->query($qry);

	if (!$proceso)	
	{
		die("error:".$qry); 
	}

	if($resultado1 = mysqli_fetch_assoc($proceso)){
			$nmax= $resultado1['juz_Id'];	
	}
	else{
		echo "<meta charset='utf-8'>";
		// header("Location: ../vistas/Index.php");
		echo '<div class="alert alert-danger">Lo sentimos pero no se pudo crear el tipo de proceso</div>';
	}

	$id 			=$nmax + 1;
	$juzgado1 		=$conexion->real_escape_string(strtoupper($_POST['txt_juzgado']));
	$juzgado 	 	= strtr($juzgado1, 'áéíóúñ', 'ÁÉÍÓÚÑ');
	$circuito1 		=$conexion->real_escape_string(strtoupper($_POST['txt_circuito']));
	$circuito 	 	= strtr($circuito1, 'áéíóúñ', 'ÁÉÍÓÚÑ');
	$distrito1 		=$conexion->real_escape_string(strtoupper($_POST['txt_distrito']));
	$distrito 	 	= strtr($distrito1, 'áéíóúñ', 'ÁÉÍÓÚÑ');
	$direccion1		=$conexion->real_escape_string(strtoupper($_POST['txt_direccion']));
	$direccion 		= strtr($direccion1, 'áéíóúñ', 'ÁÉÍÓÚÑ');
	$telefono 		=$_POST['txt_telefono'];
	$contacto 		=$conexion->real_escape_string(strtoupper($_POST['txt_contacto']));
	$horario 		=$conexion->real_escape_string(strtoupper($_POST['txt_horario']));
	$TipJuz 		=$_POST['txt_TipJuz'];

	if ($tipusuario==1) {
		$query="INSERT INTO tbl_juzgados(juz_Id, juz_Juzgado, juz_Circuito, juz_Distrito, juz_Direccion, juz_Telefono, juz_Contacto, juz_HorarioAtencion, juz_TipoJuzgado) VALUES ('$id', '$juzgado', '$circuito', '$distrito', '$direccion', '$telefono', '$contacto', '$horario', '$TipJuz')";
	$resultado=$conexion->query($query);

		if($resultado>0){
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaJuzgados.php'>";
		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha creado el juzgado '.$juzgado;
		}else{
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaJuzgados.php'>";	
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar este juzgado, Comunicare con el administrador de Giustizia  </div>';
		}			


	}else{
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaJuzgados.php'>";
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar este Juzgado, Solo puede ser creado por un super usaurio  </div>';
	}

?>
