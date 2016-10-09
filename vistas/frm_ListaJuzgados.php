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
	$data = $obj_model -> getListaJuzgado($conexion);


?>

<script type="text/javascript">
$(document).ready(function(){
    $('#tbl_Juzgados').DataTable();
});
</script>
	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<h8 align='center'><b>JUZGADOS</b></h8>
			</div>
				<form name="flk_Juzgadosf" id="flk_Juzgadosf" method="POST" action="flk_Juzgados.php">
					<div class="row">	
						<div class="table-responsive">
						<div class="panel panel-default">

								<div id="mensaje" style="display: none;">
								</div>
								<div class="panel-heading" align="right">
									<input type="button" class="btn btn-info" data-toggle="modal" data-target="#msg_convenciones" value="Convenciones" id="btn_Convenciones" >
									<?php
										
										if ($tipousuario=='1'){
											echo '<input type="button" class="btn btn-primary" data-toggle="modal" data-target="#msg_crear" value="Crear" id="btn_CrearJuzgadoamentos" >';
											echo ' ';
											
											echo '<input type="submit" class="btn btn-primary" value="Editar" id="btn_Editar">';
										}
										else{ 
										     echo '<input type="button" class="btn btn-primary" value="Crear" disabled="disabled" >';
										    } ?>										
								</div>

							<div class="ibody1 col-xs-12  col-sm-12 col-md-6 col-lg-6">
							<table id="tbl_Juzgados" class="table table-striped">

								<thead>	
									<td align="center"><span class="glyphicon glyphicon-sort-by-order-alt"></span><b> Id</b></td>
									<td align="center"><span class="glyphicon glyphicon-sort-by-order-alt"></span><b> Juzgado</b></td>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Dirección</b></td>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Telfonos</b></td>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Horarios</b></td>
									<td align="center"><b> Seleccionar</b></td>	


								</thead>

								<tbody class="tablacontenido" align='center'>
							            <?php
											//Visualizo la data en la vista				

											foreach ($data as $juzgados)
											{
												print "<tr>";
												print "<th align='center'> ".$juzgados['juz_Id']."</th>";
												print "<th align='center'> ".$juzgados['juz_Juzgado']."</th>";
												print "<th>".$juzgados['juz_Direccion']."</th>";
												print "<th>".$juzgados['juz_Telefono']."</th>";
												print "<th>".$juzgados['juz_HorarioAtencion']."</th>";
												echo '<td align="center">';
												echo '<input type="radio" name="juzg" id="juzg" value="'.$juzgados['juz_Id'].'" required>';
										        echo "</td>";												
												print "</tr>";					
											}
										?>		
								</tbody>
							</table>
						</div>	
					</div>
					</div>
				</form>
		</div>
	
		<div class="col-xs-6 col-sm-8 col-md-6 col-lg-6">
			<br>
		</div>
		
	</article>
	</section>

