// JavaScript Document
//Fecha creado: 27/05/2016
//Propósito: Modificación Municipios

$(document).ready(function()
{
  //Evento sobre el botón modifica un cliente en vista flk_Municipios.php

  $('#btn_ModMunici').click(function()
  {
    //Validación del formulario
    $('#flk_Municipiof').validate(
    {
      rules:
      {
            item:{required:true},
            descripcion:{required:true},          
      },
      invalidHandler:function()
      {
        alert("Se requiere información obligatoria para la modificación de un Municipio!");
        return false;
      },
      submitHandler:function()
      {
             var Id1           = $("#item").val();
             var descripcion1 = $("input[name='municipio']").val();

            var parametros = {'txt_id':Id1, 'txt_descripcion':descripcion1};

           
        $.ajax({
                type: 'POST',
                url:  '../model/flk_Municipios.php',
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