// JavaScript Document
//Fecha creado: 14/07/2016
//Propósito: Crear Municipios

$(document).ready(function()
{
  //Evento sobre el botón Crear Municipio en vista frm_ListaMunicipios.php

  $('#btn_CrearMunici').click(function()
  {
    //Validación del formulario
    $('#frm_crear').validate(
    {
      rules:
      {
            codigo:{required:true},
            departamento:{required:true},
            municipio:{required:true}
      },
      invalidHandler:function()
      {
        alert("Se requiere información obligatoria para crear un Municipio!");
        return false;
      },
      submitHandler:function()
      {
              var codigo1          = $("input[name='codigo']").val();
              var departamento1    = $("#departamento").val();
              var municipio1         = $("input[name='municipio']").val();


               var parametros = {'txt_codigo':codigo1,'txt_Departamento':departamento1, 'txt_Municipio':municipio1};
           
        $.ajax({
                type: 'POST',
                url:  '../model/frm_Municipios.php',
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