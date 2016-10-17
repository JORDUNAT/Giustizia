<?php	
// html y php Document
//Fecha creado: 30/09/2015
//Propósito: Crear usuario desde la aplicación con clave de administrador o con rol de secreatrio(a)

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
			<h8 align='center'><b>CREANDO CLIENTE</b></h8>
			</div>
			<div >
				<form name="frm_clientes" id="frm_clientes" method="POST" action="">
					<div id="mensaje" style="display: none;">

					</div>
					<div class="row">

							<div class="col-xs-12  col-sm-6 col-md-2 col-lg-2 " >
								<label>Tipo Doc: </label>
								<select name="TipDoc" id="TipDoc" class="form-control" aria-describedby="sizing-addon2" required>
								    <option value="">Sin Seleccion</option>
									<?php echo $obj_model-> getTipoDocumento($conexion); ?>
						     	 </select>
							</div>

							<div div class="col-xs-12  col-sm-6 col-md-2 col-lg-2 ">
							<label>Documento: </label>
							<input type="number" min="1" name="documento" id="documento"  class="form-control" placeholder="Documento" required/>
							</div>

							<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 ">
							<label>Nombres: </label>
							<input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombres" required/>
							</div>

							<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 " >
							<label>Apellidos: </label>
							<input type="text" name="apellidos" id="apellidos"  class="form-control" placeholder="Apellidos" required/>
							</div>

							<div class="col-xs-12  col-sm-6 col-md-4 col-lg-4 ">
								<label>Dirección: </label>
								<input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion" required/>
							</div>

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 " >
							<label>Departamento: </label>
							<select name="departamento" id="departamento" class="form-control" onchange="from(document.frm_clientes.departamento.value,'midiv','../model/municipios.php')" required>
								<option value="">Sin Seleccion</option>
								<?php echo $obj_model-> getDepartamentos($conexion); ?>
						    </select>
						</div>

						<div  id="midiv" class="col-xs-12  col-sm-6 col-md-4 col-lg-4 " >
						</div>						

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						</div>

						<div class="col-xs-12  col-sm-6 col-md-2 col-lg-2 ">
							<label>Genero: </label>
							<select name="genero" id="genero" class="form-control">
							    <option value="">Sin Seleccion</option>
							    <option value="F">Femenino</option>
							    <option value="M">Masculino</option>
						    </select>
						</div>

						<div class="col-xs-12  col-sm-6 col-md-2 col-lg-2 ">
							<label>Telefono: </label>
							<input type="number" name="telefono" id="telefono" class="form-control" placeholder="Utilice indicativo" required/>
						</div>

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 ">
							<label>Celular: </label>
							<input type="number" name="celular" id="celular" class="form-control">
						</div>


						<div class="col-xs-12  col-sm-6 col-md-4 col-lg-4 ">
							<label>Email: </label>
							<input type="email" name="email" id="email" class="form-control" placeholder="Email" required/>
						</div>

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 " required>
							<label>Fecha de Nacimiento: </label>
							<input type="date" name="fecha" id="fecha" class="form-control">
						</div>

						<div class="col-xs-12  col-sm-6 col-md-2 col-lg-2">
							<label>Estrato: </label>
							<select name="estrato" id="estrato" class="form-control">
								<option value="">Sin Seleccion</option>
								<?php echo $obj_model-> getEstratos($conexion); ?>
						    </select>
						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
							<br>
						</div>

						<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
							<label>Descripción de la Consulta: </label>
							<textarea type="text" name="consulta" id="consulta" cols="15" rows="4" class="form-control" ></textarea>
							<br>
						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
							<br>
						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12" align="rigth">
							<input type="submit" name="btn_NuevoCliente" id="btn_NuevoCliente" class="btn btn-primary" value="Guardar" >
							<input type="button" class="btn btn-primary" id="btn_CancelarCrearCliente" value="Cancelar" >
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