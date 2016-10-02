<?php	
// html y php Document
//Fecha creado: 27/09/2015
//Propósito: Editar usuarios empleados de la oficina desde el adminsitrador 
//           Adicionalmente el perfil secretario(a) podrá modificar los clientes pero no los usuarios

	session_start();

	if(isset($_SESSION['s_usuario'])){
		$sesion = True;
	}
	else{
		$sesion = False;
		header("Location: Index.php");
	}

	$tipousuario=$_SESSION['s_tipusu'];
	$ususesion=$_SESSION['s_usuario'];
	$usuario = $_GET['Documento'];

	include('nav.php');
	include('menu.php');
	include_once('../model/usuariosModel.php');	

	$obj_model = new usuariosModel();
	$resultado = $obj_model->getEdiUnUsuario($conexion);

?>
	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<h8 align='center'><b>MODIFICANDO UN USUARIO</b></h8>
			</div>
			<div >
				<form name="fModyUsuarios" id="fModyUsuarios" method="POST" action="">

					<div id="mensaje" style="display: none;">
					</div>

					<div class="row">	
							<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 " >
								<label>Tipo de Documento: </label>
								<select name="TipDoc" id="TipDoc" class="form-control" aria-describedby="sizing-addon2">
									<?php echo $obj_model-> getQryTipDoc($conexion);?>
									<?php echo $obj_model-> getTipoDocumento($conexion); ?>
						     	 </select>
							</div>

							<div div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 ">
							<label>Documento: </label>
							<input type="number" min="1" name="documento" id="documento"  class="form-control" placeholder="Documento" aria-describedby="sizing-addon3" value="<?php echo $resultado['usu_Documento']?>" required/>
							</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						</div>

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 ">
						<label>Nombres: </label>
						<input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombres" value="<?php echo $resultado['usu_Nombres']?>" required/>
						</div>

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 " >
						<label>Apellidos: </label>
						<input type="text" name="apellidos" id="apellidos"  class="form-control" placeholder="Apellidos" value="<?php echo $resultado['usu_Apellidos']?>" required/>
						</div>


						<div class="col-xs-12  col-sm-6 col-md-2 col-lg-2 ">
							<label>Genero: </label>
							<select name="genero" id="genero" class="form-control">
							<?php 
								if ($resultado['usu_Genero']=='F') {
									echo '<option value="F" selected>Femenino</option>';
									echo '<option value="M" >Masculino</option>';
								}else{
									echo '<option value="F">Femenino</option>';
									echo '<option value="M" selected>Masculino</option>';
								}
							 ?>
						    </select>
						</div>
						
						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						</div>

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 ">
							<label>Telefono: </label>
							<input type="text" name="telefono" id="telefono" class="form-control" placeholder="Utilice indicativo y es fuera de Bogotá" value="<?php echo $resultado['usu_Telefono']?>" required/>
						</div>

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 ">
							<label>Celular: </label>
							<input type="text" name="celular" id="celular" class="form-control" value="<?php echo $resultado['usu_Celular']?>">
						</div>


						<div class="col-xs-12  col-sm-6 col-md-5 col-lg-5 ">
							<label>Email: </label>
							<input type="text" name="email" id="emial" class="form-control" placeholder="Email" value="<?php echo $resultado['usu_Email']?>" required/>
						</div>


						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 ">
							<label>Estado: </label>
							<select name="estado" id="estado" class="form-control">
								<?php echo $obj_model-> getEstadoUsuario($conexion);?>
								<?php echo $obj_model-> getusuEstado($conexion);?>
    						</select>

						</div>

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 ">
							<label>Tipo de Usuario: </label>
							<select name="tipusu" id="tipusu" class="form-control">
								<?php echo $obj_model-> getQryTipUsuario($conexion);?>
								<?php echo $obj_model-> getTipoUsuario($conexion); ?>
						    </select>

						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
							<input type="submit" name="btn_ModyUsuarios" id="btn_ModyUsuarios" class="btn btn-primary" value="Guardar" >
							<input type="button" class="btn btn-primary" onclick="location.href='frm_ListaUsuarios.php'"value="Volver" >
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