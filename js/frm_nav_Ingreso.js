// html y php Document
//Fecha creado: 29/04/2016
//Propósito: Validación de Ingreso a Giustizia
//Evento sobre el botón Iniciar Sesión que se encuentra en el frm_nav pero que se ve en el Index.php

$(document).ready(function()
{

	$('#btn_Ingreso').click(function()
	{

		//Validación del formulario
		$('#frm_ingreso').validate(
		{

			rules:
			{
				Usuario:{required:true},
				Clave:{required:true}
			},
			invalidHandler:function()
			{
				alert("Se requiere información para ingresar!");
				return false;
			},
			submitHandler:function()
			{
				   var txt_Usuario1 	= $("input[name='Usuario']").val();
				   var txt_Clave1 		= $("input[name='Clave']").val();   				   				   				   

					var parametros = {'Usuario':txt_Usuario1, 'Clave':txt_Clave1};

				    $.ajax({
				      type: 'POST',
				      url:  '../model/frm_nav_Ingreso.php',
				      data: parametros,
				      async : true,
				      success: function(data){
				        if (data==1){

				        	location.href="../vistas/frm_Base.php";
				        }
				        else
				        {
				        	$("#mensaje").slideDown();
				        	$("#mensaje").html(data);
				        }	
				      }
				    });
			}
		});
	});
});