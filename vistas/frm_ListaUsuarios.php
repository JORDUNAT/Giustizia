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
	$data = $obj_model -> getUsuarios($conexion);
	$undata = $obj_model-> getUnUsuario($conexion);

?>

<script type="text/javascript">
$(document).ready(function(){
    $('#tbl_listausuarios').DataTable();
});
</script>


	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div  align='center' class="jumbotron">
			<h8  align='center'><b>CONTROL DE USUARIOS</b></h8>
			</div>
			<div >
				<form name="fUsuarios" id="fUsuarios">
					<div class="row">	
						<div class="table-responsive">
						<div class="panel panel-default">

								<div class="panel-heading" align="right">
									<?php
										
										if ($tipousuario=='1'){
											echo '<input type="button" class="btn btn-primary" value="Crear Usuario" id="btn_crearusaurio" >';
										     }
										else{ 
										     echo '<input type="button" class="btn btn-default" value="Crear Usuario" disabled="disabled" >';
										    } ?>										
								</div>

							<table id="tbl_listausuarios" class="table table-striped">
								<thead>								
									<td align="center"><span class="glyphicon glyphicon-sort-by-order-alt"></span><b> Documento</b></td>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Nombres</b></d>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Apellidos</b></d>
									<td align="center"><span class="glyphicon glyphicon-sort-by-order-alt"></span><b> Email</b></d>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Tip Usuario</b></d>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Estado</b></d>
									<td align="center"><span class="glyphicon glyphicon-sort-by-alphabet"></span><b> Genero</b></d>
									<td align="center"><b> Editar</b></d>	

								</thead>

								<tbody class="tablacontenido" align='center'>
							            <?php
											//Visualizo la data en la vista				
											$cont = 0;

										if ($tipousuario=='1'){
											foreach ($data as $usuario)
											{
												print "<tr>";
												print "<th align='center'>".$usuario["usu_Documento"]."</th>";
												print "<th >".$usuario["usu_Nombres"]."</th>";
												print "<th>".$usuario["usu_Apellidos"]."</th>";
												print "<th align='center'>".$usuario["usu_Email"]."</th>";
												print "<th align='center'>".$usuario["tipu_TipoUsuario"]."</th>";
												print "<th align='center'>".$usuario["Estado_Estado"]."</th>";
												print "<th align='center'>".$usuario["usu_Genero"]."</th>";

										        echo '<td align="center"><button class="btn btn-default" type="button" aria-hidden="true" onclick="'."location.href='flk_Usuarios.php?Documento=".$usuario['usu_Documento'].";'".'">'."
														<span class='glyphicon  glyphicon-pencil'></span>
													</button></td>";
												print "</tr>";					
											}
										}
										else{
											foreach ($undata as $usuario)
											{
												print "<tr>";
												print "<th align='center'>".$usuario["usu_Documento"]."</th>";
												print "<th >".$usuario["usu_Nombres"]."</th>";
												print "<th>".$usuario["usu_Apellidos"]."</th>";
												print "<th align='center'>".$usuario["usu_Email"]."</th>";
												print "<th align='center'>".$usuario["tipu_TipoUsuario"]."</th>";
												print "<th align='center'>".$usuario["Estado_Estado"]."</th>";
												print "<th align='center'>".$usuario["usu_Genero"]."</th>";

										        echo '<td align="center"><button class="btn btn-default" type="button" aria-hidden="true" onclick="'."location.href='flk_UsuariosU.php?Documento=".$usuario['usu_Documento'].";'".'">'."
														<span class='glyphicon  glyphicon-pencil'></span>
													</button></td>";
												print "</tr>";					
											}
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