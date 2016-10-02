// JavaScript Document
//Fecha creado: 13/12/2015
//Propósito: Registro de Oficina Jurídica

$(document).ready(function()
{
  //Evento sobre el botón Crear una oficina en vista frm_RegistroOficina.php

	$('#btn_RegistarOficina').click(function()
	{
		//Validación del formulario
		$('#RegOficinas').validate(
		{
			rules:
			{
		        TipDoc:{required:true},
		        documento:{required:true},
		        nombre:{required:true},
		        direccion:{required:true},
		        departamento:{required:true},
		        municipios:{required:false},
		        telefono:{required:true},
		        celular:{required:false},
		        emial:{required:true}
			},
			invalidHandler:function()
			{
				//Mensaje de error
				alert("Se requiere información obligatoria para la creación de tu Oficina!");
				return false;
			},
			submitHandler:function()
			{
	           var TipDoc1      	= $("#TipDoc").val();
	           var documento1   	= $("input[name='documento']").val();
	           var nombre1      	= $("input[name='nombre']").val();
	           var direccion1   	= $("input[name='direccion']").val();
	           var departamento1  	= $("#departamento").val();
	           var municipios1		= $('#municipios').val();
	           var telefono1    	= $("input[name='telefono']").val();
	           var celular1     	= $("input[name='celular']").val();
	           var email1       	= $("input[name='email']").val();

          	   var parametros = {'sel_TipDoc':TipDoc1, 'txt_documento':documento1, 'txt_nombre':nombre1, 'txt_direccion':direccion1, 'txt_departamento':departamento1, 'txt_municipio':municipios1, 'txt_telefono':telefono1, 'txt_celular':celular1, 'txt_email':email1};

				//Envio y retorno de la información a través de ajax   
				$.ajax({
	              type: 'POST',
	              url:  '../model/frm_RegistroOficina.php',
	              data: parametros,
	              async : true,
	              success: function(data){
	                $("#mensaje").slideDown(); //Div que se encuentra en el formulario que se encuentra en vistas frm_RegistroOficina.php 
	                $("#mensaje").html(data);
	              }
	            });
			}
		});
	});
});