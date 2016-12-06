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


	$consulta      		= $conexion->real_escape_string($_POST['txt_consulta']);
	$fechaex		  	= $conexion->real_escape_string($_POST['txt_fechaex']);
	$tiproceso			= $conexion->real_escape_string($_POST['txt_tiproceso']);	           
	$detaexpe1   		= $conexion->real_escape_string(strtoupper($_POST['txt_detalleexpediente']));
	$detaexpe 	 		= strtr($detaexpe1, 'áéíóúñ', 'ÁÉÍÓÚÑ');
	$anno				= date("Y");


	$expe_id ="SELECT * FROM tbl_expedientes ORDER BY exp_Id DESC LIMIT 1";
	$proceso = $conexion->query($expe_id);

	if (!$proceso)	
	{
		die("error:".$expe_id); 
	}

	if($proceso){
		$exp_Id 	=	$proceso->fetch_assoc();
		$rec_expid 	= 	$exp_Id['exp_Id'];
		$nuevoexp	= 	$rec_expid+1;

	}else{
		echo "No se encontraron consultas";
	}

if($tipousuario=='1' || $tipousuario=='5' || $tipousuario=='4'){
		$query="INSERT INTO tbl_expedientes(exp_NumeroExpediente, exp_Id,  exp_DocumentoConsultorio, exp_FechaExpediente, exp_EstadoExpediente, exp_ObservacionExpedientes, exp_Consulta, exp_clasificacionproceso) VALUES (concat('EXP-','$nuevoexp','-','$anno'), '$nuevoexp', '$oficina', '$fechaex', '1', '$detaexpe', '$consulta', '$tiproceso')";
			$resultado=$conexion->query($query);


		if($resultado>0){
			echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaExpedientes.php'>";
			echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Has registrado con exito el expediente EXP'.'-'.$nuevoexp.'-'.$anno.'.';
		} else {
			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar esta el expediente, comunicate con el Administrador de Giustizia  </div>';
			echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaExpedientes.php'>";
		}
}
	else
	{	echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span>Solo se puede crear  un Expediente cuando se es Administrador,  Secretaria o Abogado. </div>';		
	echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaExpedientes.php'>";

	}
?>