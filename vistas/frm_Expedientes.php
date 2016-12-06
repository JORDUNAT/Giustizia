<?php	
// html y php Document
//Fecha creado: 30/09/2015
//Propósito: Crear usuario desde la aplicación con clave de administrador

	session_start();

	if(isset($_SESSION['s_usuario']) && $_SESSION['s_estado']==1){
		$sesion = True;
	}
	else{
		$sesion = False;
		header("Location: cerrar_sesion.php");
	}

	$tipousuario 	=	$_SESSION['s_tipusu'];
	$ususesion 		=	$_SESSION['s_usuario'];
	$oficina 		=	$_SESSION['s_oficina'];

	$fecha_actual 		= date("Y-m-d");

	$abogado 	=  $_POST['abogado'];
	$cuantia 	=  $_POST['cuantia'];
	$observaciones = $_POST['observaciones'];
	$detaconsulta = $_POST['detaconsulta'];

	include('nav.php');
	include('menu.php');
	include_once('../model/usuariosModel.php');	
	include_once('../model/ModelEstados.php');


	$obj_model = new usuariosModel();
	$resultado = $obj_model->getConsultaExpedientes($conexion); //Resultado de la consulta del usuario que se encuentra con sesión iniciada
	$accion = $obj_model->getTipoAccion($conexion);
	$data = $obj_model -> getConsExped($conexion);

	$obj_estado = new ModelEstados();


?>
<script type="text/javascript">
	$(document).ready(function () {
	$('#tbl_expedientes').dataTable({
		"sPaginationType": "full_numbers",
		"autoWidth": false,
		paging: true
		});
	});
</script>
	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align='center' class="jumbotron">
			<h8 align='center'><b>EXPEDIENTES DE LA CONSULTA <?php echo $resultado['cons_NoConsulta']?></b></h8>
			</div>
			<div >
				<form name="flk_consultas" id="flk_consultas" method="POST" action="">
					<div id="mensaje" style="display: none;">

					</div>
					<div class="row ">	
						<div align='center' class="jumbotron">
						</div>
						<h5><b> </b> <b>Datos de la Contulta: </b></h5>
						<div  class="col-xs-12  col-sm-3 col-md-2 col-lg-2">
							<label>No. de Consulta: </label>
							<input type="text" name="NoConsulta" id="NoConsulta"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_NoConsulta']?>" disabled />
						</div>


						<div div class="col-xs-12  col-sm-3 col-md-3 col-lg-3 ">
							<label>Documento Cliente: </label>
							<input type="number" min="1" name="documento" id="documento"  class="form-control" placeholder="Documento" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_Cliente']?>" disabled="disabled" required/>
						</div>


						<div class="col-xs-12  col-sm-5 col-md-5 col-lg-5 ">
						<label>Nombre del Cliente: </label>
						<input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombres" value="<?php echo $resultado['usu_Nombres']?> <?php echo $resultado['usu_Apellidos']?>" disabled="disabled" required/>
						</div>

						<div  class="col-xs-12  col-sm-1 col-md-1 col-lg-1">
							<input type="text" name="consultaoculta" id="consultaoculta" style = "visibility:hidden"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_NoConsulta']?>" required/>
						</div>
			
						<div  class="col-xs-12  col-sm-6 col-md-2 col-lg-2">
						<label>Cuantía: </label>	
						<input type="number" name="cuantia" id="cuantia"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $cuantia?>">
						</div>

						<div class="col-xs-12  col-sm-5 col-md-3 col-lg-3 " >
							<label>Tipo de Acción: </label>
							<select name="TipAcc" id="TipAcc" class="form-control" aria-describedby="sizing-addon2">
							<?php echo $obj_model-> getTipAccExp($conexion)?>
							<?php echo $obj_model-> getTipoAccion($conexion)?>
							</select>
						</div>


						<div class="col-xs-12  col-sm-6 col-md-5 col-lg-5  has-default">
						<label>Asignar Abogado: </label>
						<select name="abogado" id="abogado" class="form-control" aria-describedby="sizing-addon2" >
							<?php echo $obj_model-> getAbogadoExp($conexion)?>	
							<?php echo $obj_model-> getClientesAbogados($conexion)?>	 
						</select>
						</div>


						<div  class="col-xs-12  col-sm-5 col-md-1 col-lg-1">
							<input type="number" min="1" name="documentooculto" id="documentooculto" style = "visibility:hidden"  class="form-control" placeholder="Documento" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_Cliente']?>" required/>
						</div>



					<div class="col-xs-12  col-sm-12 col-md-5 col-lg-5">
						<label>Decripción de la Consulta: </label>
						<textarea type="text" name="detaconsulta" id="detaconsulta" cols="15" rows="4" class="form-control" > <?php echo $detaconsulta ?> </textarea>
					</div>

					<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6">
						<label>Observaciones o Recomendaciones: </label>
						<textarea type="text" name="observaciones" id="observaciones" cols="15" rows="4" class="form-control" > <?php echo $observaciones ?> </textarea>
					</div>

						<div class="col-xs-12  col-sm-12 col-md-6 col-lg-12">
						</div>
		

					<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6 has-default">
						<input type="submit" name="btn_GuardarConsulta" id="btn_GuardarConsulta" class="btn btn-primary" value="Guardar" >
						<input type="button" class="btn btn-primary" onclick="location.href='frm_ListaConsultas.php'" value="Cancelar" >	
					</div>

					</div>



					<div align='center' class="jumbotron">
					</div>



				</form>


