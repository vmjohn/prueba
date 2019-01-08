
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Debes iniciar sesion primero";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" type= "text/css" href="estilos.css">
</head>
<body>
	<header>
		<div class="wrapp">
			<div class="logo">
				<a href="#"><img src="img/gym.jpg" alt="GYM FITNESS CENTER"></a>
			</div>
			<nav>
				<ul>
					<li><h1>Bienvenido  <strong><?php echo $_SESSION['username']; ?></strong></h1></li>
					<li><a href="index.php">Inicio</a></li>
					<li><a href="rutinas.php">Rutinas</a></li>
					<li><a href="index.php?logout='1'">Salir</a></li>
					
				</ul>
			</nav>
		</div>
	</header>
	<section class="main">
		<div class="wrapp">


<div class="content">
  	<!-- Mensaje de notificacion -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

</div>



<img class= "fondo" src="img/fondo.jpg">


	<div> 
		<a href="https://www.facebook.com"><img class="redes" src="img/fb.png"></a>
		<a href="https://www.gmail.com"><img class="redes" src="img/gmail.png"></a>
		<a href="https://www.youtube.com"><img class="redes" src="img/youtube.png"></a>
		<a href="https://www.instagram.com"><img class="redes" src="img/instagram.jpg"></a>
	</div>

</div>
</section>
	<footer>
		<div class="wrapp">
			<p>GymFitnessCenter.com</p>
		</div>
	</footer>
		
</body>
</html>