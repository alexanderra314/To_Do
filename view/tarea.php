<?php
session_start(); // Iniciar la sesión
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Incluye CSS de DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/css.css">
</head>
<body>
  <h2>Bienvenido, <?php echo $_SESSION['Nombres'].' '. $_SESSION['Apellidos'].''; ?></h2>
  <div>

<div class="btn-group" role="group" aria-label="Basic example" id="bton">
  <button type="button" class="btn btn-primary" id="botonModal" onclick="mostrarModal();">Crear</button>
  <!-- <button type="button" class="btn btn-success">Actualizar</button> -->
  <!-- <button type="button" class="btn btn-primary">Right</button> -->
</div>
    <table id="tabla-datos" class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Fecha_Creacion</th>
          <th scope="col">Estado</th>
          <th scope="col">Accion</th>
          <th scope="col">Actualizar</th>
          <!-- Agrega aquí más columnas según tu estructura de datos -->
        </tr>
      </thead>
      <tbody id='body_datos'> 
      </tbody>
    </table>
  </div>
<!-- MODAL -->
  <div class="modal fade" id="modal_crear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="miModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Tarea</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="nombre_tarea" class="col-form-label">Nombre de la tarea:</label>
            <input type="text" class="form-control" id="nombre_tarea">
          </div>
          <!-- <div class="mb-3">
            <label for="message-text" class="col-form-label">Descripcion de la tarea:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div> -->
        </form>
      </div>
      <div id="miModalcerrae" class="modal">
        <div class="modal-contenido">
            <span class="cerrar" onclick="cerrarModal()">&times;</span>
            <p>Contenido del modal...</p>
        </div>
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  onclick="cerrarModal()">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="crear();">Crear</button>
      </div>
    </div>
  </div>
</div>

  <!-- Incluye Bootstrap JS (opcional) -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
  <script src="https://cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../js/tarea.js"></script>

  

</body>
</html>
