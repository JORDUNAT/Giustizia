
<?php 
// html y php Document
//Fecha creado: 29/04/2016
//Propósito: Recuperar contraseña del Usuario y Validación de Ingreso a Giustizia
//Evento sobre el botón ¿Olvidaste tu contraseña? que se encuentra en el frm_nav pero que se ve en el Index.php

	include('head.php');
?>

<nav class="navbar navbar-default navbar-static-top">
			<h6 align="right">
				<div id="mensaje" style="display: none;">
				</div>

			<form align="right" name="frm_ingreso" id="frm_ingreso" method="post" action="" class="form-inline">
				
				<input has-success class="form-control" id="txt_Usuario" name="Usuario" type="number" min='0' placeholder="Documento Usuario:" />
							
				<input has-success class="form-control" id="txt_Clave"  name="Clave" type="password" placeholder="Clave:" />

				<input id="btn_Ingreso" type="submit" class="btn btn-primary" name='login' value="Iniciar Sesión" >
				<br>			
			</form>


		<button class="btn btn-Link"  data-toggle="modal" data-target="#msg_recordar">¿Olvidaste tu contraseña?</button>	

			</h6>
</nav>

<div class="modal fade bs-example-modal-sm" id="msg_recordar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-danger" id="myModalLabel"><b>Quieres recuperar tu contraseña?</b></h4>
      </div>
      <div class="modal-body">
        Ingresa tu documento y recibiras un correo con tu nueva contraseña.
      </div>
      <div class="modal-footer" align="center">
      	<form name="frm_Recuperar" id="frm_Recuperar" method="POST" action="../model/RecuperarPassword.php">
      		<div class="form-group" align="center">
				<input has-success class="form-control" id="txt_UsuarioR" name="txt_UsuarioR" type="number" min='0' placeholder="Documento del Usuario:" />
			</div>

		<input id="btn_Recuperar" type="submit" class="btn btn-primary" name='btn_Recuperar' value="Aceptar" >
		<i class="fa fa-refresh fa-spin"></i>
        <button class="btn btn-primary" data-dismiss="modal">Cancelar</button>
      	</form>
      	<br>
      	<span id="span1"></span>
      	<div id="mensaje1" style="display: none;">
		    </div>
      </div>
    </div>
  </div>
</div>