<?php	
	session_start();

	if(isset($_SESSION['s_usuario']) && $_SESSION['s_estado']==1){
		$sesion = True;
	}
	else{
		$sesion = False;
		header("Location: cerrar_sesion.php");
	}

	$tipousuario=$_SESSION['s_tipusu'];
	$oficina = $_SESSION['s_oficina'];

	include('nav.php');
	include('menu.php');
	include_once('../model/usuariosModel.php');	

	$obj_model = new usuariosModel();
	$data = $obj_model -> getConsutlas($conexion);
	$datausu = $obj_model -> getConsutlasUsuario($conexion);	
	$undata = $obj_model-> getConsutlasCliente($conexion);
	$undata = $obj_model-> getConsutlasCliente($conexion);
?>

<script type="text/javascript">
	$(document).ready(function () {
	$('#tbl_consultas').dataTable({
		"sPaginationType": "full_numbers",
		"autoWidth": false,
		paging: true
		});
	});
</script>


	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<h8 align='center'><b>CONTROL DE CONSULTAS JURÍDICAS</b></h8>
			</div>
			<div >
				<form name="frm_ListaConsutlas" id="frm_ListaConsutlas" method="POST" action="flk_Consultas.php">
					<div class="row">	
						<div class="table-responsive">
						<div class="panel panel-default">

								<div class="panel-heading" align="right">
									<?php
										
										if ($tipousuario<>'3'){
											echo '<input type="button" class="btn btn-primary" data-toggle="modal" data-target="#msg_crear" value="Crear Consulta" id="btn_crearconsulta" >';
											echo ' ';
											echo '<input type="submit" class="btn btn-primary" value="Editar" id="btn_Editar">';
										     }
										else{ 
										     echo '<input type="button" class="btn btn-default" value="Crear Consulta" disabled="disabled" >';
										    } ?>										
								</div>

							<table id="tbl_consultas" class="table table-striped" align="center">
								<thead style = "align-text:center">	
									<td>Item</td>							
									<td style = "align-text:center"><span class="glyphicon glyphicon-sort-by-order-alt"></span><b> No. <br> Consulta</b></td>
									<td align="center"><span class="glyphicon glyphicon-sort-by-order-alt"></span><b> Fecha</b></d>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Atendido Por</b></d>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Cliente</b></d>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Cuantia</b></d>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Abogado<br>Asignado</b></d>
									<td align="center"><b> Editar</b></d>	

								</thead>

								<tbody class="tablacontenido" align='center'>
							            <?php
											//Visualizo la data en la vista				
											$cont = 1;

										if ($tipousuario=='1' || $tipousuario=='5'){
											foreach ($data as $consulta)
											{
												print "<tr>";
												print "<th>".$cont."</th>";
												print "<th align='center'>".$consulta["cons_NoConsulta"]."</th>";
												print "<th align='center'>".$consulta["cons_Fecha"]."</th>";
												print "<th align='center'>".$consulta["cons_Atendido"]."</th>";
												print "<th align='center'>".$consulta["cons_Cliente"]."</th>";
												print "<th align='center'>".$consulta["cons_Cuantia"]."</th>";
												print "<th align='center'>".$consulta["cons_AbogadoAsignado"]."</th>";												
										        echo '<td align="center">';
												echo '<input type="radio" name="idconsulta" id="idconsulta" value="'.$consulta["cons_Id"].'" required>';
										        echo "</td>";
												print "</tr>";
												$cont++;					
											}
										}elseif ($tipousuario<>'1' || $tipousuario<>'3') {
											foreach ($datausu as $consulta)
											{
												print "<tr>";
												print "<th>".$cont."</th>";
												print "<th align='center'>".$consulta["cons_NoConsulta"]."</th>";
												print "<th align='center'>".$consulta["cons_Fecha"]."</th>";
												print "<th align='center'>".$consulta["cons_Atendido"]."</th>";
												print "<th align='center'>".$consulta["cons_Cliente"]."</th>";
												print "<th align='center'>".$consulta["cons_Cuantia"]."</th>";
												print "<th align='center'>".$consulta["cons_AbogadoAsignado"]."</th>";												
										        echo '<td align="center">';
												echo '<input type="radio" name="juzg" id="juzg" value="'.$consulta["cons_Id"].'" required>';
										        echo "</td>";
												print "</tr>";
												$cont++;			
											}
										}elseif ($tipousuario=='3') {
											foreach ($undata as $consulta)
											{
												print "<tr>";
												print "<th>".$cont."</th>";
												print "<th align='center'>".$consulta["cons_NoConsulta"]."</th>";
												print "<th align='center'>".$consulta["cons_Fecha"]."</th>";
												print "<th align='center'>".$consulta["cons_Atendido"]."</th>";
												print "<th align='center'>".$consulta["cons_Cliente"]."</th>";
												print "<th align='center'>".$consulta["cons_Cuantia"]."</th>";
												print "<th align='center'>".$consulta["cons_AbogadoAsignado"]."</th>";												
										        echo '<td align="center">';
												echo '<input type="radio" name="juzg" id="juzg" value="'.$consulta["cons_Id"].'" required>';
										        echo "</td>";
												print "</tr>";
												$cont++;						
											}
										}else{
											echo '<div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-info-sign"></span> Lo sentimos pero no tienes autorización para la administración de consultas jurídicas  </div>';
										}
										?>

								</tbody>

							</table>
					</div>
				</form>
			</div>
		</div>
	</article>
	</section>
	</div>


