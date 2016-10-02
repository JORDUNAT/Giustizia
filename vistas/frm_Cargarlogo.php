<?php	

	session_start();

	if(isset($_SESSION['s_usuario']) && $_SESSION['s_estado']==1){
		$sesion = True;
	}
	else{
		$sesion = False;
		header("Location: cerrar_sesion.php");
	}

	include('nav.php');
	include('menu.php');
	include_once('../model/usuariosModel.php');	
	$obj_model = new usuariosModel();

	$tipousuario 	=$_SESSION['s_tipusu'];
	$logo 			=$_SESSION['s_logo'];


?>

	<article class="col-xs-12  col-sm-9 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<h8 align='center'><b>CARGAR LOGO DE OFICINA JURIDICA</b></h8>
			</div>
			<div >
				<p>Aquí podrás agregar el logo de tu oficina, el cual saldrá en los reportes generes. Pero es importante que tengas en cuenta que solo se admite imagenes en formato .png. Después de hacerlo oprime la techa "F5" para que veas los cambios.</p>
				<form name="frm_logo" id="frm_logo" method="POST" action="../model/frm_CargarLogo.php" enctype="multipart/form-data">

					<div id="mensaje" style="display: none;">
					</div>
					<div class="caja">
							<?php 

							if(!$logo){
	                            if($_SESSION['s_tipusu']=='1'){
	                            	echo "<div id='subirlogo'>";
	                            	echo "<div id='preview' class='thumbnail'>";
	                            	echo '<a class="btn btn-primary" id="file-select">Elegir Logo</a>';
	                            	echo '<img src="../img/FondoImagen.png"/>';
	                            	echo '</div>';
	                            	echo '<span class="alert alert-info" id="file-info">No 
					                hay Logo aún. <br>Te informamos que solo se admiten imaganes .png</span>';
	                            	echo '<input type="file" name="file" id="file">';
	                            	echo '<input class="btn btn-primary"  type="submit" id="file-save" value="Cargar Logo">';
	                            	echo '</div>';

	                            }else{
									echo '<div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-info-sign"></span> Lo sentimos pero no tienes autorización para actualizar el logo de la oficina  </div>';
	                            }	
							}else{
	                            if($_SESSION['s_tipusu']=='1'){
	                            	echo "<div id='subirlogo'>";
	                            	echo "<div id='preview' class='thumbnail'>";
	                            	echo '<img src="'.$logo.'" height="50%" /><br><br>';
	                            	echo '<a class="btn btn-primary" id="file-select">Elegir Logo</a>';	
	                            	echo '</div>';
	                            	echo '<span class="alert alert-info" id="file-info"><b>'.$_SESSION['s_nombre'].'<br>Recurda, si deseas cambiar tu logo solo se admite imagenes en formato .png </span> ';
	                            	echo '<input type="file" name="file" id="file" hidden />';
	                            	echo '<input class="btn btn-primary" id="btn_CargarLogo" type="submit" id="file-save" name="file-save" value="Cargar Logo"/>';
	                            	echo '</div>';  
                          	
	                            }else{
									echo '<div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-info-sign"></span> Lo sentimos pero no tienes los privilegios para actualizar el logo de la oficina.  </div>';
	                            }
							}
							

							 ?>						
					</div>
				</form>
			</div>
		</div>
	</article>
	</section>
	</div>

	<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<br>
	</div>

<?php 
		include('footer.php');
 ?>