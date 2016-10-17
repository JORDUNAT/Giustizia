// JavaScript Document
//Fecha creado: 30/09/2015
//Propósito: Crear Consutlas desde la aplicación con clave de administrador

$(document).ready(function()
{
  //Evento sobre el botón Crear Consutlas en vista frm_Consutlas.php

	$('#btn_CrearConsulta').click(function()
	{
		//Validación del formulario
		$('#frm_crear').validate(
		{
			rules:
			{
		        cliente:{required:true},
		        TipAcc:{required:true},
		        abogado:{required:true},
		        cuantia:{required:true},
		        detaconsulta:{required:true},
		        observaciones:{required:true}
			},
			invalidHandler:function()
			{
				alert("Se requiere información obligatoria para la creación de una Consulta!");
				return false;
			},
			submitHandler:function()
			{
	           var cliente1      	= $("#cliente").val();
	           var TipAcc1		  	= $("#TipAcc").val();
	           var abogado1			= $('#abogado').val();	           
	           var cuantia1      	= $("input[name='cuantia']").val();
	           var detaconsulta1   	= $("textarea[name='detaconsulta']").val();
	           var observaciones1   = $("textarea[name='observaciones']").val();

          		var parametros = {'sel_cliente':cliente1, 'sel_TipAcc':TipAcc1, 'sel_abogado':abogado1, 'txt_cuantia':cuantia1, 'txt_detaconsulta':detaconsulta1, 'txt_observaciones':observaciones1};

				   
				$.ajax({
	              type: 'POST',
	              url:  '../model/frm_Consultas.php',
	              data: parametros,
	              async : true,
	              success: function(data){
	                $("#mensaje").slideDown();
	                $("#mensaje").html(data);
	              }
	            });
			}
		});
	});
});