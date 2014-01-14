
<?php
include('configuracion.php');
include('conectar.php');

	$con = conectar();
	$id_category = $_POST['elegido'];  // este es el id de los cursos
	
	
	$consulta = "SELECT DISTINCT cursos_alumnos.idu as idu, tbl_usuarios.id, 
	CONCAT( tbl_usuarios.nombre, ' ', tbl_usuarios.apellido ) AS nombrecompleto
	FROM cursos_alumnos
	INNER JOIN tbl_usuarios ON tbl_usuarios.id = cursos_alumnos.idu
	WHERE cursos_alumnos.idc = ".$id_category;

	//$consulta = "SELECT CONCAT(nombre,' ',apellido) as nombrecompleto from tbl_usuarios where nivel = 2";

	$resultado = mysql_query($consulta);


		while($row = mysql_fetch_assoc($resultado)) 
		{
		  $dropdown .= "\r\n<option value='{$row['idu']}'>{$row['nombrecompleto']}</option>";
		}

		echo $dropdown;
