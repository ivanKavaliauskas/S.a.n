
<?php
include('configuracion.php');
include('conectar.php');

	$con = conectar();
	

	$id_category = $_POST['elegido'];  // este es el id de los cursos
	

	
	if (!empty($id_category)) {

	$consulta = "SELECT DISTINCT tbl_cursos_materias.idm as idm, tbl_materias.nombre as nombre
	FROM tbl_cursos_materias
	INNER JOIN tbl_materias ON tbl_cursos_materias.idm = tbl_materias.idm
	WHERE tbl_cursos_materias.idc = ".$id_category;

	//$consulta = "SELECT CONCAT(nombre,' ',apellido) as nombrecompleto from tbl_usuarios where nivel = 2";

	$resultado = mysql_query($consulta);
	$dropdown = "";

	$cantidadefilas = mysql_num_rows($resultado); 


    echo '<table class="table table-hover">';
     echo '<thead>';
     echo '<tr>';
     echo '<th>Materia</th>';
    
     echo '</tr>';
     echo '</thead>';
     echo '<tbody>';
     echo     '<tr>';
     //echo       '<td rowspan="2">1</td>';
     
     for ( $i = 0; $i < $cantidadefilas; $i++ )
	 { 
	 	
	 	$row = mysql_fetch_array ($resultado); echo'<tr br>'; 

			echo '<td class="active">'.$row['nombre'].'</td>';
			echo '<td class="active"><input type="checkbox" name="inscribir[]" value='.$row['idm'].'> Inscribir</td>';
			echo '</tr>';
	}

	echo '</tbody>';
	echo '</table>';
}