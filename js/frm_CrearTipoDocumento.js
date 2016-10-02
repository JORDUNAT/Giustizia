// JavaScript Document
//Fecha creado: 14/06/2016
//Propósito: Crear Clasificación de Procesos

$(document).ready(function()
{
  //Evento sobre el botón Crear Usuario en vista frm_ListaTipoProcesos.php

	$('#btn_CrearTipDocu').click(function()
	{
		//Validación del formulario
		$('#frm_crear').validate(
		{
			rules:
			{
		        descripcion:{required:true},
			},
			invalidHandler:function()
			{
				alert("Se requiere información obligatoria para crear un Tipo de Documento!");
				return false;
			},
			submitHandler:function()
			{
	            var descripcion1   	= $("input[name='descripcion']").val();


          	   var parametros = {'txt_descripcion':descripcion1};
				   
				$.ajax({
	              type: 'POST',
	              url:  '../model/frm_TipoDocumento.php',
	              data: parametros,
	              async : true,
	              success: function(data){
	                $("#mensaje1").slideDown();
	                $("#mensaje1").html(data);
	              }
	            });
			}
		});
	});
});