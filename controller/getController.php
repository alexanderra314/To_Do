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
    $htmlTabla = '';
    if ($result->num_rows > 0) { 
        // print_r($result);
        while ($row = $result->fetch_assoc()) {
            $estado = '';
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
            $htmlTabla .= '<tr>';
            $htmlTabla .= '<td>' . $row['id'] . '</td>';
            $htmlTabla .= '<td>' . $row['nombre'] . '</td>';
            $htmlTabla .= '<td>' . $row['fecha_crea'] . '</td>';
            $htmlTabla .= '<td>' . $estado . '</td>';
            $htmlTabla .= '<td>';
            $htmlTabla .= '<button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar(' . $row['id'] . ')">Eliminar</button>';
            $htmlTabla .= '</td>';
            $htmlTabla .= '<td>';
            if ($row['estado_tareas_id'] == 1) {
                $htmlTabla .= '<select class="form-select form-select-lg mb-3" aria-label="Large select example" name ="select_datos' . $row['id'] . '"  id="select_datos' . $row['id'] . '">';
                $htmlTabla .= '<option value="1" selected>Pendiente</option>';
                $htmlTabla .= '<option value="2">Realizada</option>';
                $htmlTabla .= '<option value="3">Cancelada</option>';
                $htmlTabla .= '</select> ';
                $htmlTabla .= ' <button type="button" class="btn btn-outline-info btn-sm" onclick="update(' . $row['id'] . ')"> Confirmar </button>';
            }
            $htmlTabla .= '</td>';
            
            $htmlTabla .= '</tr>';
        }
    $response['htmlTabla'] = $htmlTabla;
    $response['success'] = true;
    }
    print_r(json_encode($response));
    $conn->close(); 
?>