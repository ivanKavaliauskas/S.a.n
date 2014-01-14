<?php
require_once 'configuracion.php';
require_once 'conectar.php';

function esUsuario ( $DNI, $password ) 
{

	$conexion = conectar();

	// verifica que esten los dos campos completos.
	if ($DNI=='' || $password=='') return false;

	// busqueda de los datos de usuarios para loguear.
	$query = "SELECT  DNI, pass FROM tbl_usuarios WHERE DNI = '$DNI' AND  pass = '$password'";	
	
	$resultado = mysql_query($query);

	$row = mysql_fetch_array($resultado);	
	
	echo $query;

	$password_from_db = $row ['pass'];
	unset($query);

	// verifica que el pass enviado sea igual al pass de la db.
	if ( $password_from_db == $password ) 
	{
		return $row;

	} 
	else return false;

}

function traeNivel ($DNI, $password)
{

	// busqueda de los datos de usuarios para loguear.
	$query = "SELECT  nivel FROM tbl_usuarios WHERE DNI = '$DNI' AND  pass = '$password'";
	
	$resultado = mysql_query($query);

	$row = mysql_fetch_array($resultado); 
	
	$nivel = $row ['nivel'];

	return $nivel;

}