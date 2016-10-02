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
	$data = $obj_model -> getQryAccion($conexion);

?>
	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<h8 align='center'><b>MODIFICANDO TIPO DE ACCIÓN No. <?php echo $data['tipAcc_Id']?> </b></h8>
			</div>
			<div >
				<form name="flk_TipoAccionf" id="flk_TipoAccionf" method="POST" action="">

					<div id="mensaje" style="display: none;">
					</div>

					<div class="row" align="center">	

							<div align="center" class="col-xs-12  col-sm-6 col-md-3 col-lg-3 ">
							<input type="number" min="1" name="item" id="item" style = "visibility:hidden"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $data['tipAcc_Id']?>"  required/> 
							</div>

							<div class="col-xs-12  col-sm-6 col-md-6 col-lg-6 ">
							<label>Tipo de Acción: </label>
							<input type="text" name="descripcion" id="descripcion"  class="form-control" placeholder="Tipo de Acción" value="<?php echo $data['tipAcc_TipoAccion']?>" required/>
							</div>



						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">

						</div>

						<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6" align="right">
							<input type="submit" name="btn_ModyTipoAccion" id="btn_ModyTipoAccion" class="btn btn-primary" value="Guardar" >
							<input type="button" class="btn btn-primary" onclick="location.href='frm_ListaTipoaccion.php'" value="Cancelar" >
						</div>

						<div class="col-xs-12  col-sm-12 col-md-5 col-lg-5" align="left">
							<input type="submit" name="btn_EliminaAccion" id="btn_EliminaAccion" class="btn btn-danger" value="Eliminar" >
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