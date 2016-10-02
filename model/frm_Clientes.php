<?php

// php Document
//Fecha creado: 30/09/2015
//Propósito: Crear usuario desde la aplicación con clave de administrador o con rol de secreatrio(a)

	session_start();


	header("Content-Type: text/html;charset=utf-8");
	require('../model/conexion.php');
	require('../PHPMailer/PHPMailerAutoload.php');
	$mail 				= new PHPMailer;


	$oficina 			=$_SESSION['s_oficina'];

	$TipDoc 			=$_POST['sel_TipDoc'];
	$documento 			=$_POST['txt_documento'];
	$nombre 			=$conexion->real_escape_string(strtoupper($_POST['txt_nombre']));
	$apellidos 			=$conexion->real_escape_string(strtoupper($_POST['txt_apellidos']));
	$departamento		=$_POST['txt_departamento'];
	$municipio			=$_POST['txt_municipio'];	
	$genero 			=$_POST['txt_genero'];
	$telefono 			=$conexion->real_escape_string($_POST['txt_telefono']);
	$celular 			=$conexion->real_escape_string($_POST['txt_celular']);
	$email 				=strtoupper($_POST['txt_email']);
	$fecha 				=$_POST['txt_fecha'];
	$estrato			=$_POST['sel_estrato'];

	$tipusu 			='3';
	$pass 				=md5('ng'.$_POST['txt_documento']);

	$to 				=$email; 


	$query="INSERT INTO tbl_usuarios(usu_TipoDoc, usu_Documento, usu_Nombres, usu_Apellidos, usu_Email, usu_FechaNacimiento, usu_tipusu, usu_Consultorio, usu_Clave, usu_Celular, usu_Genero, usu_Departamento, usu_Municipio, usu_Telefono, 	usu_Estrato, usu_Estado) VALUES ('$TipDoc', '$documento', '$nombre', '$apellidos', '$email', $fecha, '3', '$oficina', '$pass', '$celular', '$genero', '$departamento', '$municipio', '$telefono', '$estrato', '3')";
	$resultado=$conexion->query($query);

	

	if($resultado>0){
			$mail -> From = 'adsi@desoftco.co';
			$mail -> addAddress($to);
			$mail -> Subject = 'HAS SIDO REGISTRARDO CON EXITO POR TU OFICINA JURIDICA';
			$mail -> isHtml(true);
			$mail -> Body = '

			<header style="margin:auto">
			<div style="background:#551500; color:#fff; margin:2%, 2%, 2%, 2%">
	        	<h1> <img style="margin:4%, 4%, 4%, 4%" src="http://www.desoftco.co/Giustizia/img/Logo.png" width="6%"><b>GIUSTIZIA</b><img align="right" src="http://www.desoftco.co/Giustizia/img/encabezado1.png" width="50%"></h1>
	        	
	        	<h4 style="margin:4%, 4%, 4%, 4%" > El Software que necesitas en tu Oficina Jurídica</h4>
	    	</div>
	    	</header>

			<p>Hola, te contamos que la oficina jurídica '.utf8_decode($nombre).' te ha creado como usuario de Giustizia. </p>
			<h3>Tu Usuario:  </b>'.$documento.'</h3>
			<h3>Tu Clave:  </b>ng'.$documento.'</h3>
			<br>
			<p> Ahora puedes ingresar a Giustizia y no olvides cambiar tu clave al ingresar.  <a href="http://www.desoftco.co/Giustizia/vistas/Index.php" title="Haz clic aqui">Haz clic aqui</a>.</b></p> 
			<p>Atentamente,</p>
			<br>
			<h3>Administración Giustizia</h3>
			<br>
			<div class="container-fluid" style="background:#F7F7F7; color:#000; margin: auto">
			<p align="center"><a href="http://www.desoftco.co" title="Sitio Oficial de la DESOFTCO.CO">Realizado por DESOFTCO.CO</a>
				<img src="http://www.desoftco.co/Giustizia/img/Logo2.png" align="left" width="20" height="20"><h6 class="text-success" align="center" style="color:green"><img src="http://www.desoftco.co/Giustizia/img/sena.png" width="20" height="20">Proyecto Educativo SENA<img src="http://www.desoftco.co/Giustizia/img/Logo2.png" align="right" width="20" height="20"></h6>
			</p>	
			</div>

			';
			$mail -> CharSet = 'UFT-8';
			$mail -> send();

		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaClientes.php'>";
		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha creado el cliente '.$nombre.' '.$apellidos;
	} else {
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar este usuario, al parecer ya se este creado  </div>';
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaClientes.php'>";
	}
?>
