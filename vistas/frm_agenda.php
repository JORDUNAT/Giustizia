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
    $data = $obj_model -> getTipoAccionRelacion($conexion);

?>

<script type="text/javascript">
$(document).ready(function(){
    $('#tbl_Acciones').DataTable();
});
</script>

    <article class="col-xs-12  col-sm-8 col-md-9 col-lg-9">
        <div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
            <div  align='center' class="jumbotron">
            <h8 align='center'><b>AGENDA</b></h8>
            </div>

                <iframe width="100%" height="110%" src="agenda/index.php" scrolling="no" ></iframe>

        </div>
    </article>
    </section>
    </div>


<?php 
        include('footer.php');
 ?>