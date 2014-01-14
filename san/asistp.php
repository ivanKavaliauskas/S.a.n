
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
	        $.post( "traer_alumnos.php", { elegido: elegido }, function(data){
	        $("#alumnos").html(data);
	       
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


<script type="text/javascript">

</script>

<div class="container">


 <form class="form-horizontal" role="form"  name="f1" method="post" action="aln.php">
		


		<div class="form-group">
		  <label for="Fecha" class="col-sm-2 control-label">Fecha de hoy</label>
		  <div class="col-sm-4">
			<p>  <?php echo date('d/m/Y');?> </p>
			</div>
		  </div>


		<div class="form-group">
		    <label for="inputCursos" class="col-sm-2 control-label">Cursos</label>
		    <div class="col-sm-4">
			    <select class="combobox" name="cursos" id="cursos">
			 	<?php comboCursos();?>
				</select>
			</div>
		  </div>


		   
		    <div class="form-group">
		    <label for="Alumnos" class="col-sm-2 control-label"></label>
		    <div class="col-sm-4">
			    <div id="alumnos">
			</div>
		  </div>
		</div>


		   <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">	
		    	<a href="javascript:seleccionar_todo()">Seleccionar todos</a> | 
				<a href="javascript:deseleccionar_todo()">Deseleccionar todos</a> 
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
