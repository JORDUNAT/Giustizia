<?php 
	session_start();

	require('../model/conexion.php');

	$oficina=$_SESSION['s_oficina'];

	$formatos = array('.png');

	$result = 0;

	$nameimagen = $_FILES['file']['name'];
	$tmpimagen = $_FILES['file']['tmp_name'];
	$extimagen = substr($nameimagen, strrpos($nameimagen, '.'));
	$urlnueva  = "../archivos_subidos/".$oficina."/Logo".$oficina.$extimagen;

	if(in_array($extimagen,$formatos)){
		if(move_uploaded_file($tmpimagen, $urlnueva)){
			$qry = "UPDATE tbl_usuarios SET usu_Logo = '$urlnueva' WHERE usu_Consultorio = '$oficina'";
			$proceso = $conexion->query($qry);
			$_SESSION['s_logo']=$urlnueva;
			echo "Se ha realizado el cambio del logo correctamente";	
			echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/frm_Cargarlogo.php'>";						
		}else{
				echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/frm_Cargarlogo.php'>";				
		}	
	}else{
		echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/frm_Cargarlogo.php'>";	
	}
?>
