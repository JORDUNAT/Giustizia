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
	$data = $obj_model -> getConsutlas($conexion);
	$datausu = $obj_model -> getConsutlasUsuario($conexion);	
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
			<h8 align='center'><b>CONTROL DE EXPEDIENTES JURÍDICOS</b></h8>
			</div>
			<div >
				<form name="frm_ListaConsutlas" id="frm_ListaConsutlas" >
					<div class="row">	
						<div class="table-responsive">
						<div class="panel panel-default">

								<div class="panel-heading" align="right">
									<?php
										
										if ($tipousuario<>'3'){
											echo '<input type="button" class="btn btn-default" value="Crear Consulta" id="btn_crearcliente" >';
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

								<tbody class="tablacontenido" align='center' style="color:#456789; font-size:85%">
							            <?php
											//Visualizo la data en la vista				
											$cont = 1;

										if ($tipousuario=='1' || $tipousuario=='5'){
											foreach ($data as $consulta)
											{
												print "<tr>";
												print "<th>".$cont."</th>";
												print "<th align='center'>".$consulta["Cons_NoConsulta"]."</th>";
												print "<th align='center'>".$consulta["Cons_Fecha"]."</th>";
												print "<th align='center'>".$consulta["Cons_Atendido"]."</th>";
												print "<th align='center'>".$consulta["Cons_Cliente"]."</th>";
												print "<th align='center'>".$consulta["Cons_Cuantia"]."</th>";
												print "<th align='center'>".$consulta["Cons_AbogadoAsignado"]."</th>";												
										        echo '<td align="center"><button class="btn btn-default" type="button" aria-hidden="true" onclick="'."location.href='flk_Consultas.php?Consutla=".$consulta['Cons_NoConsulta']."'".'">'."
														<span class='glyphicon  glyphicon-pencil'></span>
													</button></td>";
												print "</tr>";
												$cont++;					
											}
										}elseif ($tipousuario<>'1' || $tipousuario<>'3') {
											foreach ($datausu as $consulta)
											{
												print "<tr>";
												print "<th>".$cont."</th>";
												print "<th align='center'>".$consulta["Cons_NoConsulta"]."</th>";
												print "<th align='center'>".$consulta["Cons_Fecha"]."</th>";
												print "<th align='center'>".$consulta["Cons_Atendido"]."</th>";
												print "<th align='center'>".$consulta["Cons_Cliente"]."</th>";
												print "<th align='center'>".$consulta["Cons_Cuantia"]."</th>";
												print "<th align='center'>".$consulta["Cons_AbogadoAsignado"]."</th>";												
										        echo '<td align="center"><button class="btn btn-default" type="button" aria-hidden="true" onclick="'."location.href='flk_Consultas.php?Consutla=".$consulta['Cons_NoConsulta']."'".'">'."
														<span class='glyphicon  glyphicon-pencil'></span>
													</button></td>";
												print "</tr>";
												$cont++;			
											}
										}elseif ($tipousuario=='3') {
											foreach ($undata as $consulta)
											{
												print "<tr>";
												print "<th>".$cont."</th>";
												print "<th align='center'>".$consulta["Cons_NoConsulta"]."</th>";
												print "<th align='center'>".$consulta["Cons_Fecha"]."</th>";
												print "<th align='center'>".$consulta["Cons_Atendido"]."</th>";
												print "<th align='center'>".$consulta["Cons_Cliente"]."</th>";
												print "<th align='center'>".$consulta["Cons_Cuantia"]."</th>";
												print "<th align='center'>".$consulta["Cons_AbogadoAsignado"]."</th>";												
										        echo '<td align="center"><button class="btn btn-default" type="button" aria-hidden="true" onclick="'."location.href='flk_Consultas.php?Consutla=".$consulta['Cons_NoConsulta']."'".'">'."
														<span class='glyphicon  glyphicon-pencil'></span>
													</button></td>";
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




<?php 
		include('footer.php');
 ?>

