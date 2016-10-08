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
	$data = $obj_model -> getQryJuzgado($conexion);

?>
	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<h8 align='center'><b>MODIFICANDO JUZGADO No. <?php echo $data['juz_Id']?> </b></h8>
			</div>
			<div >
				<form name="flk_TipoAccionf" id="flk_TipoAccionf" method="POST" action="">

					<div id="mensaje" style="display: none;">
					</div>

					<div class="row" align="center">	

							<div align="center" class="col-xs-12  col-sm-6 col-md-1 col-lg-1 ">
							<input type="number" min="1" name="item" id="item" style = "visibility:hidden"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $data['juz_Id']?>"  required/> 
							</div>

															<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6">
								<label>Nombre del Juzgado: </label>
								<input type="text" name="juzgado" id="juzgado"  class="form-control" placeholder="Juzgado" required/>
								</div>

								<div align="center" class="col-xs-12  col-sm-12 col-md-5 col-lg-5">
								<label>Circuito: </label>
								<input type="text" name="circuito" id="circuito"  class="form-control" placeholder="Circuitto"/>
								</div>								
								
								<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6">
								<label>Distrito: </label>
								<input type="text" name="distrito" id="distrito"  class="form-control" placeholder="Distrito" required/>
								</div>

								<div align="center" class="col-xs-12  col-sm-12 col-md-5 col-lg-5">
								<label>Dirección: </label>
								<input type="text" name="direccion" id="direccion"  class="form-control" placeholder="Dirección"/>
								</div>

								<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6">
								<label>Telefonos: </label>
								<input type="number" name="telefono" id="telefono"  class="form-control" placeholder="Telefonos" required/>
								</div>

								<div align="center" class="col-xs-12  col-sm-12 col-md-5 col-lg-5">
								<label>Contacto: </label>
								<input type="text" name="contacto" id="contacto"  class="form-control" placeholder="Contacto"/>
								</div>	

								<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6">
								<label>Horario de Atención: </label>
								<input type="text" name="horario" id="horario"  class="form-control" placeholder="Usa hora militar" required/>
								</div>

								<div class="col-xs-12  col-sm-12 col-md-5 col-lg-5  has-default" >
								<label>Tipo de Juzgado: </label>
								<select name="TipJuz" id="TipJuz" class="form-control" aria-describedby="sizing-addon2" required>
								    <option value="">Sin Seleccion</option>
									<?php echo $obj_model-> getTipoJuzgado($conexion); ?>
						     	 </select>
							</div>	



						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">

						</div>

						<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6" align="right">
							<input type="submit" name="btn_ModyJuzgado" id="btn_ModyJuzgado" class="btn btn-primary" value="Guardar" >
							<input type="button" class="btn btn-primary" onclick="location.href='frm_ListaTipoaccion.php'" value="Cancelar" >
						</div>

						<div class="col-xs-12  col-sm-12 col-md-5 col-lg-5" align="left">
							<input type="submit" name="btn_EliminaAccion" id="btn_EliminaAccion" class="btn btn-danger" value="Eliminar" >
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