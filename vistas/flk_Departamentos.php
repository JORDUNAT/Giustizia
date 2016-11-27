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
	$data = $obj_model->getQryDepartamentos($conexion);

?>
	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<h8 align='center'><b>MODIFICANDO DEPARTAMENTO CON CODIGO  <?php echo $data['depa_Codigo']?> </b></h8>
			</div>
			<div >
				<form name="flk_Departamentof" id="flk_Departamentof" method="POST" action="">

					<div id="mensaje" style="display: none;">
					</div>

					<div class="row" align="center">	

							<div align="center" class="col-xs-12  col-sm-3 col-md-3 col-lg-3 ">
							<input type="number" min="1" name="item" id="item" style = "visibility:hidden"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $data['depa_Codigo']?>"  required/> 
							</div>

							<div class="col-xs-12  col-sm-6 col-md-6 col-lg-6 ">
							<label>Departamento: </label>
							<input type="text" name="descripcion" id="descripcion"  class="form-control" placeholder="Departamento" value="<?php echo $data['depa_Departamento']?>" required/>
							</div>

							<div align="center" class="col-xs-12  col-sm-12 col-md-12 col-lg-12 ">
							</div>

							<br>
							<div align="center" class="col-xs-12  col-sm-3 col-md-3 col-lg-3 ">
							</div>

							<div align="center" class="col-xs-12  col-sm-6 col-md-6 col-lg-6 ">
							<label>Capital: </label>
							<input type="text" name="capital" id="capital"  class="form-control" placeholder="Capital" value="<?php echo $data['depa_Capital']?>" required/>
							</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
							<br>
						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12" align="center">
							<input type="submit" name="btn_ModDeparta" id="btn_ModDeparta" class="btn btn-primary" value="Guardar" >
							<input type="button" class="btn btn-primary" onclick="location.href='frm_ListaDepartamentos.php'" value="Cancelar" >
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