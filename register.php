<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registro</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Registro</h2>
  </div>
	
  <form method="post" action="register.php">
	<!-- Aqui se muestran los errores de validaciones -->
  	<?php include('errors.php'); ?>

  	<div class="input-group">
  	  <label>Usuario</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Correo</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Contraseña</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirmar contraseña</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">

		<a><input type="submit" style="margin: 10px" class="btn" name="reg_user" value="Registrarse"></a>
			<a href="login.php"><input type ="button" style="margin: 10px" class="btn" value="Iniciar Sesion"></a>
			
  	</div>
		
  	
  </form>
</body>
</html>