<div class="modal fade bs-example-modal-lg" id="msg_crear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-danger" id="myModalLabel"><b>Estas Creando una Consulta</b></h4>
      </div>
      <div class="modal-footer" align="center">
				<form name="frm_crear" id="frm_crear" method="POST" action="">
					<div class="row" align="center">	

					<div id="mensaje" style="display: none;">
					</div>

							<div class="col-xs-12  col-sm-6 col-md-6 col-lg-6  has-default" >
								<label>Cliente: </label>
								<select name="cliente" id="cliente" class="form-control" aria-describedby="sizing-addon2" required>
								    <option value="">Sin Seleccion</option>
									<?php echo $obj_model-> getClientesSelect($conexion); ?>
						     	 </select>

							</div>


						<div class="col-xs-12  col-sm-5 col-md-5 col-lg-5 ">
						<label>Tipo de Acción: </label>
						<select name="TipAcc" id="TipAcc" class="form-control" aria-describedby="sizing-addon2">
						<option value="">Sin Selección...</option>
						<?php echo  $obj_model-> getTipoAccion($conexion); ?>
						</select>
						</div>

						<div class="col-xs-12  col-sm-6 col-md-6 col-lg-6  has-default" >
							<label>Asignar Abogado: </label>
							<select name="abogado" id="abogado" class="form-control" aria-describedby="sizing-addon2" required>
							<option value="">Sin Seleccion</option>
								<?php echo $obj_model-> getClientesAbogados($conexion); ?>
						    </select>

						</div>

						<div class="col-xs-12  col-sm-5 col-md-5 col-lg-5 ">
							<label>Cuantía del Proceso: </label>
							<span id="input-symbol">$</span><input type="number" name="cuantia" id="cuantia" class="form-control" />
						</div>
							
							<br>
						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
							<label>Descripción de la Consulta: </label>
							<textarea type="text" name="detaconsulta" id="detaconsulta" cols="15" rows="3" class="form-control" ></textarea>
						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						<label>Observaciones o Recomendaciones: </label>
						<textarea type="text" name="observaciones" id="observaciones" cols="15" rows="3" class="form-control" ></textarea>
						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">

						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
							<input type="submit" name="btn_CrearConsulta" id="btn_CrearConsulta" class="btn btn-primary" value="Guardar" >
							<input type="button" class="btn btn-primary" onclick="location.href='frm_ListaConsultas.php'" value="Cancelar" >
						</div>

					</div>

					
				</form>
      	<br/>
      	<span id="span1"></span>
      </div>
    </div>
  </div>
</div>




<?php 
		include('footer.php');
 ?>

