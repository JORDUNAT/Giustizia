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

	$tipousuario=$_SESSION['s_tipusu'];

	include('nav.php');
	include('menu.php');
	include_once('../model/usuariosModel.php');	

	$obj_model = new usuariosModel();
?>

	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<h8 align='center'><b>CREANDO USUARIO</b></h8>
			</div>
			<div >
				<form name="frm_Usuarios" id="frm_Usuarios" method="POST" action="">
					<div id="mensaje" style="display: none;">

					</div>
					<div class="row ">	
							<div class="col-xs-12  col-sm-6 col-md-2 col-lg-2  has-default" >
								<label>Tipo de Documento: </label>
								<select name="TipDoc" id="TipDoc" class="form-control" aria-describedby="sizing-addon2" required>
								    <option value="">Sin Seleccion</option>
									<?php echo $obj_model-> getTipoDocumento($conexion); ?>
						     	 </select>
							</div>

							<div div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 has-default">
							<label>Documento: </label>
							<input type="number" min="1" name="documento" id="documento"  class="form-control" placeholder="Documento" aria-describedby="sizing-addon3" required/>
							</div>

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 " >
							<label>Departamento: </label>
							<select name="departamento" id="departamento" class="form-control" onchange="from(document.frm_Usuarios.departamento.value,'midiv','../model/municipios.php')" required>
								<option value="">Sin Seleccion</option>
								<?php echo $obj_model-> getDepartamentos($conexion); ?>
						    </select>
						</div>

						<div  id="midiv" class="col-xs-12  col-sm-6 col-md-3 col-lg-3 " >
						</div>	


						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						</div>

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 has-default">
						<label>Nombres: </label>
						<input type="text" pattern="[a-zA-Z, Ñ, ñ, ' ']*" name="nombre" id="nombre"  class="form-control" placeholder="Nombres" required/>
						</div>

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 has-default" >
						<label>Apellidos: </label>
						<input type="text" pattern="[a-zA-Z, Ñ, ñ, ' ']*" name="apellidos" id="apellidos"  class="form-control" placeholder="Apellidos" required/>
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