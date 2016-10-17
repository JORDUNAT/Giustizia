<?php
// php Document
//Fecha creado: 13/12/2015
//Propósito: Registro de Cliente, permite que un cliente registre una consutla seleccionando la oficina de su preferencia de acuerdo a la dirección

	session_start();

	header("Content-Type: text/html;charset=utf-8");
	require('../model/conexion.php');
	require('../PHPMailer/PHPMailerAutoload.php');


	$mail 				= new PHPMailer;
	$mail2 				= new PHPMailer;
	
	if(isset($_SESSION['s_usuario'])){
		$sesion = True;
	}
	else{
		$sesion = False;
	}

	$oficina 			=$_SESSION['s_oficina'];
	$atendidopor		=$_SESSION['s_usuario'];
	$tipousuario		=$_SESSION['s_tipusu'];


	$cliente      		= $conexion->real_escape_string($_POST['sel_cliente']);
	$TipAcc		  		= $conexion->real_escape_string($_POST['sel_TipAcc']);
	$abogado			= $conexion->real_escape_string($_POST['sel_abogado']);	           
	$cuantia      		= $conexion->real_escape_string($_POST['txt_cuantia']);
	$detaconsulta1   	= $conexion->real_escape_string(strtoupper($_POST['txt_detaconsulta']));
	$detaconsulta 		= strtr($detaconsulta1, 'áéíóúñ', 'ÁÉÍÓÚÑ');
	$observaciones1		= $conexion->real_escape_string(strtoupper($_POST['txt_observaciones']));
	$observaciones 		= strtr($observaciones1, 'áéíóúñ', 'ÁÉÍÓÚÑ');
	$fecha_actual 		= date("Y-m-d");
	$anno				= date("Y");


	$cons_id ="SELECT * FROM tbl_consultas ORDER BY cons_Id DESC LIMIT 1";
	$proceso = $conexion->query($cons_id);

	if (!$proceso)	
	{
		die("error:".$cons_id); 
	}

	if($proceso){
		$consutarId	=$proceso->fetch_assoc();
		$rec_conid 	= 	$consutarId['cons_Id'];
		$nuevacon	= 	$rec_conid+1;

	}else{
		echo "No se encontraron consultas";
	}

if($tipousuario=='1' || $tipousuario=='5' || $tipousuario=='4'){
		$query="INSERT INTO tbl_consultas(cons_Id, cons_NoConsulta, cons_Fecha, cons_Atendido, cons_DetalleConsulta, cons_Cuantia, cons_Observaciones, cons_AbogadoAsignado, cons_Cliente, cons_TipoAccion, cons_Estado) VALUES ('$nuevacon', concat('$oficina','-','$nuevacon','-','$anno'), '$fecha_actual', '$atendidopor', '$detaconsulta', '$cuantia', '$observaciones', '$abogado', '$cliente ', '$TipAcc', '1')";
			$resultado=$conexion->query($query);


		if($resultado>0){
			echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaConsultas.php'>";
			echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Has registrado con exito la consulta '.$oficina.'-'.$nuevacon.'-'.$anno.'.';
		} else {
			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar esta la consulta, al parecer hay un error al crear esta consulta, comunicate con el Administrador de Giustizia  </div>';
			echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaConsultas.php'>";
		}
}
	else
	{	echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span>Solo se puede crear  un Cliente cuando se es Administrador,  Secretaria o Abogado. </div>';		
	echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaConsultas.php'>";

	}
?>