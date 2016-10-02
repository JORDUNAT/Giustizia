// JavaScript Document
//Fecha creado: 27/09/2015
//Evento sobre los botones de la aplicación
$(document).ready(function()
{
	$('#btn_CerrarSesion').click(function()
	{
		//Cerrar Seción boton ubicado en el nav.php

		location.href='../vistas/cerrar_sesion.php';
	});
	
	$('#btn_Inicio').click(function()
	{
		//Cargar el formulario de base, boton ubicado en menu.php

		location.href='../vistas/frm_Base.php';
	});

	$('#btn_crearusaurio').click(function()
	{
		//Cargar el formulario de crear usuario, boton ubicado en frm_ListaUsuarios.php

		location.href='../vistas/frm_Usuarios.php';
	});

	$('#btn_CancelarCrearUsuairo').click(function()
	{
		//Cargar el formulario de crear usuario, boton ubicado en frm_ListaUsuarios.php

		location.href='../vistas/frm_ListaUsuarios.php';
	});


	$('#btn_crearcliente').click(function()
	{
		//Cargar el formulario de crear cliente, boton ubicado en frm_ListaClientes.php

		location.href='../vistas/frm_Clientes.php';
	});


	$('#btn_CancelarCrearCliente').click(function()
	{
		//Cancelar accion en el formulario de frm_Clientes, boton que devuelve a frm_ListaClientes.php

		location.href='../vistas/frm_ListaClientes.php';
	});	

});	