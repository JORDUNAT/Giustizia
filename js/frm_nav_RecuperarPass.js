// JavaScript Document
//Fecha creado: 29/04/2016
//Propósito: Recuperar contraseña del Usuario

$(document).ready(function()
{
  //Evento sobre el botón ¿Olvidaste tu contraseña? que se encuentra en el frm_nav pero que se ve en el Index.php

  $('#btn_Recuperar').click(function()
  {
    //Validación del formulario
    $('#frm_Recuperar').validate(
    {
      rules:
      {
            txt_UsuarioR:{required:true}           
      },
      invalidHandler:function()
      {
        alert("Se requiere información obligatoria para la recuperación!");
        return false;
      },
      submitHandler:function()
      {
             var documento1     = $("input[name='txt_UsuarioR']").val();        

            var parametros = {'txt_UsuarioR':documento1};

           
        $.ajax({
                type: 'POST',
                url:  '../model/frm_nav_RecuperarPass.php',
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
              