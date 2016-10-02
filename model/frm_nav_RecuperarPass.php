<?php	
// php Document
//Fecha creado: 29/04/2016
//Propósito: Recuperar contraseña del Usuario
//Evento sobre el botón ¿Olvidaste tu contraseña? que se encuentra en el frm_nav pero que se ve en el Index.php

	session_start();

	header("Content-Type: text/html;charset=utf-8");
	require('../model/conexion.php');
	require('../PHPMailer/PHPMailerAutoload.php');

	$mail 				= new PHPMailer;

	$documento 			=$_POST['txt_UsuarioR'];

	$qry = "SELECT usu_Documento, usu_Email, usu_Estado FROM tbl_usuarios WHERE usu_Documento ='$documento' AND usu_Estado='1'";
	$proceso = $conexion->query($qry);


	if (!$proceso)	
	{
		die("error:".$qry); 
	}

	if($proceso){
		$consulta=$proceso->fetch_assoc();
		if($consulta){
		$rec_documento 	= 	$consulta['usu_Documento'];
		$rec_email		=	$consulta['usu_Email'];
		$rec_clave		=   'rg'.$rec_documento;
		$pass 			=	md5('rg'.$rec_documento);

		$to 			= 	$rec_email; 

		$query="UPDATE tbl_usuarios SET usu_Clave='$pass', usu_Estado='3' WHERE (usu_Documento='$rec_documento')";
		$resultado=$conexion->query($query);


		$mail -> From = 'desoftco@desoftco.co';
		$mail -> addAddress($to);
		$mail -> Subject = 'RECUPERACION DE CONTRASEÑA';
		$mail -> isHtml(true);
		$mail -> Body = '
		
		<header style="margin:auto">
		<div style="background:#551500; color:#fff; margin:2%, 2%, 2%, 2%">
        	<h1> <img style="margin:4%, 4%, 4%, 4%" src="http://www.desoftco.co/Giustizia/img/Logo.png" width="6%"><b>GIUSTIZIA</b><img align="right" src="http://www.desoftco.co/Giustizia/img/encabezado1.png" width="50%"></h1>
        	
        	<h4 style="margin:4%, 4%, 4%, 4%" > El Software que necesitas en tu Oficina Jurídica</h4>
    	</div>
    	</header>

		<p>Hola, hemos recibido tu solicitud de recuperación de contraseña,  por lo tanto te remitimos tu nueva clave y te solicitamos de realizar el cambio de la misma una vez accesdas a Giustizia.</p>
		<h3>Tu Usuario:  </b>'.$rec_documento.'</h3>
		<h3>Tu Nueva Clave:  </b>'.$rec_clave.'</h3>
		<br>
		<p> Ahora puedes volver a ingresar y no olvides cambiar tu clave <a href="http://www.desoftco.co/Giustizia/vistas/Index.php" title="Haz clic aqui">Giustizia</a></b></p> 
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

		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/Index.php'>";
		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-thumbs-up"></span> Te remitimos un correo con tu usuario y nueva contraseña al email que tienes registradoregistrado';

		}else{
			echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/Index.php'>";
			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-thumbs-down"></span> Al parecer este documento no existe en nuestra base de datos o se encuentra inactivo para acceder  </div>';	
		}
	}else{
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/Index.php'>";
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-thumbs-down"></span> Al parecer este documento no existe en nuestra base de datos o se encuentra inactivo para acceder  </div>';	
	}
?>