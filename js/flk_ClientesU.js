// JavaScript Document
//Fecha creado: 27/09/2015
//Propósito: Modificación Clientes

$(document).ready(function()
{
  //Evento sobre el botón modifica un cliente en vista fll_Clientes.php

  $('#btn_ModyClientesU').click(function()
  {
    //Validación del formulario
    $('#fModyClientes').validate(
    {
      rules:
      {
            TipDoc:{required:true},
            documentooculto:{required:true},
            nombre:{required:true},
            apellidos:{required:true},
            direccion:{required:true},
            genero:{required:true},
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
             var apellidos1     = $("input[name='apellidos']").val();
             var direccion1     = $("input[name='apellidos']").val();             
             var genero1        = $("#genero").val();
             var telefono1      = $("input[name='telefono']").val();
             var celular1       = $("input[name='celular']").val();
             var email1         = $("input[name='email']").val();


            var parametros = {'sel_TipDoc':TipDoc1, 'txt_documento':documento1, 'txt_nombre':nombre1, 'txt_apellidos':apellidos1, 'txt_direccion':direccion1, 'txt_telefono':telefono1, 'txt_celular':celular1, 'txt_email':email1, 'txt_genero':genero1};

           
        $.ajax({
                type: 'POST',
                url:  '../model/flk_ClientesU.php',
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