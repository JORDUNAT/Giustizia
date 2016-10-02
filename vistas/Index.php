	<?php 
		include('frm_nav.php');
	 ?>

<div id="mensaje" style="display: none;">
</div>

	<div class="container" >

		<div class="row" >
			<div class="col-xs-12  col-sm-12 col-md-1 col-lg-1">
			</div>

			<div class="col-xs-12  col-sm-12 col-md-4 col-lg-4">
				<h2>No has registrado tu Oficina Jurídica?</h2>
				<p align="justify">Si cuentas con una Oficina Jurídica y aún no tienes un sistema de información, te invitamos a que conozcas Giustizia, un software que hicimos pensando en Tí.</p>
				<p align="justify">Giustizia te brindará las herramientas para que puedas administrar todos los procesos, manejando una base de datos de tus clientes y sus compromisos legales.</p>
				<p align="justify">Además podrás llevar los expedientes en forma digital con una agenda que te permita llevar el control de tus citas y audiencias.</p>	
				<button onclick="location.href='frm_RegistroOficina.php'" class="btn btn-Primary">Registra tu Oficina</button>
				<br>
				<br>
				<br>
			</div>

			<div class="col-xs-12  col-sm-12 col-md-1 col-lg-1">
			</div>
			
			<div class="col-xs-12  col-sm-12 col-md-5 col-lg-5">
				<h2>Si eres una persona natural y requieres hacer una consulta Jurídica</h2>
				<p align="justify">Si deseas puedes realizar una consulta jurídica, esta será enviada a la oficina jurídica que este más cerca de tí.</p>
				<p align="justify">Ten la certeza que te colaborarán.</p>
				<button onclick="location.href='frm_RegistroClientes.php'" class="btn btn-Primary">Has tu Consulta</button>
				<br>
				<br>
			</div>
			
		</div>
	</section>
	</div>
	<br>

<?php 
		include('footer.php');
 ?>