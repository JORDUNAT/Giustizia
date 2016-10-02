

<?php	
	session_start();

	header("Content-Type: text/html;charset=utf-8");
	echo "<meta charset='utf-8'>";

	require('conexion.php');
	require('../PHPMailer/PHPMailerAutoload.php');
	$mail 				= new PHPMailer;


	
	if(isset($_SESSION['s_usuario'])){
		$sesion = True;
	}
	else{
		$sesion = False;
	}

	$tipousuario	=$_SESSION['s_tipusu'];
	$ususession		=$_SESSION['s_usuario'];
	$email 			=$_SESSION['s_email'];
	$nombre			=$_SESSION['s_nombre'];

	$nueclave 			=$_POST['nueclave'];
	$confclave 			=$_POST['confclave'];
	$confclaveE 		=md5($_POST['confclave']);

	$clavecontar		=strlen($nueclave);

	$to				= $email;


if($clavecontar<5 AND $clavecontar>9)
{
	echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span>  Error al Cambiar Clave, la clave debe tener minimo 4 caracteres y máximo 9, por favor verifique que cumpla con estas condiciones.  </div>';
}else{

	if($nueclave==$confclave){

		$query="UPDATE tbl_usuarios SET usu_Clave='$confclaveE'  WHERE (usu_Documento='$ususession')";
		$resultado=$conexion->query($query);

		if($resultado>0){
			echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-ok"></span> Has cambiado tu clave con exito, te remitimos un correo con tu nueva clave. ';

			$mail -> From = 'desoftco@desoftco.co';
			$mail -> addAddress($to);
			$mail -> Subject = 'CAMBIO DE CONTRASEÑA';
			$mail -> isHtml(true);
			$mail -> Body = '
			
			<header style="margin:auto">
			<div style="background:#551500; color:#fff; margin:2%, 2%, 2%, 2%">
	        	<h1> <img style="margin:4%, 4%, 4%, 4%" src="http://www.desoftco.co/Giustizia/img/Logo.png" width="6%"><b>GIUSTIZIA</b><img align="right" src="http://www.desoftco.co/Giustizia/img/encabezado1.png" width="50%"></h1>
	        	
	        	<h4 style="margin:4%, 4%, 4%, 4%" > El Software que necesitas en tu Oficina Jurídica</h4>
	    	</div>
	    	</header>

			<p>Hola,'.$nombre .' hemos recibido tu solicitud de cambio de contraseña,  por lo tanto te remitimos tu nueva clave para que puedas acceder a Giustizia.</p>
			<h3>Tu Usuario:  </b>'.$ususession.'</h3>
			<h3>Tu Nueva Clave:  </b>'.$confclave.'</h3>
			<br>
			<p> Ahora puedes volver a ingresar a  <a href="http://www.desoftco.co/Giustizia/vistas/Index.php" title="Haz clic aqui">Giustizia</a></b></p> 
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

			echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/cerrar_sesion.php'>";		
		} else {
			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span>  Error al Cambiar Clave, por favor contacta con el Administrador  </div>';
			echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/flk_CambioClave.php'>";

		}
	}else{	
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al Cambiar Clave, la nueva contraseña y la confirmación deben ser iguales  </div>';		
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/flk_CambioClave.php'>";

		}
}
?>