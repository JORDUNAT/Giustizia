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
	$tipjuz = $data['juz_TipoJuzgado'];
?>
	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<h8 align='center'><b>MODIFICANDO JUZGADO No. <?php echo $data['juz_Id']?> </b></h8>
			</div>
			<div >
				<form name="flk_Juzgadosf" id="flk_Juzgadosf" method="POST" action="">

					<div id="mensaje" style="display: none;">
					</div>

					<div class="row" align="center">	

							<div align="center" class="col-xs-12  col-sm-6 col-md-1 col-lg-1 ">
							<input type="number" min="1" name="item" id="item" style = "visibility:hidden"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $data['juz_Id']?>"  required/> 
							</div>

								<div class="col-xs-12  col-sm-12 col-md-5 col-lg-5">
								<label>Nombre del Juzgado: </label>
								<input type="text" name="juzgado" id="juzgado"  class="form-control" value="<?php echo $data['juz_Juzgado']?>" required/>
								</div>

								<div align="center" class="col-xs-12  col-sm-12 col-md-5 col-lg-5">
								<label>Circuito: </label>
								<input type="text" name="circuito" id="circuito"  class="form-control" value="<?php echo $data['juz_Circuito']?>"/>
								</div>								
								
								<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6">
								<label>Distrito: </label>
								<input type="text" name="distrito" id="distrito"  class="form-control" value="<?php echo $data['juz_Distrito']?>" required/>
								</div>

								<div align="center" class="col-xs-12  col-sm-12 col-md-5 col-lg-5">
								<label>Dirección: </label>
								<input type="text" name="direccion" id="direccion"  class="form-control" value="<?php echo $data['juz_Direccion']?>"/>
								</div>

								<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6">
								<label>Telefono: </label>
								<input type="number" name="telefono" id="telefono"  class="form-control" value="<?php echo $data['juz_Telefono']?>" required/>
								</div>

								<div align="center" class="col-xs-12  col-sm-12 col-md-5 col-lg-5">
								<label>Contacto: </label>
								<input type="text" name="contacto" id="contacto"  class="form-control" value="<?php echo $data['juz_Contacto']?>"/>
								</div>	

								<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6">
								<label>Horario de Atención: </label>
								<input type="text" name="horario" id="horario"  class="form-control" value="<?php echo $data['juz_HorarioAtencion']?>" required/>
								</div>

								<div class="col-xs-12  col-sm-12 col-md-5 col-lg-5  has-default" >
								<label>Tipo de Juzgado: </label>
								<select name="TipJuz" id="TipJuz" class="form-control" aria-describedby="sizing-addon2" required>
									<?php echo $obj_model-> getQryTipJuzgadouno($conexion); ?>
									<?php echo $obj_model-> getTipoJuzgado($conexion); ?>
						     	 </select>
								</div>	



						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						<br>
						</div>

						<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6" align="right">
							<input type="submit" name="btn_ModyJuzgado" id="btn_ModyJuzgado" class="btn btn-primary" value="Guardar" >
							<input type="button" class="btn btn-primary" onclick="location.href='frm_ListaJuzgados.php'" value="Cancelar" >
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