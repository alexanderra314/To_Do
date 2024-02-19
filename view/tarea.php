<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Incluye CSS de DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>
<body>
  <h2>Bienvenido, <?php echo $_SESSION['username']; ?></h2>
  
  <div>
    <table id="tabla-datos">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <!-- Agrega aquí más columnas según tu estructura de datos -->
        </tr>
      </thead>
      <tbody>
        <?php
        // Aquí iría tu código PHP para obtener y mostrar los datos de la tabla
        // Ejemplo:
        // while ($row = $result->fetch_assoc()) {
        //   echo "<tr>";
        //   echo "<td>" . $row['id'] . "</td>";
        //   echo "<td>" . $row['nombre'] . "</td>";
        //   echo "<td>" . $row['descripcion'] . "</td>";
        //   // Agrega aquí más columnas según tu estructura de datos
        //   echo "</tr>";
        // }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Incluye jQuery (necesario para DataTables) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Incluye DataTables JS -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


</body>
</html>
