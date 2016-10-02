// JavaScript Document
//Fecha creado: 27/09/2015
//Propósito: Editar usuarios empleados de la oficina desde el adminsitrador 
//           Adicionalmente el perfil secretario(a) podrá modificar los clientes pero no los usuarios

$(document).ready(function()
{
  //Evento sobre el botón Editar Usuario en formulario flk_Usuarios.php 

  $('#btn_ModyUsuarios').click(function()
  {
    //Validación del formulario
    $('#fModyUsuarios').validate(
    {
      rules:
      {
            TipDoc:{required:true},
            documento:{required:true},
            nombre:{required:true},
            apellidos:{required:true},
            genero:{required:true},
            telefono:{required:false},
            celular:{required:true},
            emial:{required:true},
            estado:{required:true},
            tipusu:{required:true}            
      },
      invalidHandler:function()
      {
        alert("Se requiere información obligatoria para la modificación de un Usuario!");
        return false;
      },
      submitHandler:function()
      {
             var TipDoc1        = $("#TipDoc").val();
             var documento1     = $("input[name='documento']").val();        
             var nombre1        = $("input[name='nombre']").val();
             var apellidos1     = $("input[name='apellidos']").val();
             var genero1        = $("#genero").val();
             var telefono1      = $("input[name='telefono']").val();
             var celular1       = $("input[name='celular']").val();
             var email1         = $("input[name='email']").val();
             var estado1        = $("#estado").val();
             var tipusu1        = $("#tipusu").val();


            var parametros = {'sel_TipDoc':TipDoc1, 'txt_documento':documento1, 'txt_nombre':nombre1, 'txt_apellidos':apellidos1, 'txt_telefono':telefono1, 'txt_celular':celular1, 'txt_email':email1, 'txt_genero':genero1, 'sel_tipusu':tipusu1, 'sel_estado':estado1};

           
        $.ajax({
                type: 'POST',
                url:  '../model/flk_Usuarios.php',
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