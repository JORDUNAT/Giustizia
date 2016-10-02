// JavaScript Document
//Fecha creado: 30/09/2015
//Propósito: Crear usuario desde la aplicación con clave de administrador o con rol de secreatrio(a)

$(document).ready(function()
{
  //Evento sobre el botón Crear Usuario en vista frm_RegistroUsuario.php

	$('#btn_NuevoCliente').click(function()
	{
		//Validación del formulario
		$('#frm_clientes').validate(
		{
			rules:
			{
		        TipDoc:{required:true},
		        documento:{required:true},
		        nombre:{required:true},
		        apellidos:{required:true},
		        direccion:{required:true},
		        departamento:{required:true},
		        municipios:{required:false},
		        genero:{required:true},
		        telefono:{required:true},
		        celular:{required:false},
		        email:{required:true},
		        fecha:{required:true},
		        estrato:{required:true}
			},
			invalidHandler:function()
			{
				alert("Se requiere información obligatoria para la creación del Cliente!");
				return false;
			},
			submitHandler:function()
			{
	           var TipDoc1      	= $("#TipDoc").val();
	           var documento1   	= $("input[name='documento']").val();
	           var nombre1      	= $("input[name='nombre']").val();
	           var apellidos1      	= $("input[name='apellidos']").val();	           
	           var direccion1   	= $("input[name='direccion']").val();
	           var departamento1  	= $("#departamento").val();
	           var municipios1		= $('#municipios').val();
	           var genero1			= $("#genero").val();
	           var telefono1    	= $("input[name='telefono']").val();
	           var celular1     	= $("input[name='celular']").val();
	           var email1 			= $("input[name='email']").val();
	           var fecha1 			= $("input[name='fecha']").val();
	           var estrato1			= $("#estrato").val();

          	   var parametros = {'sel_TipDoc':TipDoc1, 'txt_documento':documento1, 'txt_nombre':nombre1, 'txt_apellidos':apellidos1, 'txt_direccion':direccion1, 'txt_departamento':departamento1, 'txt_municipio':municipios1, 'sel_genero':genero1, 'txt_telefono':telefono1, 'txt_celular':celular1, 'txt_email':email1, 'txt_fecha':fecha1, 'sel_estrato':estrato1};
				   
				$.ajax({
	              type: 'POST',
	              url:  '../model/frm_Clientes.php',
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