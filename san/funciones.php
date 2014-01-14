
<?php
include('configuracion.php');
include('conectar.php');


function refresh($url)
{
?>
<html>
<head>
<title>Please wait..</title>
<meta http-equiv="refresh" content="2; url=<?php echo $url;?>">
</head>

<body>
Redireccionando...por favor espere.
</body>
</html>
<?} 

function traerAlumnos()
{
		
	$con = conectar();
	$consulta = "SELECT tbl_usuarios.nombre, tbl_usuarios.apellido, tbl_asignaturas.nota as nota, tbl_materias.nombre as nombrem
	from tbl_usuarios 
	inner join tbl_asignaturas on tbl_asignaturas.ida = tbl_usuarios.id
	inner join tbl_materias on tbl_asignaturas.idm = tbl_materias.idm
	WHERE nivel = 2";
	$resultado = mysql_query($consulta);
	$cantidadefilas = mysql_num_rows($resultado); 


		echo '<table border="1">';
		echo '<td>DATOS ALUMNOS</td>';
		echo '<tr>';
		echo '<th>Nombre</th>';
		echo '<th>Apellido</th>';
		echo '<th>Nota</th>';
		echo '<th>Materia</th>';
		echo '</tr>';
		echo '<tr>';
		


	for ( $i = 0; $i < $cantidadefilas; $i++ )
	 { 
	 	
	 	$row = mysql_fetch_array ($resultado); echo'<tr br>';  

	 	echo '<td>'.$row['nombre'].'</td>';
		echo '<td>'.$row['apellido'].'</td>';
		echo '<td>'.$row['nota'].'</td>';
		echo '<td>'.$row['nombrem'].'</td>';
		echo '</tr>';
		
	}

		echo '</table>';

}


function traerNotasAlumno($DNI)
{
	$con = conectar();
	$consulta = "SELECT tbl_usuarios.nombre, tbl_usuarios.apellido, tbl_asignaturas.nota as nota, tbl_asignaturas.fecha, tbl_materias.nombre as nombrem
	from tbl_usuarios 
	inner join tbl_asignaturas on tbl_asignaturas.ida = tbl_usuarios.id
	inner join tbl_materias on tbl_asignaturas.idm = tbl_materias.idm
	WHERE nivel = 2 and tbl_usuarios.DNI = ".$DNI;
	$resultado = mysql_query($consulta);
	$cantidadefilas = mysql_num_rows($resultado); 

		echo '<table>';
		echo '<thead>';
		echo '<tr>';
		echo '<th>Materia</th>';
		echo '<th>Nota</th>';
		echo '<th>Fecha</th>';
		echo '</tr>';
		echo '<tr>';
		
	for ( $i = 0; $i < $cantidadefilas; $i++ )
	 { 
	 	
	 	$row = mysql_fetch_array ($resultado); echo'<tr br>'; 
		echo '<td>'.$row['nombrem'].'</td>';
		echo '<td>'.$row['nota'].'</td>';
		echo '<td>'.$row['fecha'].'</td>';
		echo '</tr>';
		
	}

		echo '</table>';
}


function traerNombreAlumno($DNI)
{

	$con = conectar();
	$consulta = "SELECT tbl_usuarios.nombre as nombre
	from tbl_usuarios
	WHERE nivel = 2 and tbl_usuarios.DNI = ".$DNI;

	$resultado = mysql_query($consulta);
	$row = mysql_fetch_array ($resultado);

	echo $row['nombre'];

}


function traerUltimaNota($DNI)
{

	$con = conectar();
	$consulta = "SELECT DATE_FORMAT(tbl_asignaturas.fecha, '%d/%m/%Y' )  as fecha
	from tbl_asignaturas
	inner join tbl_usuarios on tbl_asignaturas.ida = tbl_usuarios.id
	WHERE nivel = 2 and tbl_usuarios.DNI = ".$DNI."
	ORDER BY fecha DESC LIMIT 1";

	$resultado = mysql_query($consulta);
	$row = mysql_fetch_array ($resultado);

	echo $row['fecha'];

}

