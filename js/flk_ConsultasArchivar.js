// JavaScript Document
//Fecha creado: 27/09/2015
//Propósito: Modificación Clientes

$(document).ready(function()
{
  //Evento sobre el botón modifica un cliente en vista fll_Clientes.php

  $('#btn_ArchivarConsulta').click(function()
  {
    //Validación del formulario
    $('#flk_consultas').validate(
    {
      rules:
      {
            consultaoculta:{required:true},
            cuantia:{required:true},
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
             var cuantia1            = $("input[name='cuantia']").val();      
             var TipAcc1            = $("#TipAcc").val();
             var detaconsulta1      = $("input[name='detaconsulta']").val();
             var observaciones1     = $("input[name='observaciones']").val();

            var parametros = {'txt_consulta':consultaoculta1, 'txt_cuantia':cuantia1, 'txt_TipAcc':TipAcc1, 'txt_detaconsulta':detaconsulta1, 'txt_observaciones1':observaciones1};

           
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