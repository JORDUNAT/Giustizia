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
?>
	<article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
		<div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
			<div align="center" class="jumbotron">
			<h8 align="center" ><b>BIEVENIDO A GIUSTIZIA</b></h8>
			</div>
				<div >
					<form name="fRegistroOficina" id="fRegistroOficina">
						<h2>GIUSTIZIA</h2>
						<p align="justify">Es un sistema de información diseñado para oficinas juridicas que no cuentan con un software.</p>
						<p>Te permite llevar el inventario y las actividades de cada expediente que manejes en tu oficina, además de controlar una agenda electrónica que le comunicará a tu cliente las actividades programadas.</p>
					</form>
				</div>
				<br>
			<div>
			<p>Consultar Procesos: <a href="http://procesos.ramajudicial.gov.co/consultaprocesos/">http://procesos.ramajudicial.gov.co/consultaprocesos/</a><p>
			<p>Consultar Abogados: <a href="http://200.74.129.84/antecedentes/">http://200.74.129.84/antecedentes/</a><p>
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