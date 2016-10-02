// JavaScript Document
//Fecha creado: 19/03/2015
//Propósito: Permite que los usuarios o clienten puedan cambier la clave

$(document).ready(function()
{
  //Evento sobre el botón para cambiar clave en vista flk_CambioClave.php

  $('#btn_CambiarClave').click(function()
  {
    //Validación del formulario
    $('#flk_CambioClave').validate(
    {
      rules:
      {
            nueclave:{required:true},
            confclave:{required:true},           
      },
      invalidHandler:function()
      {
        alert("Se requiere información obligatoria para cambiar la clave!");
        return false;
      },
      submitHandler:function()
      {
             var nueclave1      = $("input[name='nueclave']").val();
             var confclave1     = $("input[name='confclave']").val();


            var parametros = {'nueclave':nueclave1, 'confclave':confclave1};

           
        $.ajax({
                type: 'POST',
                url:  '../model/flk_CambioClave.php',
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