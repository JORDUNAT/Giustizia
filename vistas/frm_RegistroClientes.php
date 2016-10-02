 <?php	
// html y php Document
//Fecha creado: 13/12/2015
//Propósito: Registro de Cliente, permite que un cliente registre una consutla seleccionando la oficina de su preferencia de acuerdo a la dirección


	include('head.php');
	include_once('../model/usuariosModel.php');	

	$obj_model = new usuariosModel(); //UsuarioModel es un archivo que contiene consultas a la base de datos

?>

<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12 " >
</div>
	<article class="col-xs-12  col-sm-1 col-md-1 col-lg-1">
	</article>
	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align="center"  class="jumbotron">
			<h8 align="center" ><b>REGISTRA TU CONSULTA JURIDICA</b></h8>
			</div>
			<div >
				<form name="RegClientes" id="RegClientes" method="POST" action="">
					
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
							<select name="departamento" id="departamento" class="form-control" onchange="from(document.RegClientes.departamento.value,'midiv','../model/municipios.php')" required>
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

						<div class="col-xs-12  col-sm-6 col-md-6 col-lg-6 " >
							<label>Selecciona una oficina: </label>
							<select name="oficina" id="oficina" class="form-control" required>
								<option value="">Sin Seleccion</option>
								<?php echo $obj_model-> getSelecOfis($conexion); ?>
						    </select>
						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
							<label>* Describe tu Consulta: </label>
							<textarea type="text" name="consulta" id="consulta" cols="15" rows="4" class="form-control" ></textarea>
						</div>


						<div class="col-xs-12  col-sm-11 col-md-11 col-lg-11" align="center">
							<input type="submit" name="btn_RegistarCliente" id="btn_RegistarCliente" class="btn btn-primary" value="Guardar" >
							<input type="button" class="btn btn-primary" onclick="location.href='Index.php'" value="Cancelar" >
						</div>

					</div>
				</form>
			</div>
		</div>
		<br>
	</article>
	</section>
	</div>

	<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<br>
	</div>

<?php 
		include('footer.php');
 ?>