<!--Desde aqui inica talba de gestiones realizadas -->

				<form  name="flk_Gestionf" id="flk_Gestionf" method="POST" action="flk_Gestion.php">
					<div class="row">	
						<div class="table-responsive" align="center">
						<div align='center' class="jumbotron">
							<h8 align='center' color='#fff'><b> RELACION DE EXPEDIENTES</b></h8>
						</div>
						<div class="panel panel-default">

								<div id="mensaje" style="display: none;">
								</div>
								<div class="panel-heading" align="right">
									<?php
										if ($tipousuario=='1'){
											echo '<input type="button" class="btn btn-danger" data-toggle="modal" data-target="#msg_crear" value="Crear" id="btn_Crearexpe" >';
											echo ' ';
											
											echo '<input type="submit" class="btn btn-danger" value="Editar" id="btn_Editar">';
										}
										else{ 
										     echo '<input type="submit" class="btn btn-danger" value="Editar" id="btn_Editar">';
										} 
									?>										
								</div>

							<div class="ibody1 col-xs-12  col-sm-12 col-md-6 col-lg-6">
							<table id="tbl_expedientes" class="table table-striped" >
								<thead style = "align-text:center">	
									<td>Item</td>							
									<td style = "align-text:center"><span class="glyphicon glyphicon-sort-by-order-alt"></span><b> No. <br> Expediente</b></td>
									<td align="center"><span class="glyphicon glyphicon-sort-by-order-alt"></span><b> Fecha</b></td>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Consulta</b></td>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Cliente</b></td>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Estado</b></td>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Abogado<br>Asignado</b></td>
									<td align="center"><b> Editar</b></td>	

								</thead>

								<tbody  class="tablacontenido" align='center' style="color:#456789; font-size:85%">
							            <?php
											//Visualizo la data en la vista				
											$cont = 1;
											foreach ($data as $expediente)
											{
												print "<tr>";
												print "<th>".$cont."</th>";
												print "<th align='center'>".$expediente["exp_NumeroExpediente"]."</th>";
												print "<th align='center'>".$expediente["exp_FechaExpediente"]."</th>";
												print "<th align='center'>".$expediente["exp_Consulta"]."</th>";
												print "<th align='center'>".$expediente["cons_Cliente"]."</th>";
												print "<th align='center'>".$expediente["exp_EstadoExpediente"]."</th>";
												print "<th align='center'>".$expediente["cons_AbogadoAsignado"]."</th>";												
										        echo '<td align="center">';
												echo '<input type="radio" name="idexpediente" id="idexpediente" value="'.$expediente["exp_Id"].'" required>';
										        echo "</td>";
												print "</tr>";
												$cont++;					
											}
										?>
								</tbody>
							</table>
							</div>	
					</div>
				</form>


<!--Hasta aqui-->
			</div>
		</div>
					<br>
	</article>
	</section>
	</div>


