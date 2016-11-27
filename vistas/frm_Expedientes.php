<?php	
// html y php Document
//Fecha creado: 30/09/2015
//Propósito: Crear usuario desde la aplicación con clave de administrador

	session_start();

	if(isset($_SESSION['s_usuario']) && $_SESSION['s_estado']==1){
		$sesion = True;
	}
	else{
		$sesion = False;
		header("Location: cerrar_sesion.php");
	}

	$tipousuario 	=	$_SESSION['s_tipusu'];
	$ususesion 		=	$_SESSION['s_usuario'];
	$oficina 		=	$_SESSION['s_oficina'];

	$cuantia 			=$_POST['cuantia'];
	$TipoAccion			=$_POST['TipAcc'];
	$detalleconsulta	=$_POST['detaconsulta'];
	$observaciones 		=$_POST['observaciones'];

	include('nav.php');
	include('menu.php');
	include_once('../model/usuariosModel.php');	

	$obj_model = new usuariosModel();
	$resultado = $obj_model->getConsultaExpedientes($conexion); //Resultado de la consulta del usuario que se encuentra con sesión iniciada
	$accion = $obj_model->getTipoAccion($conexion);
?>

	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<h8 align='center'><b>CREANDO EXPEDIENTE</b></h8>
			</div>
			<div >
				<form name="frm_Usuarios" id="frm_Usuarios" method="POST" action="">
					<div id="mensaje" style="display: none;">

					</div>
					<div class="row ">	

							<div align='center' class="jumbotron">
							<div  class="col-xs-12  col-sm-6 col-md-3 col-lg-3">
							<label>No. de Consulta: </label>
							<input type="text" name="NoConsulta" id="NoConsulta"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_NoConsulta']?>" disabled>
							</div>


							<div div class="col-xs-12  col-sm-5 col-md-3 col-lg-3 ">
							<label>Documento Cliente: </label>
							<input type="number" min="1" name="documento" id="documento"  class="form-control" placeholder="Documento" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_Cliente']?>" disabled="disabled" required/>
							</div>


						<div class="col-xs-12  col-sm-5 col-md-5 col-lg-5 ">
						<label>Nombre del Cliente: </label>
						<input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombres" value="<?php echo $resultado['usu_Nombres']?> <?php echo $resultado['usu_Apellidos']?>" disabled="disabled" required/>
						</div>

						echo '<div  class="col-xs-12  col-sm-6 col-md-3 col-lg-3">';
						echo '<label>Cuantía: </label>';	
						echo '<input type="number" name="cuantia" id="cuantia"  class="form-control" aria-describedby="sizing-addon3" value="'.$resultado['cons_Cuantia'].'">';
						echo '</div>';


						<div class="col-xs-12  col-sm-5 col-md-6 col-lg-6 " >
						<label>Tipo de Acción: </label>
						<select name="TipAcc" id="TipAcc" class="form-control" aria-describedby="sizing-addon2">
						<option value="<?php  $resultado['cons_TipoAccion']?>"><?php echo $resultado['tipAcc_TipoAccion']; ?></option>
						<?php $obj_model-> getTipoAccion($conexion)?>
						</select>
						</div>

						</div> 



						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 has-default">
						<label>Telefono: </label>
						<input type="number" pattern="[0-9, -]*" name="telefono" id="telefono" class="form-control" placeholder="Utilice indicativo y es fuera de Bogotá" required/>
						</div>

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 has-default">
						<label>Celular: </label>
						<input type="number" pattern="[0-9, -]*" name="celular" id="celular" class="form-control">
						</div>


						<div class="col-xs-12  col-sm-6 col-md-6 col-lg-3 has-default">
						<label>Email: </label>
						<input type="email" name="email" id="emial" class="form-control" placeholder="Email" required/>
						</div>

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 has-default">
							<label>Genero: </label>
							<br>
							<input type="radio" name="genero" id="genero" value="F"> Femenino 
							<input type="radio" name="genero" id="genero" Value="M"> Masculino
						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12 has-default">
						</div>

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 has-default">
							<label>Tipo de Usuario: </label>
							<select name="tipusu" id="tipusu" class="form-control" required>
							    <option value="">Sin Seleccion</option>
								<?php echo $obj_model-> getTipoUsuario($conexion); ?>
						    </select>
						</div>

						<div class="col-xs-12  col-sm-6 col-md-2 col-lg-2 has-default">
							<label>Estado: </label>
							<select name="estado" id="estado" class="form-control" disabled="disabled">
								<?php echo $obj_model-> getEstadoUsuario($conexion); ?>				    
						    </select>
						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						<br>
						</div>

					<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6 has-default">
						<input type="submit" name="btn_GuardarNuevoUsuario" id="btn_GuardarNuevoUsuario" class="btn btn-primary" value="Guardar" >
						<input type="button" class="btn btn-primary" id="btn_CancelarCrearUsuairo" value="Cancelar" >
					</div>

						<div class="col-xs-12  col-sm-12 col-md-6 col-lg-12">
						</div>

						

					</div>
				</form>
			</div>
		</div>
					<br>
	</article>
	</section>
	</div>


<?php 
		include('footer.php');
 ?>