<div class="modal fade bs-example-modal-lg" id="msg_crear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-danger" id="myModalLabel"><b>Estas Creando un Juzgado</b></h4>
      </div>
      <div class="modal-footer" align="center">
            	<div id="mensaje1" style="display: none;">
				</div>
				<form name="frm_crear" id="frm_crear" method="POST" action="" align="center">
					<div class="row" align="center">	

							<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12" align="center">
							
								<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6">
								<label>Nombre del Juzgado: </label>
								<input type="text" name="juzgado" id="juzgado"  class="form-control" placeholder="Juzgado" required/>
								</div>

								<div align="center" class="col-xs-12  col-sm-12 col-md-5 col-lg-5">
								<label>Circuito: </label>
								<input type="text" name="circuito" id="circuito"  class="form-control" placeholder="Circuitto"/>
								</div>								
								
								<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6">
								<label>Distrito: </label>
								<input type="text" name="distrito" id="distrito"  class="form-control" placeholder="Distrito" required/>
								</div>

								<div align="center" class="col-xs-12  col-sm-12 col-md-5 col-lg-5">
								<label>Dirección: </label>
								<input type="text" name="direccion" id="direccion"  class="form-control" placeholder="Dirección"/>
								</div>

								<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6">
								<label>Telefonos: </label>
								<input type="number" name="telefono" id="telefono"  class="form-control" placeholder="Telefonos" required/>
								</div>

								<div align="center" class="col-xs-12  col-sm-12 col-md-5 col-lg-5">
								<label>Contacto: </label>
								<input type="text" name="contacto" id="contacto"  class="form-control" placeholder="Contacto"/>
								</div>	

								<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6">
								<label>Horario de Atención: </label>
								<input type="text" name="horario" id="horario"  class="form-control" placeholder="Usa hora militar" required/>
								</div>

								<div class="col-xs-12  col-sm-12 col-md-5 col-lg-5  has-default" >
								<label>Tipo de Juzgado: </label>
								<select name="TipJuz" id="TipJuz" class="form-control" aria-describedby="sizing-addon2" required>
								    <option value="">Sin Seleccion</option>
									<?php echo $obj_model-> getTipoJuzgado($conexion); ?>
						     	 </select>
							</div>	

							</div>


						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">

						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
							<input type="submit" name="btn_CrearJuzgado" id="btn_CrearJuzgado" class="btn btn-primary" value="Guardar" >
							<input type="button" class="btn btn-primary" onclick="location.href='frm_ListaJuzgados.php'" value="Cancelar" >
						</div>
						<br>
				<div class="ibody1 col-xs-12  col-sm-12 col-md-11 col-lg-11">
					
					<h5>Convenciones: </h5>
					<div align="right" class="col-xs-6 col-sm-2 col-md-1 col-lg-1">
					<H6>CE:</H6>
					<h6>CSJ:</h6>
					<h6>DSRJ:</h6>
					<h6>TS:</h6>
					<H6>JC:</H6>
					<H6>TA:</H6>
					<H6>JA:</H6>
					<H6>JM:</H6>						
					</div>
					<div align="left" class="col-xs-6 col-sm-8 col-md-6 col-lg-6">
					<H6>CONSEJO DE ESTADO </H6>
					<h6>CONSEJO SECCIONAL DE LA JUDICATURA</h6>
					<h6>DIRECCION SECCIONAL DE LA RAMA JUDICIAL </h6>
					<h6>TRIBUNAL SUPERIOR</h6>
					<H6>JUZGADO DE CIRCUITO</H6>
					<H6>TRIBUNAL ADMINISTRATIVO</H6>
					<H6>JUZGADO ADMINISTRATIVO </H6>
					<H6>JUZGADO MUNICIPAL </H6>
					</div>
				</div>


						</div>

					</div>
				</form>
      	<br/>
      	<span id="span1"></span>

      </div>
    </div>
  </div>
</div>


<div class="modal fade bs-example-modal-lg" id="msg_convenciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-danger" id="myModalLabel"><b>Convenciones:</b></h4>
      </div>
      <div class="modal-footer" align="center">

		<div class="ibody1 col-xs-12  col-sm-7 col-md-7 col-lg-7">
			<div align="right" class="col-xs-6 col-sm-2 col-md-1 col-lg-1">
				<H6>CE:</H6>
				<h6>CSJ:</h6>
				<h6>DSRJ:</h6>
				<h6>TS:</h6>
				<H6>JC:</H6>
				<H6>TA:</H6>
				<H6>JA:</H6>
				<H6>JM:</H6>						
			</div>
			<div align="left" class="col-xs-6 col-sm-8 col-md-6 col-lg-6">
				<H6>CONSEJO DE ESTADO </H6>
				<h6>CONSEJO SECCIONAL DE LA JUDICATURA</h6>
				<h6>DIRECCION SECCIONAL DE LA RAMA JUDICIAL </h6>
				<h6>TRIBUNAL SUPERIOR</h6>
				<H6>JUZGADO DE CIRCUITO</H6>
				<H6>TRIBUNAL ADMINISTRATIVO</H6>
				<H6>JUZGADO ADMINISTRATIVO </H6>
				<H6>JUZGADO MUNICIPAL </H6>
			</div>
		</div>

      	<span id="span1"></span>
      </div>
    </div>
  </div>
</div>

<?php 
		include('footer.php');
 ?>