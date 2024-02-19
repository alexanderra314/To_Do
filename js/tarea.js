//    // Inicializa DataTables
//    $(document).ready( function () {
//     $('#tabla-datos').DataTable();
//   });


function logueo() {
  var Email = $("#email").val();
  var Pass = $("#pass").val();
  // Realiza una solicitud AJAX utilizando jQuery
  $.ajax({
      url: 'config/control.php', 
      type: 'POST', 
      data: { username: Email, Password: Pass }, 
      dataType: 'json', 
      success: function(response) {
          // Función que se ejecuta si la solicitud se realiza correctamente
          console.log('Solicitud exitosa');
          console.log('Respuesta del servidor:', response);
          // Verifica si la respuesta indica éxito
          if (response.success) {
              // Redirige al usuario a tarea.php si la autenticación es exitosa
              window.location.href = 'view/tarea.php';
          } else {
              // Si la autenticación no es exitosa, puedes mostrar un mensaje de error al usuario
            
          }
      },
      error: function(xhr, status, error) {
          // Función que se ejecuta si hay un error en la solicitud
          // console.error('Error en la solicitud:', error);
          // Aquí puedes manejar el error de alguna manera
      }
  });
}