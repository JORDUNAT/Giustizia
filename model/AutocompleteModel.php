<?php
	/*Enlace la capa del modelo
	Fecha creado:02/09/2015*/
	include('../model/conexion.php');


	$termino 	= $_REQUEST['term'];
	$areaObj 	=	new AutocompleteModel();

	echo json_encode($areaObj -> getAutoarea($termino,$conexion));	

	//Clases del modelo
	class AutocompleteModel
	{	

		function getAutoarea($param,$conexion)
			{
				/**
				* @Description Obtener lista de areas a nivel nacional de la BD.
				* @param array $params
				* @param string $conexion
				* @uses
				* @author ADSI
				* @version 1.0
				* @copyright 27/09/2015
				* @return array $areaRes
				**/
				 
				
				//Fase 1. Construcción de la lista desde la BD
				$areaLst 	= 	array();
				$areaBd 	= 	array();
				$sql 		= 	"SELECT Area_Codigo, Area_Area FROM tbl_areas";
				$queryBd	=	$conexion -> query($sql);
				//echo $sql; die();
				if (!$queryBd)
				{
					return 'Error:'.$sql;
				}
				//Recorrido con el cursor
				while ($cursor = $queryBd -> fetch_assoc())
				{
					$areaBd['label']	=	$cursor['Area_Codigo'].': '.$cursor['Area_Area'];
					$areaBd['value']	=	$cursor['Area_Codigo'].': '.$cursor['Area_Area'];
					array_push($areaLst,$areaBd);
				}

				//Fase 2. Filtrar según término de búsqueda
				$areaRes	=	array();
				foreach ($areaLst as $autoArea)
				{
					$areaLabel = $autoArea['label'];
					if (strpos(strtoupper($areaLabel), strtoupper($param)) !== false)
					{
						array_push($areaRes,$autoArea);
					}
				}
				return $areaRes;
				
			}
	}
?>