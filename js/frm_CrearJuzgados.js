// JavaScript Document
//Fecha creado: 14/07/2016
//Propósito: Crear Juzgados

$(document).ready(function()
{
  //Evento sobre el botón Crear Juzgado en vista frm_ListaJuzgados.php

  $('#btn_CrearJuzgado').click(function()
  {
    //Validación del formulario
    $('#frm_crear').validate(
    {
      rules:
      {
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
        alert("Se requiere información obligatoria para crear un Jugado!");
        return false;
      },
      submitHandler:function()
      {
              var juzgado1          = $("input[name='juzgado']").val();
              var circuito1         = $("input[name='circuito']").val();
              var distrito1         = $("input[name='distrito']").val();
              var direccion1        = $("input[name='direccion']").val();
              var telefono1         = $("input[name='telefono']").val();
              var contacto1         = $("input[name='contacto']").val();
              var horario1          = $("input[name='horario']").val();
              var TipJuz1           = $("#TipJuz").val();
          
              var parametros = {'txt_juzgado':juzgado1,'txt_circuito':circuito1, 'txt_distrito':circuito1, 'txt_direccion':direccion1, 'txt_telefono':telefono1, 'txt_contacto':contacto1, 'txt_horario':horario1, 'txt_TipJuz':TipJuz1};
           
        $.ajax({
                type: 'POST',
                url:  '../model/frm_Juzgados.php',
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