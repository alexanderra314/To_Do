<?php

require_once('config.php');


$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB);


if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}


$username = $_POST['username'];
$password = $_POST['Password'];



$sql = "SELECT * FROM usuarios WHERE email='$username' AND pass='$password'";
$result = $conn->query($sql);

// Verifica si hay algún resultado
if ($result->num_rows > 0) {
  // Inicio de sesión exitoso
  session_start();
  $_SESSION['email'] = $username;
  $response['success'] = true;
} else {
  // Inicio de sesión fallido
  $response['success'] = false;
}


print_r(json_encode($response));

// Cierra la conexión a la base de datos
$conn->close();
?>
