
<?php 
include_once('funciones.php');
session_start();
$dni = $_SESSION['DNI'];
?>

<!-- Begin page content -->
       <div class="container">
        <div class="page-header">
          <h1>Hola, <?php traerNombreAlumno($dni);?> !</h1>
        </div>
        <p class="lead">
		<small>Ultimo Examen : <?php traerUltimaNota($dni);?> </small>
        	<?php traerNotasAlumnoBootStrap($dni);?>
    </p>
      </div>
    
    </div>


