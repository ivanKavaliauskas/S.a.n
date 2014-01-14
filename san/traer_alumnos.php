
<?php
include('configuracion.php');
include('conectar.php');

	$con = conectar();
	

	$id_category = $_POST['elegido'];  // este es el id de los cursos
	

	
	if (!empty($id_category)) {

	$consulta = "SELECT DISTINCT cursos_alumnos.idu as idu, tbl_usuarios.nombre as nombre, tbl_usuarios.apellido as apellido
	FROM cursos_alumnos
	INNER JOIN tbl_usuarios ON cursos_alumnos.idu = tbl_usuarios.id
	WHERE cursos_alumnos.idc = ".$id_category;



	//$consulta = "SELECT CONCAT(nombre,' ',apellido) as nombrecompleto from tbl_usuarios where nivel = 2";

	$resultado = mysql_query($consulta);
	$dropdown = "";

	$cantidadefilas = mysql_num_rows($resultado); 


    echo '<table class="table table-hover">';
     echo '<thead>';
     echo '<tr>';
     echo '<th>Alumnos</th>';
    
     echo '</tr>';
     echo '</thead>';
     echo '<tbody>';
     echo     '<tr>';
     //echo       '<td rowspan="2">1</td>';
     
     for ( $i = 0; $i < $cantidadefilas; $i++ )
	 { 
	 	
	 	$row = mysql_fetch_array ($resultado); echo'<tr br>'; 

			echo '<td class="active">'.$row['nombre'].'</td>';
			echo '<td class="active">'.$row['apellido'].'</td>';
			echo '<td class="active"><input type="checkbox" name="asistencias[]" value='.$row['idu'].'> Presente</td>';
			echo '</tr>';
	}

	echo '</tbody>';
	echo '</table>';
}