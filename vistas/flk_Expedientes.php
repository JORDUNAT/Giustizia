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
	$resultado = $obj_model -> getQryConsExped($conexion);

?>
	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<h8 align='center'><b>MODIFICANDO EXPEDIENTE No. <?php echo $resultado['exp_NumeroExpediente']?> </b></h8>
			</div>
			<div >
				<form name="flk_Expedientef" id="flk_Expedientef" method="POST" action="">

					<div id="mensaje" style="display: none;">
					</div>

					<div class="row" align="center">	

						<div class="col-xs-12  col-sm-3 col-md-3 col-lg-3 ">
							<label>Documento Cliente: </label>
							<input type="number" min="1" name="documento" id="documento"  class="form-control" placeholder="Documento" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_Cliente']?>" disabled="disabled" required/>
						</div>


						<div class="col-xs-12  col-sm-5 col-md-5 col-lg-5 ">
						<label>Nombre del Cliente: </label>
						<input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombres" value="<?php echo $resultado['usu_Nombres']?> <?php echo $resultado['usu_Apellidos']?>" disabled="disabled" required/>
						</div>

					<div align='center' class="jumbotron  col-xs-12  col-sm-12 col-md-12 col-lg-12">
					</div>

      		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
      			<label>Fecha del Expediente: </label>
      			<input type="date" name="fechaex" id="fechaex" value="<?php echo $resultado['exp_FechaExpediente']?>" />
      			
      		</div>

			<div class="col-xs-12  col-sm-8 col-md-8 col-lg-8  has-default" align="left">
				<label>Tipo de Procesos: </label>
					<select name="tiproceso" id="tiproceso" class="form-control" aria-describedby="sizing-addon2" >
					<option   value="<?php echo $resultado['clapro_Id']?>"><?php echo $resultado['clapro_ClasificacionProceso']?></option>
					<?php echo $obj_model->getProcesos($conexion)?>	 
				</select>
			</div>

      		<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12" align="left">
				<label>Descripción del Proceso Jurídico: </label>
				<textarea type="text" name="detalleexpediente" id="detalleexpediente" cols="15" rows="3" class="form-control" ><?php echo $resultado['exp_ObservacionExpedientes']?>  </textarea>
			</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">

						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12" align="right">
							<input type="submit" name="btn_ModExpedi" id="btn_ModExpedi" class="btn btn-primary" value="Guardar" >
							<input type="button" class="btn btn-primary" onclick="location.href='frm_ListaExpedientes.php'" value="Cancelar" >
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