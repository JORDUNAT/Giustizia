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

	$obj_model = new usuariosModel(); //Model usuario es un archivo que contiene consultas a la base de datos
	$resultado = $obj_model->getConsultaConsutla($conexion); //Resultado de la consulta del usuario que se encuentra con sesión iniciada
	$accion = $obj_model->getTipoAccion($conexion);

?>
	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<?php 
				if($resultado['cons_Estado']==3 || $resultado['cons_Estado']==4){
					echo "<h8 align='center'><b>CONSULTA No. ".$resultado['cons_NoConsulta']." ARCHIVADA </b></h8>";
				}else{
					echo "<h8 align='center'><b>GESTIONANDO CONSULTA: ".$resultado['cons_NoConsulta']."</b></h8>";
				}

			 ?>
			
			</div>
			<div >
				<form name="flk_consultas" id="flk_consultas" method="POST" action="frm_Expedientes.php">

					<div id="mensaje" style="display: none;">
					</div>

					<div class="row">	
							<div div class="col-xs-12  col-sm-5 col-md-3 col-lg-3 ">
							<label>Documento Cliente: </label>
							<input type="number" min="1" name="documento" id="documento"  class="form-control" placeholder="Documento" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_Cliente']?>" disabled="disabled" required/>
							</div>


						<div class="col-xs-12  col-sm-5 col-md-5 col-lg-5 ">
						<label>Nombre del Cliente: </label>
						<input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombres" value="<?php echo $resultado['usu_Nombres']?> <?php echo $resultado['usu_Apellidos']?>" disabled="disabled" required/>
						</div>

							<div  class="col-xs-12  col-sm-5 col-md-3 col-lg-3">
							<input type="number" min="1" name="documentooculto" id="documentooculto" style = "visibility:hidden"  class="form-control" placeholder="Documento" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_Cliente']?>" required/>
							</div>


						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						</div>

						<div  class="col-xs-12  col-sm-6 col-md-3 col-lg-3">
							<label>No. de Consulta: </label>
							<input type="text" name="NoConsulta" id="NoConsulta"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_NoConsulta']?>" disabled>
						</div>

						<div  class="col-xs-12  col-sm-6 col-md-3 col-lg-3">
							<label>Fecha de Consulta: </label>
							<input type="text" name="FechaConsulta" id="FechaConsulta"  class="form-control" value="<?php echo $resultado['cons_Fecha']?>" disabled>
						</div>						

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3">
							<label>Atendido por: </label>
							<input type="text" name="Atendido" id="Atendido"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_Atendido']?>" disabled>
						</div>

				<?php 
					if ($resultado['cons_Estado']==2 || $resultado['cons_Estado']==4){
						echo '<div  class="col-xs-12  col-sm-6 col-md-3 col-lg-3">';
						echo '<label>Cuantía: </label>';	
						echo '<input type="number" name="cuantia" id="cuantia"  class="form-control" aria-describedby="sizing-addon3" value="'.$resultado['cons_Cuantia'].'" disabled>';
						echo '</div>';

						echo '<div class="col-xs-12  col-sm-5 col-md-3 col-lg-3 " >';
						echo '<label>Tipo de Acción: </label>';

						echo '<select disabled name="TipAcc" id="TipAcc" class="form-control" aria-describedby="sizing-addon2">';
						echo '<option value="'.$resultado['cons_TipoAccion'].'">'.$resultado['tipAcc_TipoAccion'].'</option>';
						echo $obj_model-> getTipoAccion($conexion);
						echo '</select>';
						echo '</div>';


						echo '<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">';
						echo '<label>Detalle de Consulta: </label>';
						echo '<textarea disabled type="text" name="detaconsulta" id="detaconsulta" cols="15" rows="4" class="form-control" >'.$resultado['cons_DetalleConsulta'].'</textarea>';
						echo '</div>';

						echo '<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">';
						echo '<label>Observaciones o Recomendaciones: </label>';
						echo '<textarea disabled type="text" name="observaciones" id="observaciones" cols="15" rows="4" class="form-control" >'.$resultado['cons_Observaciones'].'</textarea>';
						echo '</div>';


					}else{
						echo '<div  class="col-xs-12  col-sm-6 col-md-3 col-lg-3">';
						echo '<label>Cuantía: </label>';	
						echo '<input type="number" name="cuantia" id="cuantia"  class="form-control" aria-describedby="sizing-addon3" value="'.$resultado['cons_Cuantia'].'">';
						echo '</div>';

						echo '<div class="col-xs-12  col-sm-5 col-md-6 col-lg-6 " >';
						echo '<label>Tipo de Acción: </label>';
						echo '<select name="TipAcc" id="TipAcc" class="form-control" aria-describedby="sizing-addon2">';
						echo '<option value="'.$resultado['cons_TipoAccion'].'">'.$resultado['tipAcc_TipoAccion'].'</option>';
						echo $obj_model-> getTipoAccion($conexion);
						echo '</select>';
						echo '</div>';


						echo '<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">';
						echo '<label>Detalle de Consulta: </label>';
						echo '<textarea type="text" name="detaconsulta" id="detaconsulta" cols="15" rows="4" class="form-control" >'.$resultado['cons_DetalleConsulta'].'</textarea>';
						echo '</div>';

						echo '<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">';
						echo '<label>Observaciones o Recomendaciones: </label>';
						echo '<textarea type="text" name="observaciones" id="observaciones" cols="15" rows="4" class="form-control" >'.$resultado['cons_Observaciones'].'</textarea>';
						echo '</div>';

						echo '<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">';
						echo '</div>';

						echo '<div class="col-xs-12  col-sm-3 col-md-3 col-lg-3">';
						echo '<input type="submit" name="btn_GeneExpediente" id="btn_GeneExpediente" class="btn btn-primary" value="Generar Expediente" >';
						echo '</div>';

						echo '<div class="col-xs-12  col-sm-3 col-md-3 col-lg-3">';
						echo '<input type="submit" name="btn_ArchivarConsulta" id="btn_ArchivarConsulta" class="btn btn-danger" value="Archivar Consulta" >';
						echo '</div>';
					}
				?>
										
						<div class="col-xs-12  col-sm-3 col-md-3 col-lg-3">	
							<input type="button" class="btn btn-primary" onclick="location.href='frm_ListaConsultas.php'" value="Cancelar" >							
						</div>

						<div  class="col-xs-12  col-sm-5 col-md-3 col-lg-3">
							<input type="text" name="consultaoculta" id="consultaoculta" style = "visibility:hidden"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_NoConsulta']?>" required/>
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