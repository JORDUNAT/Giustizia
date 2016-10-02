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

	include('nav.php');
	include('menu.php');
	include_once('../model/usuariosModel.php');	

	$obj_model = new usuariosModel();
	$data = $obj_model -> getTipoProceso($conexion);


?>

<script type="text/javascript">
$(document).ready(function(){
    $('#tbl_Procesos').DataTable();
});
</script>

	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<h8 align='center'><b>CLASIFICACION DE LOS PROCESOS JURIDICOS</b></h8>
			</div>
			<div >
				<form name="flk_TipoProcesos" id="flk_TipoProcesos" method="POST" action="flk_Tiprocesos.php">
					<div class="row">	
						<div class="table-responsive">
						<div class="panel panel-default">

								<div id="mensaje" style="display: none;">
								</div>
								<div class="panel-heading" align="right">
									<?php
										
										if ($tipousuario=='1'){
											echo '<input type="button" class="btn btn-primary" data-toggle="modal" data-target="#msg_crear" value="Crear" id="btn_creartiproceso" >';
											echo ' ';
											
											echo '<input type="submit" class="btn btn-primary" value="Editar" id="btn_Editar">';
										}
										else{ 
										     echo '<input type="button" class="btn btn-primary" value="Crear" disabled="disabled" >';
										    } ?>										
								</div>

							<div class="ibody1 col-xs-12  col-sm-12 col-md-6 col-lg-6">
							<table id="tbl_Procesos" class="table table-striped">

								<thead>								
									<td align="center"><span class="glyphicon glyphicon-sort-by-order-alt"></span><b> Item</b></td>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Clasificación de Procesos</b></d>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Estado</b></d>
									<td align="center"><b> Seleccionar</b></d>	


								</thead>

								<tbody class="tablacontenido" align='center'>
							            <?php
											//Visualizo la data en la vista				

											foreach ($data as $tiproceso)
											{
												print "<tr>";
												if($tiproceso["estado_Estado"]=='ACTIVO'){
												print "<th align='center'> ".$tiproceso['clapro_Id']."</th>";
												print "<th>".$tiproceso["clapro_ClasificacionProceso"]."</th>";
												print "<th>".$tiproceso["estado_Estado"]."</th>";
												echo '<td align="center">';
												echo '<input type="radio" name="tipprocesos" id="tipprocesos" value="'.$tiproceso['clapro_Id'].'" required>';
										        echo "</td>";												
												}else{
												print "<th class='danger' align='center'> ".$tiproceso['clapro_Id']."</th>";
												print "<th class='danger' >".$tiproceso["clapro_ClasificacionProceso"]."</th>";
												print "<th class='danger' >".$tiproceso["estado_Estado"]."</th>";
												echo '<td align="center" class="danger">';
												echo '<input type="radio" name="tipprocesos" id="tipprocesos" value="'.$tiproceso['clapro_Id'].'" required>';
										        echo "</td>";		
												}

												print "</tr>";					
											}
										?>
										
								</tbody>
							</table>
							</div>
							
					</div>
				</form>
			</div>
		</div>
	</article>
	</section>
	</div>

<div class="modal fade bs-example-modal-md" id="msg_crear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-danger" id="myModalLabel"><b>Estas Creando una Clasificación de Procesos Jurídicos</b></h4>
      </div>
      <div class="modal-footer" align="center">
				<form name="frm_crear" id="frm_crear" method="POST" action="">
					<div class="row" align="center">	

							<div align="center" class="col-xs-12  col-sm-6 col-md-2 col-lg-2 ">
							<input type="number" min="1" name="item" id="item" style = "visibility:hidden"  class="form-control" aria-describedby="sizing-addon3" /> 
							</div>

							<div class="col-xs-12  col-sm-6 col-md-8 col-lg-8 ">
							<label>Clasificación de Procesos Jurídicos </label>
							<input type="text" name="descripcion" id="descripcion"  class="form-control" placeholder="Clasificación de Proceso Jurídico" required/>
							</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">

						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
							<input type="submit" name="btn_CrearClaProceso" id="btn_CrearClaProceso" class="btn btn-primary" value="Guardar" >
							<input type="button" class="btn btn-primary" onclick="location.href='frm_ListaTipoProcesos.php'" value="Cancelar" >
						</div>

						</div>

					</div>
				</form>
      	<br/>
      	<span id="span1"></span>
      	<div id="mensaje1" style="display: none;">
		</div>
      </div>
    </div>
  </div>
</div>


<?php 
		include('footer.php');
 ?>