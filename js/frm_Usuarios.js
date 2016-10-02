// JavaScript Document
//Fecha creado: 30/09/2015
//Propósito: Crear usuario desde la aplicación con clave de administrador

$(document).ready(function()
{
  //Evento sobre el botón Crear Usuario en vista frm_Usuarios.php

	$('#btn_GuardarNuevoUsuario').click(function()
	{
		//Validación del formulario
		$('#frm_Usuarios').validate(
		{
			rules:
			{
		        TipDoc:{required:true},
		        documento:{required:true},
		        departamento:{required:true},
		        municipios:{required:true},
		        nombre:{required:true},
		        apellidos:{required:true},
		        telefono:{required:true},
		        celular:{required:true},
		        emial:{required:true},
		        genero:{required:true},
		        tipusu:{required:true}
			},
			invalidHandler:function()
			{
				alert("Se requiere información obligatoria para la creación de un Usuario!");
				return false;
			},
			submitHandler:function()
			{
	           var TipDoc1      	= $("#TipDoc").val();
	           var documento1   	= $("input[name='documento']").val();
	           var departamento1  	= $("#departamento").val();
	           var municipios1		= $('#municipios').val();	           
	           var nombre1      	= $("input[name='nombre']").val();
	           var apellidos1   	= $("input[name='apellidos']").val();
	           var area1       		= $("input[name='area']").val();
	           var telefono1    	= $("input[name='telefono']").val();
	           var celular1     	= $("input[name='celular']").val();
	           var email1       	= $("input[name='email']").val();
	           var genero1      	= $("input[name='genero']:checked").val();
	           var tipusu1      	= $("#tipusu").val();


          		var parametros = {'sel_TipDoc':TipDoc1, 'txt_documento':documento1, 'txt_departamento':departamento1, 'txt_municipio':municipios1, 'txt_nombre':nombre1, 'txt_apellidos':apellidos1, 'txt_telefono':telefono1, 'txt_celular':celular1, 'txt_email':email1, 'txt_genero':genero1, 'sel_tipusu':tipusu1};

				   
				$.ajax({
	              type: 'POST',
	              url:  '../model/frm_Usuarios.php',
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