function traerNotasAlumnoBootStrap($DNI)
{

	$con = conectar();
	$consulta = "SELECT tbl_usuarios.nombre, tbl_usuarios.apellido, tbl_asignaturas.nota as nota, DATE_FORMAT(tbl_asignaturas.fecha,'%d/%m/%Y' ) as fecha, tbl_materias.nombre as nombrem
	from tbl_usuarios 
	inner join tbl_asignaturas on tbl_asignaturas.ida = tbl_usuarios.id
	inner join tbl_materias on tbl_asignaturas.idm = tbl_materias.idm
	WHERE nivel = 2 and tbl_usuarios.DNI = ".$DNI;
	$resultado = mysql_query($consulta);
	$cantidadefilas = mysql_num_rows($resultado); 


     echo '<table class="table table-hover">';
     echo '<thead>';
     echo '<tr>';
     echo '<th>Materia</th>';
     echo '<th>Nota</th>';
     echo '<th>Fecha</th>';
     echo '</tr>';
     echo '</thead>';
     echo '<tbody>';
     echo     '<tr>';
     //echo       '<td rowspan="2">1</td>';
     
     for ( $i = 0; $i < $cantidadefilas; $i++ )
	 { 
	 	
	 	$row = mysql_fetch_array ($resultado); echo'<tr br>'; 

	 	if($row['nota'] > 6 )
	 	{
			echo '<td class="success">'.$row['nombrem'].'</td>';
			echo '<td class="success">'.$row['nota'].'</td>';
			echo '<td class="success">'.$row['fecha'].'</td>';
			echo '</tr>';
		}
		else if($row['nota'] >= 4)
		{
			echo '<td class="warning">'.$row['nombrem'].'</td>';
			echo '<td class="warning">'.$row['nota'].'</td>';
			echo '<td class="warning">'.$row['fecha'].'</td>';
			echo '</tr>';	
		}	
		else
		{
			echo '<td class="danger">'.$row['nombrem'].'</td>';
			echo '<td class="danger">'.$row['nota'].'</td>';
			echo '<td class="danger">'.$row['fecha'].'</td>';
			echo '</tr>';	
		}
	}

	echo '</tbody>';
	echo '</table>';
}

function getCursos()
{
	$con = conectar();
	$consulta = "SELECT DISTINCT idc,nombre from tbl_cursos";
	$result = mysql_query($consulta);
    $items = array();
    if($result && 
       mysql_num_rows($result)>0) {
        while($row = mysql_fetch_array($result)) {
            $option = array("id" => $row[0], "value" => htmlentities($row[1]));
            $items[] = $option;
        }        
    }
    mysql_close();
    $data = json_encode($items);
    // Convertimos en formato JSON, luego imprimimos la data
    $response = isset($_GET['callback'])?$_GET['callback']."(".$data.")":$data;
    $cache->finish($response);   
}

function comboCursos()
{
	$con = conectar();
	//$consulta = "SELECT DISTINCT idc,nombre from tbl_cursos";
	$consulta = "SELECT DISTINCT tbl_cursos.idc, tbl_cursos.nombre,tbl_usuarios.id
	from tbl_cursos
	inner join tbl_usuarios on tbl_usuarios.id = tbl_cursos.idc";
	$resultado = mysql_query($consulta);
	$dropdown = "<option></option>";

		while($row = mysql_fetch_assoc($resultado)) 
		{
		  $dropdown .= "\r\n<option value='{$row['idc']}'>{$row['nombre']}</option>";
		}
		
		
		echo $dropdown;
}

function comboMaterias()
{
	$con = conectar();
	$consulta = "SELECT DISTINCT idm,nombre from tbl_materias";
	$resultado = mysql_query($consulta);
	$dropdown = "<option></option>";


		while($row = mysql_fetch_assoc($resultado)) 
		{
		  $dropdown .= "\r\n<option value='{$row['idm']}'>{$row['nombre']}</option>";
		}
		
		
		echo $dropdown;
}

