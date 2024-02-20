<?php
session_start();

require_once '../config/config.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
    $response['success'] = false;
    $usuario_id = $_SESSION['usuario_id'];
    $sql = "SELECT * FROM tarea where usuario_id = $usuario_id AND estado = 1";
    $result = $conn->query($sql);
    $datos =[];
    $csv = '';
    if ($result->num_rows > 0) {  
        while ($row = $result->fetch_assoc()) {
            switch ($row['estado_tareas_id']) {
                case 1:
                    $estado = 'Pendiente';
                    break;
                case 2:
                    $estado = 'Realizada';
                    break;
                case 3:
                    $estado = 'Cancelada';
                    break;
                default:
                    $estado = 'Desconocido';
                    break;
            }
            $csv = $row['id'].','.$row['nombre'].','.$estado.','.$row['fecha_crea'];
            $response['datos'][] = $csv;
    }
        $response['success'] = true;
    }
    print_r(json_encode($response));
    $conn->close(); 
?>