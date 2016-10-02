
<?php	

// Html5 y PHP
//Fecha creado: 27/06/2016
//Propósito: Modificación Municipios


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
	$data = $obj_model -> getQryMunicipios($conexion);

?>
	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<h8 align='center'><b>MODIFICANDO EL MUNICIPIO CON CODIGO  <?php echo $data['muni_Codigo']?> </b></h8>
			</div>
			<div >
				<form name="flk_Municipiof" id="flk_Municipiof" method="POST" action="">

					<div id="mensaje" style="display: none;">
					</div>

					<div class="row" align="center">	

							<div align="center" class="col-xs-12  col-sm-3 col-md-3 col-lg-3 ">
							<input type="number" min="1" name="item" id="item" style = "visibility:hidden"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $data['muni_Codigo']?>"  required/> 
							</div>

							<div class="col-xs-12  col-sm-6 col-md-6 col-lg-6 ">
							<label>Departamento: </label>
							<input type="text" name="descripcion" id="descripcion"  class="form-control" placeholder="Departamento" value="<?php echo $data['depa_Departamento']?>" disabled/>
							</div>

							<div align="center" class="col-xs-12  col-sm-12 col-md-12 col-lg-12 ">
							</div>

							<br>
							<div align="center" class="col-xs-12  col-sm-3 col-md-3 col-lg-3 ">
							</div>

							<div align="center" class="col-xs-12  col-sm-6 col-md-6 col-lg-6 ">
							<label>Municipio: </label>
							<input type="text" name="municipio" id="municipio"  class="form-control" placeholder="Municipio" value="<?php echo $data['muni_Municipio']?>" required/>
							</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
							<br>
						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12" align="center">
							<input type="submit" name="btn_ModMunici" id="btn_ModMunici" class="btn btn-primary" value="Guardar" >
							<input type="button" class="btn btn-primary" onclick="location.href='frm_ListaMunicipios.php'" value="Cancelar" >
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