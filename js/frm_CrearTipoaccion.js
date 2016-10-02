// JavaScript Document
//Fecha creado: 14/06/2016
//Propósito: Crear tipo de acción

$(document).ready(function()
{
  //Evento sobre el botón Crear Usuario en vista frm_RegistroUsuario.php

	$('#btn_CrearTipAcc').click(function()
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
				alert("Se requiere información obligatoria para crear el tipo de acción!");
				return false;
			},
			submitHandler:function()
			{
	           var descripcion1   	= $("input[name='descripcion']").val();


          	   var parametros = {'descripcion':descripcion1};
				   
				$.ajax({
	              type: 'POST',
	              url:  '../model/frm_Tipoaccion.php',
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