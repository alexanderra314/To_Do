//    Inicializa DataTables
   $(document).ready( function () {
    // $('#tabla-datos').DataTable();
  });


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

function crear() {
    var nombre = $("#nombre_tarea").val();
    // Realiza una solicitud AJAX utilizando jQuery
    $.ajax({
        url: '../controller/CrearController.php', 
        type: 'POST', 
        data: { nombre: nombre }, 
        dataType: 'json', 
        success: function(response) {
            console.log(response);
            if (response.success) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Se Inserto Con Exito",
                    showConfirmButton: false,
                    timer: 1500
                  });

                  $('#modal_crear input[type="text"]').val('');
                  $('#modal_crear').modal('hide');
               
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "No se Inserto la Informacion",
                    // footer: '<a href="#">Why do I have this issue?</a>'
                  });
                  $('#modal_crear input[type="text"]').val('');
                  $('#modal_crear').modal('hide');
              
            }
        },
        error: function(xhr, status, error) {
            // Función que se ejecuta si hay un error en la solicitud
            // console.error('Error en la solicitud:', error);
            // Aquí puedes manejar el error de alguna manera
        }
    });
  }
  


function mostrarModal() {
    $('#modal_crear').modal('show');
}
  
  

function cerrarModal() {
     console.log("Mostrar modal");
     $('#modal_crear input[type="text"]').val('');
     $('#modal_crear').modal('hide');
}
  

  