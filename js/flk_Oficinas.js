// JavaScript Document
//Fecha creado: 28/09/2015
//Propósito: Editar usuario

$(document).ready(function()
{
  //Evento sobre el botón Crear Usuario en vista flk_UsuariosU.php

  $('#btn_cambiooficina').click(function()
  {
    //Validación del formulario
    $('#flk_oficina').validate(
    {
      rules:
      {
            TipDoc:{required:true},
            documentooculto:{required:true},
            nombre:{required:true},
            direccion:{required:true},
            telefono:{required:false},
            celular:{required:true},
            emial:{required:true},           
      },
      invalidHandler:function()
      {
        alert("Se requiere información obligatoria para la modificación de un Usuario!");
        return false;
      },
      submitHandler:function()
      {
             var TipDoc1        = $("#TipDoc").val();
             var documento1     = $("input[name='documentooculto']").val();        
             var nombre1        = $("input[name='nombre']").val();
             var direccion1     = $("input[name='direccion']").val();
             var telefono1      = $("input[name='telefono']").val();
             var celular1       = $("input[name='celular']").val();
             var email1         = $("input[name='email']").val();


            var parametros = {'sel_TipDoc':TipDoc1, 'txt_documento':documento1, 'txt_nombre':nombre1, 'txt_telefono':telefono1, 'txt_direccion':direccion1, 'txt_celular':celular1, 'txt_email':email1};

           
        $.ajax({
                type: 'POST',
                url:  '../model/flk_Oficinas.php',
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