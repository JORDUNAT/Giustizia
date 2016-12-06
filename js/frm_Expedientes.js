// JavaScript Document
//Fecha creado: 27/09/2015
//Propósito: Archivar una consulta

$(document).ready(function()
{
  //Evento sobre el botón modifica un cliente en vista flk_Expedientes.php

  $('#btn_GuardarExpediente').click(function()
  {
    //Validación del formulario
    $('#frm_crear').validate(
    {
      rules:
      {
            consultaoculta:{required:true},
            fechaex:{required:true},
            abogado:{required:true},
            tiproceso:{required:true},
            detalleexpediente:{required:true},
            observaciones:{required:true}  
      },
      invalidHandler:function()
      {
        alert("Se requiere información obligatoria para la modificación de una Expediente!");
        return false;
      },
      submitHandler:function()
      {
             var consultaoculta1    = $("input[name='consultaoculta']").val();
             var fechaex1           = $("input[name='fechaex']").val();           
             var tiproceso1         = $("#tiproceso").val();
             var detalleexpediente1 = $("textarea[name='detalleexpediente']").val();

            var parametros = {'txt_consulta':consultaoculta1, 'txt_fechaex':fechaex1, 'txt_tiproceso':tiproceso1, 'txt_detalleexpediente':detalleexpediente1};
           
        $.ajax({
                type: 'POST',
                url:  '../model/frm_Expediente.php',
                data: parametros,
                async : true,
                success: function(data){
                  $("#mensaje1").slideDown();
                  $("#mensaje1").html(data);
                }
              });
      }
    });
  });
});