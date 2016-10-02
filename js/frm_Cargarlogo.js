// JavaScript Document
//Fecha creado: 30/09/2015
//Propósito: Crear usuario desde la aplicación con clave de administrador o con rol de secreatrio(a)

$(document).ready(function()
{
  //Evento sobre el botón Crear Usuario en vista frm_RegistroUsuario.php

	$('#file-save').click(function()
	{
		//Validación del formulario
		$('#frm_logo').validate(
		{
			rules:
			{
		        file:{required:true},
			},
			invalidHandler:function()
			{
				alert("Se requiere información obligatoria para la creación del Cliente!");
				return false;
			},
			submitHandler:function()
			{
	           var archivo      	= new FormData();
	           archivo.append((formulario))

				$.ajax({
	              type: 'POST',
	              url:  '../model/frm_CargarLogo.php',
	              contentType: false,
	              processData: false,
	              data: archivo,
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