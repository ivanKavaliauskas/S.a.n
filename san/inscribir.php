
<?php 
include_once('funciones.php');
session_start();
$dni = $_SESSION['DNI'];

?>

<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
	  // Parametros para el combo
	   $("#cursos").change(function () {
	      $("#cursos option:selected").each(function () {
	        elegido=$(this).val();
	        //alert(elegido);
	        $.post( "combo_materias.php", { elegido: elegido }, function(data){
	        $("#materias").html(data);

	     });
	   });    
	});
	});   


function seleccionar_todo(){
	for (i=0;i<document.f1.elements.length;i++)
		if(document.f1.elements[i].type == "checkbox")	
			document.f1.elements[i].checked=1
}

function deseleccionar_todo(){
	for (i=0;i<document.f1.elements.length;i++)
		if(document.f1.elements[i].type == "checkbox")	
			document.f1.elements[i].checked=0
}

</script>
    
<!-- Begin page content -->
       <div class="container">

	       	
		 <form class="form-horizontal" role="form" name="f1" method="post" action="alc.php">
		


		<div class="form-group">
		    <label for="inputAlumnos" class="col-sm-2 control-label">Alumno</label>
		    <div class="col-sm-4">
			    <select class="combobox" name="alumnos">
			 	<?php comboAlumnos();?>
				</select>
			</div>
		  </div>


		   <div class="form-group">
		    <label for="inputCursos" class="col-sm-2 control-label">Curso</label>
		    <div class="col-sm-4">
			    <select class="combobox" name="cursos" id="cursos">
			 	<?php comboCursos();?>
				</select>
			</div>
		  </div>


		    <div class="form-group">
		    <label for="inputMaterias" class="col-sm-2 control-label"></label>
		    <div class="col-sm-4">
			    <div id="materias">
			</div>
		  </div>


		   <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">	
		    	<a href="javascript:seleccionar_todo()">Seleccionar todas</a> | 
				<a href="javascript:deseleccionar_todo()">Deseleccionar todas</a> 
				</div>
		  </div>


		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Ok</button>
		    </div>
		  </div>


		</form>

    


 	</div><!-- end div container -->
    
    </div>
</div>


