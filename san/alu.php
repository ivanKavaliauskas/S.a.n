<?php

require_once 'funciones.php';

/* variables de alumno */

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$DNI = $_POST['DNI'];
$email = $_POST['email'];
$domicilio = $_POST['domicilio'];
$ciudad = $_POST['ciudad'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$fnac = $_POST['fnac'];


$ultimoAlumno = 0;

$ultimoAlumno = insertarAlumno($nombre, $apellido, $email, $DNI, $domicilio, $ciudad, $telefono, $celular, $fnac);
//insertarAlumnoAsignatura($ultimoAlumno,$idm);

refresh("docente.php?page=altaalumno");


?>