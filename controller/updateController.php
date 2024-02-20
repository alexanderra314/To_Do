<?php
require_once '../config/config.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$id = $_POST['id_tarea'];
$nuevo_valor = $_POST['select'];


$sql = "UPDATE tarea SET estado_tareas_id = ? WHERE id = ?";


$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error al preparar la sentencia: " . $conn->error);
}


$stmt->bind_param("si", $nuevo_valor, $id);

if ($stmt->execute() === true) {
    $response['success'] = true;
} else {
    $response['success'] = false;
}
print_r(json_encode($response));

$stmt->close();
$conn->close();
?>
