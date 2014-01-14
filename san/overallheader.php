<?php 
include_once('funciones.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-combobox.css">
	<link rel="stylesheet" href="css/sticky-footer.css">
	<link rel="stylesheet" href="css/carousel.css">
	<title>SAN || Sistema de asistencias y notas</title>
	
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
	<script src="js/ui.datepicker-es-MX.js"></script>
	<script src="js/bootstrap-combobox.js"></script>
	<script src="js/bootstrap-carousel.js"></script>
	<script>
	  $(function() {
	    $.datepicker.setDefaults($.datepicker.regional['es-MX']);
	    $('#fecha').datepicker({
	                        'setDate': '25/02/2013'
	                        , altField: '#fecha_texto'
	                        , altFormat: "DD, d 'de' MM 'de' yy"
	                    });
	  });
	  </script>

	  <script type="text/javascript">
  $(document).ready(function(){
    $('.combobox').combobox();
      $('.carousel').carousel();
  });
</script>
</head>
