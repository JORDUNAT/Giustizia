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
	$data = $obj_model -> getQryTipJuzg($conexion);

?>
	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<h8 align='center'><b>MODIFICANDO TIPO DE JUZGADO No. <?php echo $data['tipjuz_Id']?> </b></h8>
			</div>
			<div >
				<form name="flk_TipoJuzgadof" id="flk_TipoJuzgadof" method="POST" action="">

					<div id="mensaje" style="display: none;">
					</div>

					<div class="row" align="center">	

							<div align="center" class="col-xs-12  col-sm-6 col-md-3 col-lg-3 ">
							<input type="number" min="1" name="item" id="item" style = "visibility:hidden"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $data['tipjuz_Id']?>"  required/> 
							</div>

							<div class="col-xs-12  col-sm-6 col-md-6 col-lg-6 ">
							<label>TIPO DE JUZGADO: </label>
							<input type="text" name="descripcion" id="descripcion"  class="form-control" placeholder="TIPO DE JUZGADO" value="<?php echo $data['tipjuz_TipoJuzgado']?>" required/>
							</div>



						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">

						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12" align="right">
							<input type="submit" name="btn_ModTipJuzg" id="btn_ModTipJuzg" class="btn btn-primary" value="Guardar" >
							<input type="button" class="btn btn-primary" onclick="location.href='frm_ListaTipoJuzgado.php'" value="Cancelar" >
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