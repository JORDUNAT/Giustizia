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
	$data = $obj_model -> getQryProceso($conexion);

?>
	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<h8 align='center'><b>MODIFICANDO LA CLASIFICACIÓN DE PROCESOS No. <?php echo $data['clapro_Id']?> </b></h8>
			</div>
			<div >
				<form name="flk_TipoProcesosf" id="flk_TipoProcesosf" method="POST" action="">

					<div id="mensaje" style="display: none;">
					</div>

					<div class="row" align="center">	

							<div align="center" class="col-xs-12  col-sm-6 col-md-3 col-lg-3 ">
							<input type="number" min="1" name="item" id="item" style = "visibility:hidden"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $data['clapro_Id']?>"  required/> 
							</div>

							<div class="col-xs-12  col-sm-6 col-md-6 col-lg-6 ">
							<label>Clasificación del Proceso: </label>
							<input type="text" name="descripcion" id="descripcion"  class="form-control" placeholder="Tipo de Clasifiación" value="<?php echo $data['clapro_ClasificacionProceso']?>" required/>
							</div>



						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">

						</div>

						<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6" align="right">
							<input type="submit" name="btn_ModyProcesos" id="btn_ModyProcesos" class="btn btn-primary" value="Guardar" >
							<input type="button" class="btn btn-primary" onclick="location.href='frm_ListaTipoProcesos.php'" value="Cancelar" >
						</div>

						<div class="col-xs-12  col-sm-12 col-md-5 col-lg-5" align="left">
							<input type="submit" name="btn_EliminaProcesos" id="btn_EliminaProcesos" class="btn btn-danger" value="Eliminar" >
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