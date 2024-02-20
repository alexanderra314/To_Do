<?php

// Incluye el archivo de configuración de la base de datos
require_once '../config/config.php';

// Establece la conexión con la base de datos
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB);

// Verifica si hay errores en la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

    $name = $_POST['nombre'];

    // Prepara la consulta SQL
    $sql = "INSERT INTO tarea(id, Nombre, estado_id, Fecha_crea) VALUES ('','$name',1,NOW())";
    if ($conn->query($sql) === TRUE) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
    }

    print_r(json_encode($response));

    // Cierra la conexión a la base de datos
    $conn->close();
?>
