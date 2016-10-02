<?php	
// html y php Document
//Fecha creado: 29/04/2016
//Propósito: Validación de Ingreso a Giustizia
//Evento sobre el botón Iniciar Sesión que se encuentra en el frm_nav pero que se ve en el Index.php


	session_start();

	header("Content-Type: text/html;charset=utf-8");

	require('../model/conexion.php');

	$usuario 	= $conexion->real_escape_string($_POST['Usuario']);
	$clave 		= md5($_POST['Clave']);


  //$qry = "SELECT * FROM tblusuarios WHERE idUsuario ='$usuario' AND claveUsuario='$clave'";
	$qry = "SELECT * FROM tbl_usuarios WHERE usu_Documento ='$usuario' AND usu_Clave ='$clave' AND usu_Estado='1' OR usu_Estado='3' AND usu_Documento=$usuario";
	$proceso = $conexion->query($qry);

	if (!$proceso)	
	{
		die("error:".$qry); 
	}

	if($resultado = mysqli_fetch_assoc($proceso)){
			$_SESSION['s_usuario']= $resultado['usu_Documento'];
			$_SESSION['s_nombre']=$resultado['usu_Nombres'];
			$_SESSION['s_apellido']=$resultado['usu_Apellidos'];
			$_SESSION['s_email']=$resultado['usu_Email'];
			$_SESSION['s_tipusu']=$resultado['usu_tipusu'];	
			$_SESSION['s_estado']=$resultado['usu_Estado'];				
			$_SESSION['s_genero']=$resultado['usu_Genero'];
			$_SESSION['s_oficina']=$resultado['usu_Consultorio'];
			$_SESSION['s_logo']=$resultado['usu_Logo'];
			$_SESSION['s_Consulta']='';
			$_SESSION['s_Expediente']='';
					
		//header("Location: ../vistas/menu.php");
			if($_SESSION['s_estado']=='1'){
				echo 1;	
			}elseif ($_SESSION['s_estado']=='3') {
				echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../vistas/flk_CambioClave3.php'>";
			}	
			else{
				echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=../vistas/Index.php'>";
			}
		
	}
	else{
		echo "<meta charset='utf-8'>";
		// header("Location: ../vistas/Index.php");
		echo '<div class="alert alert-danger">Lo sentimos pero el usaurio no existe o la clave no es la correcta</div>';
		echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=../vistas/Index.php'>";
		//header("Location: ../vistas/Index.php");
	}

?>