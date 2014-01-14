
<?php
include('configuracion.php');
include('conectar.php');

$con = conectar();
	$id_category = $_POST['idc'];  // este es el id de los cursos
	var_dump($id_category);
	$consulta = "SELECT DISTINCT tbl_cursos.idc as idc, tbl_usuarios.id, 
	CONCAT( tbl_usuarios.nombre, ' ', tbl_usuarios.apellido ) AS nombrecompleto
	FROM tbl_cursos
	INNER JOIN tbl_usuarios ON tbl_usuarios.id = tbl_cursos.idc
	WHERE tbl_cursos.idc = ".$id_category;
	//$consulta = "SELECT CONCAT(nombre,' ',apellido) as nombrecompleto from tbl_usuarios where nivel = 2";
	$resultado = mysql_query($consulta);
	$dropdown = "<select name='alumnos' id='subcategorias'>";
	$dropdown .= "<option value='Seleccione alumno'>|  Seleccione alumno  |</option>";


		while($row = mysql_fetch_assoc($resultado)) 
		{
		  $dropdown .= "\r\n<option value='{$row['idc']}'>{$row['nombrecompleto']}</option>";
		}
		
		die();
		$dropdown .= "\r\n</select>";
		echo $dropdown;