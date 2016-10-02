// JavaScript Document
//Fecha creado: 27/05/2016
//Propósito: Modificación Deparamento

$(document).ready(function()
{
  //Evento sobre el botón modifica un cliente en vista flk_Departamentos.php

  $('#btn_ModDeparta').click(function()
  {
    //Validación del formulario
    $('#flk_Departamentof').validate(
    {
      rules:
      {
            item:{required:true},
            descripcion:{required:true},          
      },
      invalidHandler:function()
      {
        alert("Se requiere información obligatoria para la modificación de un Deparamento!");
        return false;
      },
      submitHandler:function()
      {
             var Id1           = $("#item").val();
             var descripcion1 = $("input[name='descripcion']").val();
             var capital1 = $("input[name='capital']").val();         

            var parametros = {'txt_id':Id1, 'txt_descripcion':descripcion1, 'txt_capital':capital1};

           
        $.ajax({
                type: 'POST',
                url:  '../model/flk_Departamentos.php',
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