<?php
	/*Enlace la capa del modelo
	Fecha creado:02/09/2015*/
	include_once('conexion.php');

	//Cargue de parámetros desde Ajax
	if (isset($_POST['ajax']))
	{
		$vals 	=	$_POST[''];
		$params = 	json_decode($vals,TRUE);
	}
	

	//Clases del modelo
	class usuariosModel
	{	

		function getUsuarios($conexion) //Consulta de los usuarios no clientes de acuero a cada oficina
		{
			$oficina = $_SESSION['s_oficina'];
			$html = array();
			$sql = "SELECT A.usu_TipoDoc, A.usu_Documento, A.usu_Nombres, A.usu_Apellidos, A.usu_Email, A.usu_Genero, B.tipu_TipoUsuario, C.Estado_Estado FROM tbl_usuarios A, tbl_tipousuario B, tbl_estados C WHERE (A.usu_tipusu=B.tipu_Id) AND (A.usu_Estado=C.estado_Id) AND  (tipu_Id<>3) AND (usu_Documento<>usu_Consultorio) AND (usu_Consultorio='$oficina')";
			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;
		}
	

		function getUnUsuario($conexion) // Consulta de los datos del usuario logiado
		{
			$ususesion=$_SESSION['s_usuario'];
			$html = array();
			$sql = "SELECT A.usu_TipoDoc, A.usu_Documento, A.usu_Nombres, A.usu_Apellidos, A.usu_Email, A.usu_Genero, A.usu_Logo, B.tipu_TipoUsuario, C.Estado_Estado FROM tbl_usuarios A, tbl_tipousuario B, tbl_estados C WHERE (A.usu_tipusu=B.tipu_Id) AND (A.usu_Estado=C.estado_Id) AND  (tipu_Id<>3) AND (A.usu_Documento='$ususesion')";
			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;
		}


		function getClientes($conexion)
		{
			$oficina = $_SESSION['s_oficina'];
			$html = array();
			$sql = "SELECT A.usu_TipoDoc, A.usu_Documento, A.usu_Nombres, A.usu_Apellidos, A.usu_Email, A.usu_Genero, B.tipu_TipoUsuario, C.Estado_Estado FROM tbl_usuarios A, tbl_tipousuario B, tbl_estados C WHERE (A.usu_tipusu=B.tipu_Id) AND (A.usu_Estado=C.estado_Id) AND (usu_Documento<>usu_Consultorio) AND  (tipu_Id=3) AND (usu_Consultorio='$oficina')";
			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;
		}
	

		function getUnCliente($conexion)
		{
			$ususesion=$_SESSION['s_usuario'];
			$html = array();
			$sql = "SELECT A.usu_TipoDoc, A.usu_Documento, A.usu_Nombres, A.usu_Apellidos, A.usu_Direccion, A.usu_Email, A.usu_Genero, A.usu_Logo, B.tipu_TipoUsuario, C.Estado_Estado FROM tbl_usuarios A, tbl_tipousuario B, tbl_estados C WHERE (A.usu_tipusu=B.tipu_Id) AND (A.usu_Estado=C.estado_Id) AND  (tipu_Id=3) AND (A.usu_Documento='$ususesion')";
			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;
		}

		function getOficina($conexion)
		{
			$ususesion=$_SESSION['s_usuario'];
			$html = array();
			$sql = "SELECT A.usu_TipoDoc, A.usu_Documento, A.usu_Nombres,  A.usu_Email, A.usu_Consultorio, A.usu_Celular, A.usu_Genero, A.usu_Direccion, A.usu_Telefono, A.usu_Logo, B.tipu_TipoUsuario, C.Estado_Estado FROM tbl_usuarios A, tbl_tipousuario B, tbl_estados C WHERE (A.usu_tipusu=B.tipu_Id) AND (A.usu_Estado=C.estado_Id) AND (A.usu_Documento='$ususesion')";
			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			$html=$qry->fetch_assoc();
			return $html;
		}


		function getEdiUnUsuario($conexion)
		{
			$usuario = $_GET['Documento'];
			$html = array();
			$sql = "SELECT A.usu_TipoDoc, A.usu_Documento, A.usu_Nombres, A.usu_Apellidos, A.usu_Email, A.usu_FechaNacimiento, A.usu_Consultorio, A.usu_Celular, A.usu_Genero, A.usu_Direccion, A.usu_Telefono, A.usu_Logo, B.tipu_TipoUsuario, C.Estado_Estado FROM tbl_usuarios A, tbl_tipousuario B, tbl_estados C WHERE (A.usu_tipusu=B.tipu_Id) AND (A.usu_Estado=C.estado_Id) AND (A.usu_Documento='$usuario')";
			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			$html=$qry->fetch_assoc();
			return $html;
		}

		function getRecuperar($conexion)
		{
			$usuario = $_POST['txt_documento'];
			$html = array();
			$sql = "SELECT usu_Documento, usu_Email, usu_Clave FROM tbl_usuarios  WHERE usu_Documento='$usuario'";
			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			$html=$qry->fetch_assoc();
			return $html;
		}



		function getOfisResgistradas($conexion)
		{
			$html = array();
			$sql = "SELECT A.usu_Documento, A.usu_Nombres, A.usu_Direccion, A.usu_Logo,  B.tipu_TipoUsuario, C.Estado_Estado FROM tbl_usuarios A, tbl_tipousuario B, tbl_estados C WHERE (A.usu_tipusu=B.tipu_Id) AND (A.usu_Estado=C.estado_Id) AND (A.usu_tipusu='1')";
			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;
		}


		function getSelecOfis($conexion)
		{
			$html_combo = "";
			$sql = "SELECT A.usu_Documento, A.usu_Nombres, A.usu_Direccion, D.muni_Municipio FROM tbl_usuarios A, tbl_municipios D WHERE (A.usu_Municipio=D.muni_Codigo) AND (A.usu_tipusu='1')";
			$qry = $conexion->query($sql);

			while ($oficina = $qry->fetch_assoc())
			{
				$html_combo .= "<option id='oficina', name='oficina',  value='".$oficina['usu_Documento']."'>".$oficina['usu_Nombres']." | ".$oficina['usu_Direccion']." ".$oficina['muni_Municipio']."</option>";
			}
			

			return $html_combo;
		}


		function getClientesSelect($conexion)
		{
			$oficina = $_SESSION['s_oficina'];
			$html_combo = "";
			$sql = "
			SELECT usu_Documento, usu_Nombres, usu_Apellidos, usu_Consultorio,	usu_tipusu FROM tbl_usuarios WHERE (usu_Consultorio='$oficina') AND (usu_tipusu = 3)
			"; 
			$qry = $conexion->query($sql);
			
			while ($clientese = $qry->fetch_assoc())
			{
				$html_combo .= "<option id='clienteselec', name='clienteselec',  value='".$clientese['usu_Documento']."'>".$clientese['usu_Documento']." | ".$clientese['usu_Nombres']." ".$clientese['usu_Apellidos']."</option>";
			}
			

			return $html_combo;
		}

		function getClientesAbogados($conexion)
		{
			$oficina = $_SESSION['s_oficina'];
			$html_combo = "";
			$sql = "
			SELECT usu_Documento, usu_Nombres, usu_Apellidos, usu_Consultorio,	usu_tipusu FROM tbl_usuarios WHERE (usu_Consultorio='$oficina') AND (usu_tipusu = 4)
			"; 
			$qry = $conexion->query($sql);
			
			while ($abogado = $qry->fetch_assoc())
			{
				$html_combo .= "<option id='abogadoselec', name='abogadoselec',  value='".$abogado['usu_Documento']."'>".$abogado['usu_Documento']." | ".$abogado['usu_Nombres']." ".$abogado['usu_Apellidos']."</option>";
			}
			

			return $html_combo;
		}

		function getTipoDocumento($conexion)
		{

			$html_combo = "";
			$qrytd="SELECT * FROM tbl_tipodocumento"; // Sleccion de Tipo de Usuario
			$qry = $conexion->query($qrytd);
			

			while ($tipodocumento = $qry->fetch_assoc())
			{
				$html_combo .= "<option   value='".$tipodocumento['tipdoc_Id']."'>".$tipodocumento['tipdoc_Descripcion']."</option>";
			}

			return $html_combo;

		}

		function getTipoJuzgado($conexion)
		{

			$html_combo = "";
			$qrytd="SELECT * FROM tbl_tipojuzgado"; // Sleccion de Tipo de Usuario
			$qry = $conexion->query($qrytd);
			

			while ($tipodocumento = $qry->fetch_assoc())
			{
				$html_combo .= "<option   value='".$tipodocumento['tipjuz_Id']."'>".$tipodocumento['tipjuz_TipoJuzgado']."</option>";
			}

			return $html_combo;

		}


		function getTipoUsuario($conexion)
		{
			$html_combo = "";
			$qrytd="SELECT * FROM tbl_tipousuario WHERE tipu_Id<>1 AND tipu_Id<>3"; // Sleccion de Tipo de Usuario
			$qry = $conexion->query($qrytd);
			
 
			while ($tipousuario = $qry->fetch_assoc())
			{
				$html_combo .= "<option   value='".$tipousuario['tipu_Id']."'>".$tipousuario['tipu_TipoUsuario']."</option>";
			}

			return $html_combo;
		}

		function getQryTipUsuario($conexion)
		{
			$ususesion=$_SESSION['s_usuario'];
			$usuario = $_GET['Documento'];

			$html_combo = "";
			$sql = "SELECT A.usu_tipusu, B.tipu_Id, B.tipu_TipoUsuario FROM tbl_usuarios A, tbl_tipousuario B WHERE (A.usu_tipusu=B.tipu_Id) AND (usu_Documento='$usuario')";
			$qry = $conexion->query($sql);

			while ($tipodocumento = $qry->fetch_assoc())
			{
				$html_combo .= "<option value='".$tipodocumento['tipu_Id']."'>".$tipodocumento['tipu_TipoUsuario']."</option>";
			}

			return $html_combo;
		}


		function getQryTipJuzgadouno($conexion)
		{
			$juzgado= $_POST['juzg'];

			$sqltip= "
				SELECT * FROM tbl_juzgados WHERE (juz_Id='$juzgado')
			";
			$qrytip = $conexion->query($sqltip);

			$curtip = $qrytip->fetch_assoc();
			$tipjuz_id=$curtip['juz_TipoJuzgado'];

			$html_combo = "";
			$sql = "SELECT * FROM tbl_tipojuzgado WHERE (tipjuz_Id='$tipjuz_id')";
			$qry = $conexion->query($sql);

			while ($tipojuzgado = $qry->fetch_assoc())
			{
				$html_combo .= "<option value='".$tipojuzgado['tipjuz_Id']."'>".$tipojuzgado['tipjuz_TipoJuzgado']."</option>";
			}

			return $html_combo;
		}

		function getQryTipDoc($conexion)
		{
			$ususesion=$_SESSION['s_usuario'];
			$usuario = $_GET['Documento'];

			$html_combo = "";
			$sql = "SELECT A.usu_TipoDoc, B.tipdoc_Id, B.tipdoc_Descripcion FROM tbl_usuarios A, tbl_tipodocumento B WHERE (A.usu_TipoDoc=B.tipdoc_Id) AND (usu_Documento='$usuario')";
			$qry = $conexion->query($sql);

			while ($tipodocumento = $qry->fetch_assoc())
			{
				$html_combo .= "<option value='".$tipodocumento['tipdoc_Id']."'>".$tipodocumento['tipdoc_Descripcion']."</option>";
			}

			return $html_combo;
		}


		function getQryTipDocOf($conexion)
		{
			$ususesion=$_SESSION['s_usuario'];

			$html_combo = "";
			$sql = "SELECT A.usu_TipoDoc, B.tipdoc_Id, B.tipdoc_Descripcion FROM tbl_usuarios A, tbl_tipodocumento B WHERE (A.usu_TipoDoc=B.tipdoc_Id) AND (usu_Documento='$ususesion')";
			$qry = $conexion->query($sql);

			while ($tipodocumento = $qry->fetch_assoc())
			{
				$html_combo .= "<option value='".$tipodocumento['tipdoc_Id']."'>".$tipodocumento['tipdoc_Descripcion']."</option>";
			}

			return $html_combo;
		}


		function getTipoDocumentoRelacion($conexion)
		{
			$html = array();
			$qryproceso="SELECT  * FROM tbl_tipodocumento"; // Sleccion de Tipo de Usuario
			$qry = $conexion->query($qryproceso);
			
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;

		}	

		function getTipoUsuarioRelacion($conexion)
		{
			$html = array();
			$qryproceso="SELECT  * FROM tbl_tipousuario"; // Sleccion de Tipo de Usuario
			$qry = $conexion->query($qryproceso);
			
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;

		}	

		function getTipoJuzgadoRelacion($conexion)
		{
			$html = array();
			$qryproceso="SELECT  * FROM tbl_tipojuzgado"; // Sleccion de Tipo de Usuario
			$qry = $conexion->query($qryproceso);
			
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;

		}	


		function getQryTipDocu($conexion)
		{
			$tipodocumento= $_POST['tipdocu'];

			$html = array();
			$sql = "
				SELECT * FROM tbl_tipodocumento WHERE 	tipdoc_Id = '$tipodocumento'
			";

			$qry = $conexion->query($sql);
			$cursor = $qry->fetch_assoc();
			//echo '<br>';
			//echo $cursor['cons_Cliente'];			

			return $cursor;
		}			


		function getQryDepartamentos($conexion)
		{
			$departamento= $_POST['depart'];

			$html = array();
			$sql = "
				SELECT * FROM tbl_departamentos WHERE 	depa_Id = '$departamento'
			";

			$qry = $conexion->query($sql);
			$cursor = $qry->fetch_assoc();
			//echo '<br>';
			//echo $cursor['cons_Cliente'];			

			return $cursor;
		}	

		function getQryTipUsua($conexion)
		{
			$tipousuario= $_POST['tipdocu'];

			$html = array();
			$sql = "
				SELECT * FROM tbl_tipousuario WHERE 	tipu_Id = '$tipousuario'
			";

			$qry = $conexion->query($sql);
			$cursor = $qry->fetch_assoc();
			//echo '<br>';
			//echo $cursor['cons_Cliente'];			

			return $cursor;
		}	

		function getQryTipJuzg($conexion)
		{
			$tipojuzgado= $_POST['tipjuzg'];

			$html = array();
			$sql = "
				SELECT * FROM tbl_tipojuzgado WHERE tipjuz_Id = '$tipojuzgado'
			";

			$qry = $conexion->query($sql);
			$cursor = $qry->fetch_assoc();
			//echo '<br>';
			//echo $cursor['cons_Cliente'];			

			return $cursor;
		}	

		function getEstadoUsuario($conexion)
		{
			$html_combo = "";
			$qrytd="SELECT * FROM tbl_estados"; // Sleccion de Tipo de Usuario
			$qry = $conexion->query($qrytd);
			

			while ($estadousuario = $qry->fetch_assoc())
			{
				$html_combo .= "<option   value='".$estadousuario['estado_Id']."'>".$estadousuario['estado_Estado']."</option>";
			}

			return $html_combo;
		}


		function getusuEstado($conexion)
		{
			$ususesion=$_SESSION['s_usuario'];
			$usuario = $_GET['Documento'];

			$html_combo = "";
			$sql = "SELECT A.usu_Estado, B.estado_Id, B.Estado_Estado FROM tbl_usuarios A, tbl_estados B WHERE (A.usu_Estado=B.estado_Id) AND (usu_Documento='$usuario')";
			$qry = $conexion->query($sql);

			while ($estadousuario = $qry->fetch_assoc())
			{
				$html_combo .= "<option value='".$estadousuario['estado_Id']."'>".$estadousuario['Estado_Estado']."</option>";
			}

			return $html_combo;
		}


		function getEstratos($conexion)
		{

			$html_combo = "";
			$qryestrato="SELECT * FROM tbl_estratos"; // Sleccion de Tipo de Usuario
			$qry = $conexion->query($qryestrato);
			

			while ($estratousuario = $qry->fetch_assoc())
			{
				$html_combo .= "<option   value='".$estratousuario['estr_Id']."'>".$estratousuario['estr_Estrato']."</option>";
			}

			return $html_combo;

		}

		function getTipoAccion($conexion)
		{

			$html_combo = "";
			$qryestrato="SELECT * FROM tbl_tipoaccion"; // Sleccion de Tipo de Usuario
			$qry = $conexion->query($qryestrato);
			

			while ($tipaccion = $qry->fetch_assoc())
			{
				$html_combo .= "<option   value='".$tipaccion['tipAcc_Id']."'>".$tipaccion['tipAcc_TipoAccion']."</option>";
			}

			return $html_combo;

		}


		function getTipoAccionRelacion($conexion)
		{
			$html = array();
			$qryproceso="SELECT A.tipAcc_Id, A.tipAcc_TipoAccion, A.TipAcc_Estado, B.estado_Estado FROM tbl_tipoaccion A, tbl_estados B WHERE (A.TipAcc_Estado = B.estado_Id)"; // Sleccion de Tipo de Acción
			$qry = $conexion->query($qryproceso);
			
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;

		}		

		function getQryAccion($conexion)
		{
			$tipoaccion= $_POST['tipoaccion'];

			$html = array();
			$sql = "
				SELECT * FROM tbl_tipoaccion WHERE 	tipAcc_Id = '$tipoaccion'
			";

			$qry = $conexion->query($sql);
			$cursor = $qry->fetch_assoc();
			//echo '<br>';
			//echo $cursor['cons_Cliente'];			

			return $cursor;
		}


		function getQryJuzgado($conexion)
		{
			$juzgado= $_POST['juzg'];

			$html = array();
			$sql = "
				SELECT * FROM tbl_juzgados WHERE juz_Id = '$juzgado'
			";

			$qry = $conexion->query($sql);
			$cursor = $qry->fetch_assoc();
			//echo '<br>';
			//echo $cursor['cons_Cliente'];			

			return $cursor;
		}

		function getTipoProceso($conexion)
		{

			$html = array();
			$qryproceso="SELECT A.clapro_Id, A.clapro_ClasificacionProceso, A.clapro_Estado, B.estado_Estado FROM tbl_clasificacionproceso A, tbl_estados B WHERE (A.clapro_Estado = B.estado_Id)"; // Sleccion de Clasificación de Procesos
			$qry = $conexion->query($qryproceso);
			
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;

		}

		function getQryProceso($conexion)
		{

			$tiproceso= $_POST['tipprocesos'];

			$html = array();
			$sql = "
				SELECT * FROM tbl_clasificacionproceso WHERE clapro_Id = '$tiproceso'
			";

			$qry = $conexion->query($sql);
			$cursor = $qry->fetch_assoc();
			//echo '<br>';
			//echo $cursor['cons_Cliente'];			

			return $cursor;
		}


		function getDepartamentos($conexion)
		{

			$html_combo = "";
			$qrydepa="SELECT * FROM tbl_departamentos"; // Sleccion de Departamentos
			$qry = $conexion->query($qrydepa);
			

			while ($departamentos = $qry->fetch_assoc())
			{
				$html_combo .= "<option value='".$departamentos['depa_Id']."'>".$departamentos['depa_Departamento']."</option>";
			}

			return $html_combo;

		}


		function getConsutlas($conexion) ////Consulta de las conusltas jurídicas de la Oficina
		{
			$oficina = $_SESSION['s_oficina'];

			$html = array();
			$sql = "
				SELECT * FROM tbl_consultas WHERE cons_Estado = 1 AND (cons_NoConsulta LIKE '%$oficina%')
			";

			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;
		}

		function getConsutlasHis($conexion) ////Consulta de las conusltas jurídicas de la Oficina
		{
			$oficina = $_SESSION['s_oficina'];

			$html = array();
			$sql = "
				SELECT * FROM tbl_consultas WHERE (cons_NoConsulta LIKE '%$oficina%') AND (cons_Estado=4)
			";

			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;
		}


		function getConsutlasUsuario($conexion) //Consulta de las conusltas jurídicas asignadas al usuario sesionado
		{
			$oficina = $_SESSION['s_oficina'];
			$usuario_sesionado = $_SESSION['s_usuario'];


			$html = array();
			$sql = "
			SELECT A.cons_Id, A.cons_NoConsulta, A.cons_Fecha, A.cons_Atendido, A.cons_Cliente, A.cons_DetalleConsulta, A.cons_Cuantia, A.cons_TipoAccion, A.cons_Observaciones, A.cons_AbogadoAsignado, A.cons_Estado, B.tipAcc_Id, B.tipAcc_TipoAccion FROM tbl_consultas A LEFT JOIN tbl_tipoaccion B ON A.cons_TipoAccion=B.tipAcc_Id WHERE A.cons_AbogadoAsignado='$usuario_sesionado' AND A.cons_Estado='1'
			";

			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;
		}		

		function getConsutlasUsuarioHis($conexion) //Consulta de las conusltas jurídicas asignadas al usuario sesionado
		{
			$oficina = $_SESSION['s_oficina'];
			$usuario_sesionado = $_SESSION['s_usuario'];


			$html = array();
			$sql = "
			SELECT A.cons_Id, A.cons_NoConsulta, A.cons_Fecha, A.cons_Atendido, A.cons_Cliente, A.cons_DetalleConsulta, A.cons_Cuantia, A.cons_TipoAccion, A.cons_Observaciones, A.cons_AbogadoAsignado, A.cons_Estado, B.tipAcc_Id, B.tipAcc_TipoAccion FROM tbl_consultas A LEFT JOIN tbl_tipoaccion B ON A.cons_TipoAccion=B.tipAcc_Id WHERE A.cons_AbogadoAsignado='$usuario_sesionado' AND A.cons_Estado<>'1'
			";

			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;
		}	

		function getListaDepartamento($conexion) //Listado de departamentos

		{

			$oficina = $_SESSION['s_oficina'];
			$usuario_sesionado = $_SESSION['s_usuario'];
						
			$html = array();
			$sql = "
			SELECT * FROM tbl_departamentos
			";

			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;
		}	

		function getListaJuzgado($conexion) //Listado de departamentos

		{

			$oficina = $_SESSION['s_oficina'];
			$usuario_sesionado = $_SESSION['s_usuario'];
						
			$html = array();
			$sql = "
			SELECT * FROM tbl_juzgados
			";

			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;
		}	


		function getListaMunicipios($conexion) //Listado de municipios

		{

			$oficina = $_SESSION['s_oficina'];
			$usuario_sesionado = $_SESSION['s_usuario'];
						
			$html = array();
			$sql = "
			SELECT A.muni_Codigo, A.muni_Departamento, A.muni_Municipio, B.depa_Codigo, B.depa_Departamento FROM tbl_municipios A, tbl_departamentos B WHERE (A.muni_Departamento = B.depa_Codigo)
			";

			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;
		}	


		function getQryMunicipios($conexion)
		{
			$id= $_POST['municip'];

			$html = array();
			$sql = "
				SELECT A.muni_Codigo, A.muni_Departamento, A.muni_Municipio, B.depa_Id, B.depa_Departamento FROM tbl_municipios A, tbl_departamentos B WHERE (muni_Codigo='$id') AND (A.muni_Departamento= B.depa_Id)
			";

			$qry = $conexion->query($sql);
			$cursor = $qry->fetch_assoc();
					

			return $cursor;
		}	


	
		function getConsutlasCliente($conexion) //Consulta de los usuarios no clientes de acuero a cada oficina
		{
			$oficina = $_SESSION['s_oficina'];
			$usuario_sesionado = $_SESSION['s_usuario'];

			$html = array();
			$sql = "
			SELECT A.cons_Id, A.cons_NoConsulta, A.cons_Fecha, A.cons_Atendido, A.cons_Cliente, A.cons_DetalleConsulta, A.cons_Cuantia, A.cons_TipoAccion, A.cons_Observaciones, A.cons_AbogadoAsignado, A.cons_Estado, B.tipAcc_Id, B.tipAcc_TipoAccion FROM tbl_consultas A LEFT JOIN tbl_tipoaccion B ON A.cons_TipoAccion=B.tipAcc_Id WHERE A.cons_Cliente='$usuario_sesionado' AND A.cons_Estado='1'
			";

			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;
		}	

		function getConsutlasClienteHis($conexion) //Consulta de los usuarios no clientes de acuero a cada oficina
		{
			$oficina = $_SESSION['s_oficina'];
			$usuario_sesionado = $_SESSION['s_usuario'];

			$html = array();
			$sql = "
			SELECT A.cons_Id, A.cons_NoConsulta, A.cons_Fecha, A.cons_Atendido, A.cons_Cliente, A.cons_DetalleConsulta, A.cons_Cuantia, A.cons_TipoAccion, A.cons_Observaciones, A.cons_AbogadoAsignado, A.cons_Estado, B.tipAcc_Id, B.tipAcc_TipoAccion FROM tbl_consultas A LEFT JOIN tbl_tipoaccion B ON A.cons_TipoAccion=B.tipAcc_Id WHERE A.cons_Cliente='$usuario_sesionado' AND A.cons_Estado='1'
			";

			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			while ($cursor = $qry->fetch_assoc())
			{
				array_push($html,$cursor);
			}
			return $html;
		}	

		function getConsultaConsutla($conexion) //Consulta de los usuarios no clientes de acuero a cada oficina
		{
			$consulta= $_POST['idconsulta'];

			$html = array();
			$sql = "
			SELECT A.cons_NoConsulta, A.cons_Id, A.cons_Fecha, A.cons_Atendido, A.cons_DetalleConsulta, A.cons_Cuantia,  A.cons_Observaciones, A.cons_AbogadoAsignado, A.cons_Cliente, A.cons_TipoAccion, A.cons_Estado, B.usu_Documento, B.usu_Nombres, B.usu_Apellidos, C.tipAcc_Id, C.tipAcc_TipoAccion
			FROM 
			tbl_consultas A INNER JOIN tbl_usuarios B ON (A.cons_Cliente=B.usu_Documento)
			LEFT JOIN tbl_tipoaccion C ON (A.Cons_TipoAccion = C.TipAcc_Id)
			WHERE (A.cons_Id='$consulta')
			";

			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			$html=$qry->fetch_assoc();
			return $html;
		}

		function getConsultaExpedientes($conexion) //Consulta de los usuarios no clientes de acuero a cada oficina
		{
			$consulta =$_POST['consultaoculta'];

			$html = array();
			$sql = "
			SELECT A.cons_NoConsulta, A.cons_Id, A.cons_Fecha, A.cons_Atendido, A.cons_DetalleConsulta, A.cons_Cuantia,  A.cons_Observaciones, A.cons_AbogadoAsignado, A.cons_Cliente, A.cons_TipoAccion, A.cons_Estado, B.usu_Documento, B.usu_Nombres, B.usu_Apellidos, C.tipAcc_Id, C.tipAcc_TipoAccion
			FROM 
			tbl_consultas A INNER JOIN tbl_usuarios B ON (A.cons_Cliente=B.usu_Documento)
			LEFT JOIN tbl_tipoaccion C ON (A.Cons_TipoAccion = C.TipAcc_Id)
			WHERE (A.cons_NoConsulta='$consulta')
			";

			$qry = $conexion->query($sql);
			if (!$qry)
			{
				return 'Error->'.mysql_error().',qry:'.$sql;
			}
			$html=$qry->fetch_assoc();
			return $html;
		}

		function getConsConsUsu($conexion) //Consulta de los usuarios no clientes de acuero a cada oficina
		{
			$consulta =$_SESSION['s_Consulta'];
			echo $consulta;

			$html = array();
			$sql = "
			SELECT A.cons_Cliente, B.usu_Documento, B.usu_Nombres, B.usu_Apellidos FROM tbl_consultas A, tbl_usuarios B WHERE A.cons_Cliente=B.usu_Documento AND A.cons_NoConsulta='$consulta'
			";

			$qry = $conexion->query($sql);
			$cursor = $qry->fetch_assoc();
			//echo '<br>';
			//echo $cursor['usu_Documento'];
			return $cursor;
		}

		// Hasta aqui
	}
?>
