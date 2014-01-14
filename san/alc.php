<?php

require_once 'funciones.php';

/* variables de alumno */

$alumnos = $_POST['alumnos'];
$cursos = $_POST['cursos'];
$inscribir = $_POST['inscribir'];


insertarCursoAlumno($alumnos, $cursos);


for($i=0; $i<count($inscribir); $i++)
{
	insertarAlumnoMaterias($alumnos,$inscribir[$i]);
}


?>