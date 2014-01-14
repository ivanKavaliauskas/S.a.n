<?php ?>

<html lang="en">
<head>
    <title>Ejemplo de ajax</title>
    
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
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
    
</head>
<body>
<p>
   Ejemplo utilizando ajax: Da click sobre el link para cargar una tabla sin cambiar de pagina.
</p>

   <div>
    <a href="#" onclick="cargar();">Ver tabla de alumnos</a>
   </div>
   <div id="tabla">
    
   </div>
</body>
</html>