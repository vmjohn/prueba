<?php
session_start();

// inicializacion de variables
$username = "";
$email    = "";
$errors = array(); 

// coneccion a la base de datos
$db = mysqli_connect('localhost', 'root', '', 'registration');

// Registro de usuario
if (isset($_POST['reg_user'])) {
  // recibir todos los valores de entrada desde el formulario
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // Asegurarse de que los campos de los formulario esten llenos
  if (empty($username)) { 
    array_push($errors, "Ingrese el usuario"); }
  if (empty($email)) { 
    array_push($errors, "Ingrese el correo"); }
  if (empty($password_1)) { 
    array_push($errors, "Ingrese la contraseña"); }
  if ($password_1 != $password_2) {
	  array_push($errors, "Las dos contraseñas no coinciden");
  }

  // primero revisa la base de datos para asegurarse 
  // si un usuario no existe con el mismo nombre de usuario y / o correo electrónico
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // si el usuario existe
    if ($user['username'] === $username) {
      array_push($errors, "El nombre de usuario ya existe");
    }

    if ($user['email'] === $email) {
      array_push($errors, "El correo ya existe");
    }
  }

  // Si no hay errores guarde el usuario en la base de datos
  if (count($errors) == 0) {
  	$password = md5($password_1);//Cifrar la contraseña antes de almacenarla en la base de datos

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "";
  	header('location: index.php');
  }
}

// Usuario de inicio de sesion
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    //Asegurarse que los campos de los formulario esten llenos
    if (empty($username)) {
        array_push($errors, "Usuario requerido");
    }
    if (empty($password)) {
        array_push($errors, "Contraseña requerida");
    }
  
    //Cifrar la contraseña antes de compararla con la db
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['seccess'] = "";
          header('location: index.php');
        }else {
            array_push($errors, "
            Combinación incorrecta de nombre de usuario / contraseña");
        }
    }
  }
  
  ?>