<div class="modal fade bs-example-modal-lg" id="msg_crear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-footer" align="center">

      <div class="modal-header" align="left">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-danger" id="myModalLabel"><b>Creando un Expediente</b></h4>
      </div>      
				<form name="frm_crear" id="frm_crear" method="POST" action="frm_Expedientes.php">
					<div class="row" align="center">	

					<div id="mensaje1" style="display: none;">
					</div>

						<h5><b> </b> <b>Datos de la Contulta: </b></h5>
						<div  class="col-xs-12  col-sm-3 col-md-3 col-lg-3">
							<label>No. de Consulta: </label>
							<input type="text" name="NoConsulta" id="NoConsulta"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_NoConsulta']?>" disabled />
						</div>


						<div div class="col-xs-12  col-sm-3 col-md-3 col-lg-3 ">
							<label>Documento Cliente: </label>
							<input type="number" min="1" name="documento" id="documento"  class="form-control" placeholder="Documento" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_Cliente']?>" disabled="disabled" required/>
						</div>


						<div class="col-xs-12  col-sm-5 col-md-5 col-lg-5 ">
						<label>Nombre del Cliente: </label>
						<input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombres" value="<?php echo $resultado['usu_Nombres']?> <?php echo $resultado['usu_Apellidos']?>" disabled="disabled" required/>
						</div>

						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
						</div>


			
						<div  class="col-xs-12  col-sm-3 col-md-2 col-lg-2">
						<label>Cuantía: </label>	
						<input type="number" name="cuantia" id="cuantia"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $cuantia?>">
						</div>

						<div class="col-xs-12  col-sm-3 col-md-3 col-lg-3 " >
							<label>Tipo de Acción: </label>
							<select name="TipAcc" id="TipAcc" class="form-control" aria-describedby="sizing-addon2">
							<?php echo $obj_model-> getTipAccExp($conexion)?>
							<?php echo $obj_model-> getTipoAccion($conexion)?>
							</select>
						</div>


						<div class="col-xs-12  col-sm-4 col-md-3 col-lg-3  has-default">
						<label>Asignar Abogado: </label>
						<select name="abogado" id="abogado" class="form-control" aria-describedby="sizing-addon2" >
							<?php echo $obj_model-> getAbogadoExp($conexion)?>	
							<?php echo $obj_model-> getClientesAbogados($conexion)?>	 
						</select>
						</div>


					<div class="col-xs-12  col-sm-12 col-md-5 col-lg-5">
						<label>Decripción de la Consulta: </label>
						<textarea type="text" name="detaconsulta" id="detaconsulta" cols="15" rows="3" class="form-control" > <?php echo $detaconsulta ?> </textarea>
					</div>

					<div class="col-xs-12  col-sm-12 col-md-6 col-lg-6">
						<label>Observaciones o Recomendaciones: </label>
						<textarea type="text" name="observaciones" id="observaciones" cols="15" rows="3" class="form-control" > <?php echo $observaciones ?> </textarea>
					</div>


				</div>

					<div align='center' class="jumbotron">
					</div>

      		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
      			<label>Fecha del Expediente: </label>
      			<input type="date" name="fechaex" id="fechaex" value="<?php echo date("Y-m-d"); ?>" />
      			
      		</div>

			<div class="col-xs-12  col-sm-8 col-md-8 col-lg-8  has-default" align="left">
						<label>Tipo de Procesos: </label>
						<select name="tiproceso" id="tiproceso" class="form-control" aria-describedby="sizing-addon2" >
							<option value="">Sin Seleccion</option>	
							<?php echo $obj_model->getProcesos($conexion)?>	 
				</select>
			</div>

      		<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12" align="left">
				<label>Descripción del Proceso Jurídico: </label>
				<textarea type="text" name="detalleexpediente" id="detalleexpediente" cols="15" rows="3" class="form-control" >  </textarea>
			</div>


						<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">

						</div>

						<div  class="col-xs-12  col-sm-1 col-md-1 col-lg-1">
							<input type="text" name="consultaoculta" id="consultaoculta" style = "visibility:hidden"  class="form-control" aria-describedby="sizing-addon3" value="<?php echo $resultado['cons_NoConsulta']?>" required/>
						</div>


						<div class="col-xs-12  col-sm-5 col-md-10 col-lg-10">
							<input type="submit" name="btn_GuardarExpediente" id="btn_GuardarExpediente" class="btn btn-primary" value="Guardar" >
							<input type="submit" class="btn btn-primary"  value="Cancelar" >
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