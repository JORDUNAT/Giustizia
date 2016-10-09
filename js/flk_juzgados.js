// JavaScript Document
//Fecha creado: 14/07/2016
//Propósito: Modificar Juzgados

$(document).ready(function()
{
  //Evento sobre el botón Modificar Juzgado en vista flk_Juzgados.php

  $('#btn_ModyJuzgado').click(function()
  {
    //Validación del formulario
    $('#flk_Juzgadosf').validate(
    {
      rules:
      {
        item:{required:true},
        juzgado:{required:true},
        circuito:{required:false},
        distrito:{required:false},
        direccion:{required:true},
        telefono:{required:true},
        contacto:{required:false},
        horario:{required:true},
        TipJuz:{required:true}
      },
      invalidHandler:function()
      {
        alert("Se requiere información obligatoria para modificar un Jugado!");
        return false;
      },
      submitHandler:function()
      {
        var item1             = $("#item").val();
        var juzgado1          = $("input[name='juzgado']").val();
        var circuito1         = $("input[name='circuito']").val();
        var distrito1         = $("input[name='distrito']").val();
        var direccion1        = $("input[name='direccion']").val();
        var telefono1         = $("input[name='telefono']").val();
        var contacto1         = $("input[name='contacto']").val();
        var horario1          = $("input[name='horario']").val();
        var TipJuz1           = $("#TipJuz").val();
          
        var parametros = {'txt_item':item1, 'txt_juzgado':juzgado1,'txt_circuito':circuito1, 'txt_distrito':circuito1, 'txt_direccion':direccion1, 'txt_telefono':telefono1, 'txt_contacto':contacto1, 'txt_horario':horario1, 'txt_TipJuz':TipJuz1};
           
        $.ajax({
                type: 'POST',
                url:  '../model/flk_Juzgados.php',
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