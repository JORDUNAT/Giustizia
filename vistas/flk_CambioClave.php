<?php	
// html y php Document
//Fecha creado: 19/03/2015
//Propósito: Permite que los usuarios o clienten puedan cambier la clave

	session_start();

	if(isset($_SESSION['s_usuario']) && $_SESSION['s_estado']==1){
		$sesion = True;
	}
	else{
		$sesion = False;
		header("Location: cerrar_sesion.php");
	}

	$tipousuario=$_SESSION['s_tipusu'];
	$ususesion=$_SESSION['s_usuario'];

	include('nav.php');
	include('menu.php');

?>
	<article id="articulo" class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div align="center" class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12" >
			<div align="center" class="jumbotron">
			<h8 align="center" ><b>CAMBIANDO MI CLAVE</b></h8>
			</div>
			<div align="center">
				<form align="center" name="flk_CambioClave" id="flk_CambioClave" method="POST" action="">

					<div id="mensaje" style="display: none;">
					</div>

					<div align="center"  class="row">	

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						</div>

						<div class="col-xs-12  col-sm-12 col-md-4 col-lg-4">
						</div>

						<div align="center"  class="col-xs-12  col-sm-4 col-md-4 col-lg-4 ">
							<input align="center" type="password" min="1" name="nueclave" id="nueclave"  class="form-control" placeholder="Nueva Contraseña" aria-describedby="sizing-addon3" required/>
						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						</div>

						<div class="col-xs-12  col-sm-12 col-md-4 col-lg-4">
						</div>

						<div align="center"  class="col-xs-12  col-sm-4 col-md-4 col-lg-4 ">
							<input align="center" type="password" min="1" name="confclave" id="confclave"  class="form-control" placeholder="Confirma tu Contraseña" aria-describedby="sizing-addon3" required/>
						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						</div>


						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
							<input type="submit" name="btn_CambiarClave" id="btn_CambiarClave" class="btn btn-primary" value="Cambiar Clave" >
							<input type="button" class="btn btn-primary" onclick="location.href='frm_Base.php'"value="Cancelar" >
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