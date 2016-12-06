// JavaScript Document
//Fecha creado: 27/09/2015
//Propósito: Archivar una consulta

$(document).ready(function()
{
  //Evento sobre el botón modifica un cliente en vista flk_Consultas.php

  $('#btn_GuardarConsulta').click(function()
  {
    //Validación del formulario
    $('#flk_consultas').validate(
    {
      rules:
      {
            consultaoculta:{required:true},
            cuantia:{required:true},
            abogado:{required:true},
            TipAcc:{required:true},
            detaconsulta:{required:true},
            observaciones:{required:true}  
      },
      invalidHandler:function()
      {
        alert("Se requiere información obligatoria para la modificación de una Consulta!");
        return false;
      },
      submitHandler:function()
      {
             var consultaoculta1    = $("input[name='consultaoculta']").val();
             var abogado1           = $("input[name='abogado']").val();        
             var cuantia1           = $("input[name='cuantia']").val();      
             var TipAcc1            = $("#TipAcc").val();
             var detaconsulta1      = $("textarea[name='detaconsulta']").val();
             var observaciones1     = $("textarea[name='observaciones']").val();

            var parametros = {'txt_consulta':consultaoculta1, 'txt_abogado':abogado1 'txt_cuantia':cuantia1, 'txt_TipAcc':TipAcc1, 'txt_detaconsulta':detaconsulta1, 'txt_observaciones':observaciones1};
           
        $.ajax({
                type: 'POST',
                url:  '../model/flk_Consultas.php',
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