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
	$resultado = $obj_model->getQryConsExped($conexion); //Resultado de la consulta del usuario que se encuentra con sesión iniciada
	$accion = $obj_model->getTipoAccion($conexion);

	echo 
?>
	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<?php 
				if($resultado['exp_EstadoExpediente']==3 || $resultado['exp_EstadoExpediente']==4){
					echo "<h8 align='center'><b>EXPEDIENTE No. ".$resultado['exp_NumeroExpediente']." ARCHIVADA </b></h8>";
				}else{
					echo "<h8 align='center'><b>GESTIONANDO EXPEDIENTE: ".$resultado['exp_NumeroExpediente']."</b></h8>";
				}

			 ?>
			
			</div>
			<div >
				<form name="flk_expedientes" id="flk_expedientes" method="POST" action="frm_Expedientes.php">

					<div id="mensaje" style="display: none;">
					</div>

					<div class="row">	
							<div div class="col-xs-12  col-sm-5 col-md-2 col-lg-2 ">
							<label>Documento Cliente: </label>
							<input type="number" min="1" name="documento" id="documento"  class="form-control" placeholder="Documento" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_Cliente']?>" disabled="disabled" required/>
							</div>


						<div class="col-xs-12  col-sm-6 col-md-4 col-lg45 ">
						<label>Nombre del Cliente: </label>
						<input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombres" value="<?php echo $resultado['usu_Nombres']?> <?php echo $resultado['usu_Apellidos']?>" disabled="disabled" required/>
						</div>

						<div  class="col-xs-12  col-sm-5 col-md-2 col-lg-2">
							<label>No. de Consulta: </label>
							<input type="text" name="NoConsulta" id="NoConsulta"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $resultado['exp_NumeroExpediente']?>" disabled>
						</div>


							<div  class="col-xs-12  col-sm-5 col-md-1 col-lg-1">
							<input type="number" min="1" name="idconsulta" id="idconsulta" style = "visibility:hidden"  class="form-control" placeholder="Documento" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_Id']?>" required/>
							</div>

							<div  class="col-xs-12  col-sm-5 col-md-1 col-lg-1">
							<input type="number" min="1" name="documentooculto" id="documentooculto" style = "visibility:hidden"  class="form-control" placeholder="Documento" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_Cliente']?>" required/>
							</div>


						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						</div>


						<div  class="col-xs-12  col-sm-5 col-md-2 col-lg-2">
							<label>Fecha de Consulta: </label>
							<input type="text" name="FechaConsulta" id="FechaConsulta"  class="form-control" value="<?php echo $resultado['cons_Fecha']?>" disabled>
						</div>						

						<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3">
							<label>Atendido por: </label>
							<input type="text" name="Atendido" id="Atendido"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_Atendido']?>" disabled>
						</div>

				<?php 
					if ($resultado['exp_EstadoExpediente']==2 || $resultado['exp_EstadoExpediente']==4){

						echo '<div class="col-xs-12  col-sm-5 col-md-6 col-lg-6  has-default">';
						echo '<label>Asignar Abogado: </label>';
						echo '<select name="abogado" id="abogado" class="form-control" aria-describedby="sizing-addon2" disabled >';
						echo $obj_model-> getAbogadoConsul($conexion);
						echo $obj_model-> getClientesAbogados($conexion);
						echo '</select>

						</div>';

						echo '<div  class="col-xs-12  col-sm-6 col-md-3 col-lg-3">';
						echo '<label>Cuantía: </label>';	
						echo '<input type="number" name="cuantia" id="cuantia"  class="form-control" aria-describedby="sizing-addon3" value="'.$resultado['cons_Cuantia'].'" required disabled>';
						echo '</div>';

						echo '<div class="col-xs-12  col-sm-12 col-md-3 col-lg-3 " >';
						echo '<label>Tipo de Acción: </label>';

						echo '<select disabled name="TipAcc" id="TipAcc" class="form-control" aria-describedby="sizing-addon2">';
						echo '<option value="'.$resultado['cons_TipoAccion'].'" required>'.$resultado['tipAcc_TipoAccion'].'</option>';
						echo $obj_model-> getTipoAccion($conexion);
						echo '</select>';
						echo '</div>';


						echo '<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">';
						echo '<label>Detalle de Consulta: </label>';
						echo '<textarea disabled type="text" name="detaconsulta" id="detaconsulta" cols="15" rows="4" class="form-control" required>'.$resultado['cons_DetalleConsulta'].'</textarea>';
						echo '</div>';

						echo '<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">';
						echo '<label>Observaciones o Recomendaciones: </label>';
						echo '<textarea disabled type="text" name="observaciones" id="observaciones" cols="15" rows="4" class="form-control" required>'.$resultado['cons_Observaciones'].'</textarea>';
						echo '</div>';


					}else{
						echo '<div class="col-xs-12  col-sm-5 col-md-6 col-lg-6  has-default">';
						echo '<label>Asignar Abogado: </label>';
						echo '<select name="abogado" id="abogado" class="form-control" aria-describedby="sizing-addon2" required >';
						echo $obj_model-> getAbogadoConsul($conexion);
						echo $obj_model-> getClientesAbogados($conexion);
						echo '</select>

						</div>';

						echo '<div  class="col-xs-12  col-sm-6 col-md-3 col-lg-3">';
						echo '<label>Cuantía: </label>';	
						echo '<input type="number" name="cuantia" id="cuantia"  class="form-control" aria-describedby="sizing-addon3" value="'.$resultado['cons_Cuantia'].'" required>';
						echo '</div>';

						echo '<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6 " >';
						echo '<label>Tipo de Acción: </label>';
						echo '<select name="TipAcc" id="TipAcc" class="form-control" aria-describedby="sizing-addon2" required>';
						echo '<option value="'.$resultado['cons_TipoAccion'].'">'.$resultado['tipAcc_TipoAccion'].'</option>';
						echo $obj_model-> getTipoAccion($conexion);
						echo '</select>';
						echo '</div>';


						echo '<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">';
						echo '<label>Detalle de Consulta: </label>';
						echo '<textarea type="text" name="detaconsulta" id="detaconsulta" cols="15" rows="4" class="form-control" required>'.$resultado['cons_DetalleConsulta'].'</textarea>';
						echo '</div>';

						echo '<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">';
						echo '<label>Observaciones o Recomendaciones: </label>';
						echo '<textarea type="text" name="observaciones" id="observaciones" cols="15" rows="4" class="form-control" required>'.$resultado['cons_Observaciones'].'</textarea>';
						echo '</div>';

						echo '<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">';
						echo '</div>';

						echo '<div class="col-xs-12  col-sm-6 col-md-5 col-lg-5">';
						echo '<input type="submit" name="btn_GeneExpediente" id="btn_GeneExpediente" class="btn btn-primary" value="Expedientes" >

							<input type="submit" class="btn btn-primary" name="btn_GuardarConsulta" id="btn_GuardarConsulta"  value="Guardar Cambios" >	 

						';
						echo '</div>';

						echo '<div class="col-xs-12  col-sm-6 col-md-3 col-lg-3">';
						echo '<input type="submit" name="btn_ArchivarConsulta" id="btn_ArchivarConsulta" class="btn btn-danger" value="Archivar Consulta" >';
						echo '</div>';
					}
				?>

						<div class="col-xs-12  col-sm-6 col-md-2 col-lg-2">	
							
							<input type="button" class="btn btn-primary" onclick="location.href='frm_ListaConsultas.php'" value="Cancelar" >							
						</div>

						<div  class="col-xs-12  col-sm-1 col-md-1 col-lg-1">
							<input type="text" name="consultaoculta" id="consultaoculta" style = "visibility:hidden"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $resultado['exp_NumeroExpediente']?>" required/>
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