<?php
session_start();
// Incluye el archivo de configuración de la base de datos
require_once '../config/config.php';

// Establece la conexión con la base de datos
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB);

// Verifica si hay errores en la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

    $name = $_POST['nombre'];
    $usuario_id = $_SESSION['usuario_id'];

    // Prepara la consulta SQL
    $sql = "INSERT INTO tarea(id, nombre, estado_tareas_id, usuario_id, fecha_crea,estado) VALUES ('','$name',1,$usuario_id,NOW(),1)";
    if ($conn->query($sql) === TRUE) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
    }

    print_r(json_encode($response));

    // Cierra la conexión a la base de datos
    $conn->close();
?>
