<?php 
//Alimente el div municipios de los formularios cuando el usaurio selecciona el departamento

include('conexion.php');?>
	<?php 

		$qrymuni="SELECT * FROM tbl_municipios WHERE muni_Departamento=".$_GET['id']; // Sleccion de Departamentos
		$qry = $conexion->query($qrymuni);

		echo "<label>Municipio: </label>";
		echo '<select name="municipios" id="municipios" class="form-control">';
			while ($municipios = $qry->fetch_assoc())
			{
				echo  "<option value='".$municipios['muni_Codigo']."'>".$municipios['muni_Municipio']."</option>";
			}
		echo '</select>';
	?>