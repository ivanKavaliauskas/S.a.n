
<?php 
include_once('funciones.php');
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
	        $.post("combo_alumnos.php", { elegido: elegido }, function(data){
	        $("#alumnos").html(data);
	       

	      });     
	     });
	   });    
	});
	});   
</script>


<script type="text/javascript">

</script>

<div class="container">


 <form class="form-horizontal" role="form"  method="post" action="aln.php">
		


		<div class="form-group">
		    <label for="inputCursos" class="col-sm-2 control-label">Cursos</label>
		    <div class="col-sm-4">
			    <select class="combobox" name="cursos" id="cursos">
			 	<?php comboCursos();?>
				</select>
			</div>
		  </div>


		   <div class="form-group">
		    <label for="inputMaterias" class="col-sm-2 control-label">Materias</label>
		    <div class="col-sm-4">
			    <select class="combobox" name="materias" id="materias">
			 	<?php comboMaterias();?>
				</select>
			</div>
		  </div>


		   <div class="form-group">
		    <label for="inputAlumnos" class="col-sm-2 control-label">Alumnos</label>
		    <div class="col-sm-4">
			    <select class="combobox" name="alumnos" id="alumnos">
			 	<?php comboAlumnos();?>
				</select>
			</div>
		  </div>


		   <div class="form-group">
				    <label for="inputNotas" class="col-sm-2 control-label">Nota</label>
				    <div class="col-sm-4">
					    <select class="combobox" name="notas">
					 	<?php comboNotas();?>
						</select>
					</div>
				  </div>


			<div class="form-group">
			    <label for="inputFecha" class="col-sm-2 control-label">Fecha</label>
			    <div class="col-sm-4">
			      <input type="nombre" name="fecha" class="form-control" id="fecha" placeholder="" required>
			    </div>
		  </div>
		  
		  <div class="form-group">
			    <label for="inputFechae" class="col-sm-2 control-label"></label>
			    <div class="col-sm-4">
			      <input type="fechae" name="fechae" class="form-control" id="fecha_texto" placeholder="" required>
			    </div>
		  </div>  
		  


		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Ok</button>
		    </div>
		  </div>


		</form>
	</div>
</div>
