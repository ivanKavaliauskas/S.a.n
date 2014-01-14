<html>
<head>
<meta charset="utf-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="description">
<meta content="" name="author">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/signin.css">
<title>SAN || Sistema de asistencias y notas</title>
</head>
<body>

<div class="container">
	<form class="form-signin"  method="post" action="acceso.php">	
		<h2 class="form-signin-heading">Inicie sesion</h2>
		<input type="text" class="form-control" placeholder="DNI" name="user" required autofocus>
		<input type="password" class="form-control" placeholder="Password" name="pass" required>
		 <label class="checkbox">
		          <input type="checkbox" value="remember-me"> Recordar
		        </label>
		        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Ok</button>
	</form>
</div>

</body>
</html>