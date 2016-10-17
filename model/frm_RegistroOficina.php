<?php

// php Document
//Fecha creado: 13/12/2015
//Propósito: Registro de Oficina Jurídica

	session_start();

	header("Content-Type: text/html;charset=utf-8");
	require('../model/conexion.php');  // Conexión a base de datos
	require('../PHPMailer/PHPMailerAutoload.php');  
	$mail 				= new PHPMailer;

	// Se captura la información a traves de flk_Clientes.js
	$TipDoc 			=$_POST['sel_TipDoc'];
	$documento 			=$_POST['txt_documento'];

	//Construyo una clave
	$primernumero		=substr($_POST['txt_documento'], 1);
	$a 					=$documento[0];

	if($a==1){
		$clave = 'ncAB'.$primernumero.'$';
	}elseif ($a==2) {
		$clave = 'ncCD'.$primernumero.'%';
	}elseif ($a==3) {
		$clave = 'ncEF'.$primernumero.'&';
	}elseif ($a==4) {
		$clave = 'ncGH'.$primernumero.'#';
	}elseif ($a==5) {
		$clave = 'ncIJ'.$primernumero.'$';
	}elseif ($a==6) {
		$clave = 'ncKL'.$primernumero.'%';
	}elseif ($a==7) {
		$clave = 'ncMN'.$primernumero.'&';
	}elseif ($a==8) {
		$clave = 'ncÑP'.$primernumero.'#';
	}elseif ($a==9) {
		$clave = 'ncQR'.$primernumero.'#';
	}


	$nombre1 			=$conexion->real_escape_string(strtoupper($_POST['txt_nombre']));
	$nombre 			= strtr($nombre1, 'áéíóúñ', 'ÁÉÍÓÚÑ');
	$direccion1			=$conexion->real_escape_string(strtoupper($_POST['txt_direccion']));
	$direccion 			= strtr($direccion1, 'áéíóúñ', 'ÁÉÍÓÚÑ');
	$departamento		=$_POST['txt_departamento'];
	$municipio			=$_POST['txt_municipio'];
	$telefono 			=$conexion->real_escape_string($_POST['txt_telefono']);
	$celular 			=$conexion->real_escape_string($_POST['txt_celular']);
	$email 				=$conexion->real_escape_string(strtoupper($_POST['txt_email']));
	$pass 				=md5($clave);

	
	$to 				= $email; 

		$query="INSERT INTO tbl_usuarios(usu_TipoDoc, usu_Documento, usu_Nombres, usu_Email, usu_tipusu, usu_Consultorio, usu_Clave, usu_Celular, usu_Direccion, usu_Municipio, usu_Telefono, usu_Estado) VALUES ('$TipDoc', '$documento', '$nombre', '$email', '1','$documento', '$pass', '$celular', '$direccion', '$municipio','$telefono', '3')";
		$resultado=$conexion->query($query);

		if($resultado>0){
			//Creamos un Email
			$mail -> From = 'desoftco@desoftco.co'; //Correo que queremos que aparesca De:
			$mail -> addAddress($to); //Correo de la oficina Para: 
			$mail -> Subject = 'HAS REGISTRARDO CON EXITO TU OFICINA JURIDICA'; //Asunto del correo
			$mail -> isHtml(true); //Creamos una estructura html
			$mail -> Body =  //Creamos el contenido del Email
			'
			<header style="margin:auto">
			<div style="background:#551500; color:#fff; margin:2%, 2%, 2%, 2%">
	        	<h1> <img style="margin:4%, 4%, 4%, 4%" src="http://www.desoftco.co/Giustizia/img/Logo.png" width="6%"><b>GIUSTIZIA</b><img align="right" src="http://www.desoftco.co/Giustizia/img/encabezado1.png" width="50%"></h1>
	        	
	        	<h4 style="margin:4%, 4%, 4%, 4%" > El Software que necesitas en tu Oficina Jurídica</h4>
	    	</div>
	    	</header>

			<p>Hola, gracias por registrar tu oficina, ahora prodras de disponer de Giustizia para la administración de tus expedientes y así poder mejorar la atención a tus clientes.</p>
			<h3>Tu Usuario:  </b>'.$documento.'</h3>
			<h3>Tu Clave:  </b>'.$clave.'</h3>
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

		//Creamos una carperta con el nit de la oficina la subida de archivos
		$ruta = "../archivos_subidos/".$documento;
		if (!file_exists($ruta))
			{
				mkdir($ruta);
			}

		//Menjase de confirmación y reactivación de la página principal
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/Index.php'>";
		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Se ha creado la Oficina '.$nombre.' Te remitimos un correo con el usuario y la contraseña';

		} else {
			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Comunicate con el administrador del sistema, se ha presentado un error de autenticación.  </div>';
			echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/Index.php'>";
		}
		
//Hasta aquí
?>