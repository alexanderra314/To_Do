<?php

require_once('config.php');


$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB);


if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}


$username = $_POST['username'];
$password = $_POST['Password'];



$sql = "SELECT * FROM usuario WHERE email='$username' AND pass='$password'";
$result = $conn->query($sql);

// Verifica si hay algún resultado
if ($result->num_rows > 0) {
  // // Inicio de sesión exitoso
  // print_r($result);
  // exit;
  session_start();
  $row = $result->fetch_assoc();
  // Mostrar los datos del usuario
  $_SESSION['email'] = $username;
  $_SESSION['Nombres'] = $row['Nombres'];
  $_SESSION['Apellidos'] = $row['Apellidos'];
  $_SESSION['usuario_id'] = $row['usuario_id'];
  $response['success'] = true;
} else {
  // Inicio de sesión fallido
  $response['success'] = false;
}


print_r(json_encode($response));

// Cierra la conexión a la base de datos
$conn->close();
?>
