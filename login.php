<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Iniciar sesion</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Iniciar sesion</h2>
  </div>
	 
  <form method="post" action="login.php">
  
  <?php include('errors.php'); ?> 
  	<div class="input-group">
  		<label>Usuario</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Contraseña</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
			<a><input type="submit" style="margin: 10px" class="btn" name="login_user" value="Iniciar Sesion">	
			<a href="register.php"><input type ="button" style="margin: 10px" class="btn" value="Registrarse"></a>
  	</div>
  </form>
</body>
</html>