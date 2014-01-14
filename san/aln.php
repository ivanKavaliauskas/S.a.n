<?php
require_once 'funciones.php';

/* variables de alumno */

$cursos = $_POST['cursos'];
$materias = $_POST['materias'];
$alumnos = $_POST['alumnos'];
$notas = $_POST['notas'];
$fecha = $_POST['fecha'];

insertarNota($cursos,$materias,$alumnos,$notas,$fecha);

?>