// JavaScript Document
//Fecha creado: 14/07/2016
//Propósito: Crear Departamentos

$(document).ready(function()
{
  //Evento sobre el botón Crear Departamento en vista frm_ListaDepartamentos.php

  $('#btn_CrearDepart').click(function()
  {
    //Validación del formulario
    $('#frm_crear').validate(
    {
      rules:
      {
            codigo:{required:true},
            departamento:{required:true},
            capital:{required:true}
      },
      invalidHandler:function()
      {
        alert("Se requiere información obligatoria para crear un Departamento!");
        return false;
      },
      submitHandler:function()
      {
              var codigo1          = $("input[name='codigo']").val();
              var departamento1    = $("input[name='departamento']").val();
              var capital1         = $("input[name='capital']").val();


               var parametros = {'txt_codigo':codigo1,'txt_departamento':departamento1, 'txt_capital':capital1};
           
        $.ajax({
                type: 'POST',
                url:  '../model/frm_Departamentos.php',
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