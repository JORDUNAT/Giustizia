<?php	

	include('head.php');
	include_once('../model/usuariosModel.php');	

	$obj_model = new usuariosModel();

?>

<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12 " >
</div>
	<article class="col-xs-12  col-sm-1 col-md-1 col-lg-1">
	</article>
	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12" >
			<div align='center' class="jumbotron">
			<h8  align='center'><b>REGISTRO DE OFICINA JURIDICA</b></h8>
			</div>
			<div >
				<form name="RegOficinas" id="RegOficinas" method="POST" action="" enctype="multipart/form-data">
					<div id="mensaje" style="display: none;">

					</div>
					<div class="row">

							<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 " >
								<label>Tipo de Documento: </label>
								<select name="TipDoc" id="TipDoc" class="form-control" aria-describedby="sizing-addon2" required>
								    <option value="">Sin Seleccion</option>
									<?php echo $obj_model-> getTipoDocumento($conexion); ?>
						     	 </select>
							</div>

							<div div class="col-xs-12  col-sm-6 col-md-4 col-lg-4 ">
							<label>Documento: </label>
							<input type="number" min="1" name="documento" id="documento"  class="form-control" placeholder="Documento" aria-describedby="sizing-addon3" value="<?php echo $resultado['Documento']?>" required/>
							</div>

							<div class="col-xs-12  col-sm-6 col-md-6 col-lg6 ">
							<label>Nombre Ofincina Jurídica:  </label>
							<input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombres" required/>
							</div>

							<div class="col-xs-12  col-sm-5 col-md-5 col-lg-5 ">
								<label>Dirección: </label>
								<input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion" required/>
							</div>


						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						</div>
						
						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 " >
							<label>Departamento: </label>
							<select name="departamento" id="departamento" class="form-control" onchange="from(document.RegOficinas.departamento.value,'midiv','../model/municipios.php')" required>
								<option value="">Sin Seleccion</option>
								<?php echo $obj_model-> getDepartamentos($conexion); ?>
						    </select>
						</div>

						<div  id="midiv" class="col-xs-12  col-sm-6 col-md-4 col-lg-4 " >
						</div>						

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						</div>

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 ">
							<label>Telefono: </label>
							<input type="number" name="telefono" id="telefono" class="form-control" placeholder="Utilice indicativo" required/>
						</div>

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3 ">
							<label>Celular: </label>
							<input type="number" name="celular" id="celular" class="form-control">
						</div>


						<div class="col-xs-12  col-sm-6 col-md-5 col-lg-5 ">
							<label>Email: </label>
							<input type="email" name="email" id="emial" class="form-control" placeholder="Email" required/>
						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						</div>

						<div class="col-xs-12  col-sm-11 col-md-11 col-lg-11" align="center">
							<input type="submit" name="btn_RegistarOficina" id="btn_RegistarOficina" class="btn btn-primary" value="Guardar" >
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