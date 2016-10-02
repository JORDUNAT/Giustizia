<?php	

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

	include('nav.php');
	include('menu.php');
	include_once('../model/usuariosModel.php');	

	$obj_model = new usuariosModel();
	$resultado = $obj_model->getOficina($conexion);

?>
	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<h8 align='center'><b>MODIFICANDO DATOS DE MI OFICINA</b></h8>
			</div>
			<div >
				<form name="flk_oficina" id="flk_oficina" method="POST" action="">

					<div id="mensaje" style="display: none;">
					</div>

					<div class="row">	
							<div class="col-xs-12  col-sm-5 col-md-3 col-lg-3 " >
								<label>Tipo de Documento: </label>
								<select name="TipDoc" id="TipDoc" class="form-control" aria-describedby="sizing-addon2">
									<?php echo $obj_model-> getQryTipDocOf($conexion);?>
									<?php echo $obj_model-> getTipoDocumento($conexion); ?>
						     	 </select>
							</div>

							<div div class="col-xs-12  col-sm-5 col-md-3 col-lg-3 ">
							<label>Documento: </label>
							<input type="number" min="1" name="documento" id="documento"  class="form-control" placeholder="Documento" aria-describedby="sizing-addon3" value="<?php echo $resultado['usu_Documento']?>" disabled="disabled" required/>
							</div>

							<div div class="col-xs-12  col-sm-5 col-md-3 col-lg-3">
							<input type="number" min="1" name="documentooculto" id="documentooculto" style = "visibility:hidden"  class="form-control" placeholder="Documento" aria-describedby="sizing-addon3" value="<?php echo $resultado['usu_Documento']?>" required/>
							</div>


						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						</div>

						<div class="col-xs-12  col-sm-6 col-md-6 col-lg-6 ">
						<label>Nombre de la Oficina Jurídica: </label>
						<input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombres" value="<?php echo $resultado['usu_Nombres']?>" required/>
						</div>

						<div class="col-xs-12  col-sm-5 col-md-5 col-lg-5 ">
							<label>Dirección: </label>
							<input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion" value="<?php echo $resultado['usu_Direccion']?>" required/>
						</div>


						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						</div>
						
						<div class="col-xs-12  col-sm-5 col-md-2 col-lg-2 ">
							<label>Telefono: </label>
							<input type="number" name="telefono" id="telefono" class="form-control" placeholder="Utilice indicativo y es fuera de Bogotá" value="<?php echo $resultado['usu_Telefono']?>" required/>
						</div>

						<div class="col-xs-12  col-sm-5 col-md-3 col-lg-3 ">
							<label>Celular: </label>
							<input type="number" name="celular" id="celular" class="form-control" value="<?php echo $resultado['usu_Celular']?>">
						</div>


						<div class="col-xs-12  col-sm-5 col-md-4 col-lg-4 ">
							<label>Email: </label>
							<input type="email" name="email" id="emial" class="form-control" placeholder="Email" value="<?php echo $resultado['usu_Email']?>" required/>
						</div>

						<div class="col-xs-12  col-sm-6 col-md-2 col-lg-2 ">
							<label>Estado: </label>
							<select name="estado" id="estado" class="form-control" disabled="disabled">
								<?php echo $obj_model-> getEstadoUsuario($conexion);?>
								<?php echo $obj_model-> getusuEstado($conexion);?>
    						</select>

						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">

						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
							<input type="submit" name="btn_cambiooficina" id="btn_cambiooficina" class="btn btn-primary" value="Guardar" >
							<input type="button" class="btn btn-primary" onclick="location.href='frm_Base.php'"value="Cancelar" >
						</div>

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