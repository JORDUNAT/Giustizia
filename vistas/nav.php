
<?php 
	include('head.php');
?>

<nav align="right" class="navbar navbar-default navbar-static-top">
			<h8 align="right">

				<?php  if ($sesion)	: 	
					 include('../model/conexion.php');
            $logo=$_SESSION['s_logo'];

            if ($logo=='0'){
              echo '<b>'.$_SESSION['s_nombre'].' '.$_SESSION['s_apellido'].'  ';
            }  
            else
            {
              echo '<img src="'.$logo.'" align="left" height="35" />';
              echo '<b>'.$_SESSION['s_nombre'].' '.$_SESSION['s_apellido'].'  ';

            }
          ?>

				<?php else : 	
					session_unset();
					session_destroy();
					header("Location: Index.php");				
				endif; 	?>

			<button class="btn btn-primary"  data-toggle="modal" data-target="#msg_cerrar">Cerrar Sesión</button>
			</h8>
</nav>

<div class="modal fade bs-example-modal-sm" id="msg_cerrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-danger" id="myModalLabel"><b>Confirmar Salida</b></h4>
      </div>
      <div class="modal-body">
        Confirma salir del sistema?
      </div>
      <div class="modal-footer" align="center">
        <button class="btn btn-primary" id='btn_CerrarSesion'>Aceptar</button>
        <button class="btn btn-primary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>