function checkBoxMaterias()
{
	$con = conectar();
	$consulta = "SELECT DISTINCT idm,nombre from tbl_materias";
	$resultado = mysql_query($consulta);
	$cantidadefilas = mysql_num_rows($resultado); 
	$check = "";

		for ( $i = 0; $i < $cantidadefilas; $i++ ) 
		{

		  $row = mysql_fetch_array ($resultado);
		  //$check .= "<div class='checkbox'>";
		  $check .= "<label class='checkbox-inline'>";
		  $check .= "\r\n<input type='checkbox' value='{$row['idm']}'>{$row['nombre']}";
		  $check .= "</label>";
		  	
		  		if( (($i+1) % 2) == 0)
		  			$check .= "<br></br>";
		}
		echo $check;
}


function comboAlumnos()
{
	$con = conectar();
	//$id_category = $_POST['idc'];  // este es el id de los cursos
	
	/*
	$consulta = "SELECT DISTINCT tbl_cursos.idc as idc, tbl_usuarios.id, 
	CONCAT( tbl_usuarios.nombre, ' ', tbl_usuarios.apellido ) AS nombrecompleto
	FROM tbl_cursos
	INNER JOIN tbl_usuarios ON tbl_usuarios.id = tbl_cursos.idc
	WHERE tbl_cursos.idc = ".$id_category;
	*/



	$consulta = "SELECT id, CONCAT(nombre,' ',apellido) as nombrecompleto from tbl_usuarios where nivel = 2";

	$resultado = mysql_query($consulta);
	$dropdown = "<option></option>";

		while($row = mysql_fetch_assoc($resultado)) 
		{
		  $dropdown .= "\r\n<option value='{$row['id']}'>{$row['nombrecompleto']}</option>";
		}
		
		
		echo $dropdown;
}

function comboNotas()
{
	$dropdown = "<option></option>";
	$i=1;
		while($i <= 10)
		{
			$dropdown .= "\r\n<option value='{$i}'>$i</option>";
			$i++;	
		}
		
		echo $dropdown;
	
}


function insertarAlumno($nombre, $apellido,$email, $DNI, $domicilio, $ciudad, $telefono, $celular, $fnac)
{
	$con = conectar();
	$fecha = normalize_date($fnac);

	$consulta = "INSERT INTO tbl_usuarios (nombre, apellido, dni, email, nivel, ciudad, domicilio, fechanac, telefono, cel) VALUES ('$nombre','$apellido','$DNI', '$email', 2, '$ciudad', '$domicilio', '$fecha', '$telefono', '$celular' )";
	$resultado = mysql_query($consulta);

	if (!$resultado)
	{
		die('Error: ' . mysqli_error($con));
	}
		

	$id = mysql_insert_id();
	
	return $id;	

}


function insertarAlumnoAsignatura($ida, $idm)
{
	$con = conectar();
	$consulta = "INSERT INTO tbl_asignaturas (idm,ida) VALUES ('$idm','$ida')";
	$resultado = mysql_query($consulta);

	if (!$resultado)
	{
		die('Error: ' . mysqli_error($con));
	}
		echo "1 record added";

}

function insertarCursoAlumno($ida, $idc)
{
	$con = conectar();
	$consulta = "INSERT INTO cursos_alumnos (idu,idc) VALUES ('$ida','$idc')";
	$resultado = mysql_query($consulta);

	if (!$resultado)
	{
		die('Error: ' . mysqli_error($con));
	}
		echo "1 record added";

}





function insertarAlumnoMaterias($ida, $idm)
{
	$con = conectar();
	$consulta = "INSERT INTO tbl_alumnos_materias (idalumno,idmateria) VALUES ('$ida','$idm')";
	$resultado = mysql_query($consulta);

	if (!$resultado)
	{
		die('Error: ' . mysqli_error($con));
	}
		echo "1 record added";

}


function insertarNota($curso, $materia, $alumno, $nota, $fecha)
{
	$con = conectar();
	
	$fecha = normalize_date($fecha);

	$consulta = "INSERT INTO tbl_asignaturas (idc, idm, ida, nota, fecha) VALUES ('$curso', '$materia',' $alumno', '$nota', '$fecha')";
	$resultado = mysql_query($consulta);


	echo $consulta;

	if (!$resultado)
	{
		die('Error: ' . mysqli_error($con));
	}
		echo "1 record added";


}

function normalize_date($date)
{
		 if(!empty($date)){
			 $var = explode('/',str_replace('-','/',$date));
			 return "$var[2]/$var[1]/$var[0]";
		 }
}


?>