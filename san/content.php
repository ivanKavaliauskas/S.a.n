<!-- Content -->

    <?php
    
	$page = $_GET['page'];

	$pages = array('altaalumno', 'altanota', 'vercursos','notaalumno','logout','inscribir','asistp');
	if (!empty($page)) {
		if(in_array($page,$pages)) {
			$page .= '.php';
			include($page);

		}
		else {
		echo 'Page not found. Return to
		<a href="index.php">index</a>';
		}
	}
	else {
		include('bienvenido.php');
	}
?>



  
