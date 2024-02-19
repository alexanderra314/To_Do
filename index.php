<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TO_Do</title>
  <!-- Incluye Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Interfaz de Usuario</h1>
    <p></p>
    <div class="row">
      <div class="col-md-6">
        <form>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Ingresa tu email">
            </div>
          <div class="form-group">
            <label for="pass">Password:</label>
            <input type="text" class="form-control" id="pass" placeholder="Ingresa tu Contraseña">
          </div>
          <a class="btn btn-success" onclick="logueo();">Enviar <i class="fa fa-save"></i></a>
        </form>
      </div>
    </div>
  </div>
  
  <!-- Incluye Bootstrap JS (opcional) -->
  <script src="../To_Do/js/tarea.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
