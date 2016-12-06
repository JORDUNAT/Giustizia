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
    $ususesion=$_SESSION['s_usuario'];
?>

<?php

/**
**
**  BY iCODEART
**
**********************************************************************
**                      REDES SOCIALES                            ****
**********************************************************************
**                                                                ****
** FACEBOOK: https://www.facebook.com/icodeart                    ****
** TWIITER: https://twitter.com/icodeart                          ****
** YOUTUBE: https://www.youtube.com/c/icodeartdeveloper           ****
** GITHUB: https://github.com/icodeart                            ****
** TELEGRAM: https://telegram.me/icodeart                         ****
** EMAIL: info@icodeart.com                                       ****
**                                                                ****
**********************************************************************
**********************************************************************
**/
    
    //incluimos nuestro archivo config
    include 'config.php'; 

    // Incluimos nuestro archivo de funciones
    include 'funciones.php';

    // Obtenemos el id del evento
    $id  = evaluar($_GET['id']);

    // y lo buscamos en la base de dato
    $bd  = $conexion->query("SELECT * FROM eventos WHERE id=$id");

    // Obtenemos los datos
    $row = $bd->fetch_assoc();

    // titulo 
    $titulo=$row['title'];

    // cuerpo
    $evento=$row['body'];

    // Fecha inicio
    $inicio=$row['inicio_normal'];

    // Fecha Termino
    $final=$row['final_normal'];

// Eliminar evento
if (isset($_POST['eliminar_evento'])) 
{
    $id  = evaluar($_GET['id']);
    $sql = "DELETE FROM eventos WHERE id = $id";
    if ($conexion->query($sql)) 
    {
        echo "Evento eliminado";
    }
    else
    {
        echo "El evento no se pudo eliminar";
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

    <link href="../../css/miestilo.css" rel="stylesheet" />
    <link href="../../css/bootstrap.css" rel="stylesheet" />
    <link href="../../css/bootstrap-theme.css" rel="stylesheet" /> 


	<title><img src="../../img/Logo2.png" align="left" width="20" height="20"><h6 class="text-success" align="center"><?=$titulo?></title>


</head>
<body>

    <div class="col-xs-12  col-sm-12 col-md-12 col-lg-12" style="background: #551500">
             <h4 class="modal-title" id="myModalLabel" style="color:#fff; font-size:95%">Expediente: <b><?=$titulo?> </b></h4>
    </div>

    <div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
        <br>
    </div>

    <div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12" style="margin left: 2%  margin top: 2% margin right: 2%">
        <b>Fecha inicio: </b> <?=$inicio?> <br>
        <b>Fecha termino:</b> <?=$final?>
    </div>

    <div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
        <label>Descripción: </label> 
    </div>

    <div class="ibody1 col-xs-12  col-sm-12 col-md-12 col-lg-12">
        <p><?=$evento?></p>
    </div>
    
    <div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
        <br>
    </div>

 	
</body>
<form action="" method="post">
    <button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar</button>
</form>
</html>
