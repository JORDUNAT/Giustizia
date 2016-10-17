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
	$apellido1 			=$conexion->real_escape_string(strtoupper($_POST['txt_apellidos']));
	$apellido 			= strtr($apellido1, 'áéíóúñ', 'ÁÉÍÓÚÑ');
	$direccion1			=$conexion->real_escape_string(strtoupper($_POST['txt_direccion']));
	$direccion 			= strtr($direccion1, 'áéíóúñ', 'ÁÉÍÓÚÑ');
	$departamento		=$_POST['txt_departamento'];
	$municipio			=$_POST['txt_municipio'];
	$genero 			=$_POST['sel_genero'];	
	$telefono 			=$conexion->real_escape_string($_POST['txt_telefono']);
	$celular 			=$conexion->real_escape_string($_POST['txt_celular']);
	$email 				=$conexion->real_escape_string(strtoupper($_POST['txt_email']));
	$fecha 				=$_POST['txt_fecha'];	
	$estrato 			=$_POST['sel_estrato'];	
	$consulta 			=$conexion->real_escape_string(strtoupper($_POST['txt_consulta']));		
	$pass 				=md5($clave);
	$fecha_actual 		= date("Y-m-d");
	$anno				= date("Y");
	
	$to 				= $email;


	$sql = "SELECT usu_Documento, usu_Nombres, usu_Direccion, usu_Email FROM tbl_usuarios WHERE (usu_tipusu='1' AND usu_Documento = '$oficina')";
	$qry = $conexion->query($sql);
	$resofis = mysqli_fetch_array($qry);

	$Oficinados			= $resofis['usu_Nombres'];


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

if($tipousuario=='1' || $tipousuario=='5'){
		$query="INSERT INTO tbl_usuarios(usu_TipoDoc, usu_Documento, usu_Nombres, usu_Apellidos, usu_Email, usu_FechaNacimiento, usu_tipusu, usu_Consultorio, usu_Clave, usu_Celular, usu_Genero, usu_Direccion, usu_Municipio, usu_Telefono, usu_Estrato, usu_Estado) VALUES ('$TipDoc', '$documento', '$nombre', '$apellido', '$email', '$fecha', '3', '$oficina', '$pass', '$celular', '$genero', '$direccion', '$municipio', '$telefono', '$estrato', '3')";
		$resultado=$conexion->query($query);


		if($resultado>0){

			$query="INSERT INTO tbl_consultas(cons_Id, cons_NoConsulta, cons_Fecha, cons_Atendido, cons_DetalleConsulta, cons_Cliente, cons_Estado) VALUES ('$nuevacon', concat('$oficina','-','$nuevacon','-','$anno'), '$fecha_actual', '$atendidopor', '$consulta', '$documento ', '1')";
			$resultado=$conexion->query($query);

			$mail -> From = 'desoftco@desoftco.co';
			$mail -> addAddress($to);
			$mail -> Subject = 'SE HA REGISTRADO TU CONSULTA EN GIUSTIZIA';
			$mail -> isHtml(true);
			$mail -> Body = '

			<header style="margin:auto">
			<div style="background:#551500; color:#fff; margin:2%, 2%, 2%, 2%">
        	<h1> <img style="margin:4%, 4%, 4%, 4%" src="http://www.desoftco.co/Giustizia/img/Logo.png" width="6%"><b>GIUSTIZIA</b><img align="right" src="http://www.desoftco.co/Giustizia/img/encabezado1.png" width="40%"></h1>
        	
        	<h4 style="margin:4%, 4%, 4%, 4%" > El Software que necesitas en tu Oficina Jurídica</h4>
  		  	</div>
	    	</header>

		<p>Hola, '.$Oficinados.' ha registrado tus datos y consulta jurídica, así prodras de disponer de Giustizia para la administración de tu consulta y/o expediente.</p>

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

			echo "<META HTTP-EQUIV='refresh' CONTENT='5; URL=../vistas/frm_ListaConsultas.php'>";
			echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-saved"></span> Has registrado con exito a '.$nombre.' '.$apellido.', Se le ha remitido un correo con el usuario y la contraseña al cliente.';
		} else {
			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span> Error al guardar esta la consulta, al parecer este cliente ya es un usuario de Giustizia  </div>';
			echo "<META HTTP-EQUIV='refresh' CONTENT='5; URL=../vistas/frm_ListaClientes.php'>";
		}
}
	else
	{	echo '<div class="alert alert-danger" role="alert"><span class="glyphicon  glyphicon-floppy-remove"></span>Solo se puede crear  un Cliente cuando se es Administrador o Secretaria </div>';		
	echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/frm_ListaClientes.php'>";

	}
?>