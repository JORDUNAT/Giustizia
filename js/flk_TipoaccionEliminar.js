// JavaScript Document
//Fecha creado: 15/06/2016
//Propósito: Elimina Tipo de Acción

$(document).ready(function()
{
  //Evento sobre el botón modifica un cliente en vista flk_Tipoaccion.php

  $('#btn_EliminaAccion').click(function()
  {
    //Validación del formulario
    $('#flk_TipoAccionf').validate(
    {
      rules:
      {
            item:{required:true},
            descripcion:{required:true},          
      },
      invalidHandler:function()
      {
        alert("Se requiere información obligatoria para la eliminarción de un Tipo de Acción!");
        return false;
      },
      submitHandler:function()
      {
             var Id1            = $("#item").val();
             var descripcion1 = $("input[name='descripcion']").val();        

            var parametros = {'txt_id':Id1, 'txt_descripcion':descripcion1};

           
        $.ajax({
                type: 'POST',
                url:  '../model/flk_TipoaccionEliminar.php',
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