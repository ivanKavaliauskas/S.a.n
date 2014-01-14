<?php 
include_once ('funciones.php');
?>

 <script> 
        function cargar(){
            var url="tabla.php"
            $.ajax({   
                type: "POST",
                url:url,
                data:{},
                success: function(datos){       
                    $('#tabla').html(datos);
                }
            });
        }
     </script>
    
<!-- Begin page content -->
       <div class="container">

	       	
		 <form class="form-horizontal" role="form"  method="post" action="alu.php">
		  
		  <div class="form-group">
		    <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
		    <div class="col-sm-4">
		      <input type="nombre" name="nombre" class="form-control" id="inputNombre" placeholder="" required>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label for="inputApellido" class="col-sm-2 control-label">Apellido</label>
		    <div class="col-sm-4">
		      <input type="apellido" name="apellido" class="form-control" id="inputNombre" placeholder="" required>
		    </div>
		  </div>

		 <div class="form-group">
		    <label for="inputDNI" class="col-sm-2 control-label">DNI</label>
		    <div class="col-sm-4">
		      <input type="dni" name="DNI" class="form-control" id="inputDNI" placeholder="" required>
		    </div>
		  </div>

		 <div class="form-group">
			<label for="inputDNI" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-4">
			<input type="email" name="email" class="form-control" id="inputEmail" placeholder="" required>
			 </div>
		</div>


		 <div class="form-group">
		    <label for="inputApellido" class="col-sm-2 control-label">Domicilio</label>
		    <div class="col-sm-4">
		      <input type="domicilio" name="domicilio" class="form-control" id="inputDomicilio" placeholder="" required>
		    </div>
		  </div>

		 <div class="form-group">
		    <label for="inputDNI" class="col-sm-2 control-label">Ciudad</label>
		    <div class="col-sm-4">
		      <input type="ciudad" name="ciudad" class="form-control" id="inputCiudad" placeholder="" required>
		    </div>
		  </div>

		 <div class="form-group">
			<label for="inputDNI" class="col-sm-2 control-label">Telefono</label>
			<div class="col-sm-4">
			<input type="telefono" name="telefono" class="form-control" id="inputTelefono" placeholder="" required>
			 </div>
		</div>


		 <div class="form-group">
			<label for="inputDNI" class="col-sm-2 control-label">Celular</label>
			<div class="col-sm-4">
				<input type="celular" name="celular" class="form-control" id="inputCelular" placeholder="" required>
			 </div>
				</div>

		<div class="form-group">
			<label for="inputDNI" class="col-sm-2 control-label">Fecha de Nacimiento</label>
			<div class="col-sm-4">
			<input type="fnac" name="fnac"  class="form-control" id="inputfnac" placeholder="" required>
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



