<?php

// iniciamos session
session_start();

// archivos necesarios
require_once 'configuracion.php';
require_once 'user.php';

 echo $_POST['login'];
 echo $_POST['user'];
// verificamos que no este conectado el usuario
if ( !empty( $_SESSION['user'] ) && !empty($_SESSION['pass']) ) {
	
	if ( esUsuario( $_SESSION['user'], $_SESSION['pass'] )) {
	header( 'Location: index.php' );
	
	}
}
 
// si se envio el formulario
/*
if ( !empty($_POST['login']) ) {
 echo "hola";
 echo $_POST['login'];
*/


// definimos las variables
if ( !empty($_POST['user']) )    $usuario   = $_POST['user']; 
if ( !empty($_POST['pass']) )   $password  = $_POST['pass'];
 
// completamos la variable error si es necesario
if ( empty($usuario) )  $error['user']       = 'Es obligatorio completar el nombre de usuario';
if ( empty($password) ) $error['pass']   = 'Es obligatorio completar la contraseña';
 
// si no hay errores registramos al usuario
if ( empty($error) ) {
 
// verificamos que los datos ingresados correspondan a un usuario, armar encriptacion md5 luego
if ( $arrUsuario = esUsuario($usuario,$password) ) {
 
// definimos las sesiones
$_SESSION['password']   = $arrUsuario['pass'];
$_SESSION['DNI'] = $arrUsuario['DNI'];
 
$nvl = traeNivel($usuario,$password);

	if($nvl == 1)
	{	
		$_SESSION['nivel'] = $nvl;
		header('Location: docente.php');
	}
	else if($nvl == 2)
	{
		$_SESSION['nivel'] = $nvl;
		header('Location: alumno.php');
	}	
 
	} 

		else {
		$error['noExiste']   = 'El nombre de usuario o contraseña no coinciden';
		header('Location: login.php');

		}
	 
}


//}
 
?>