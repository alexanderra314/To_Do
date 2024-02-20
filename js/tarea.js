// //    Inicializa DataTables
   $(document).ready( function () {
    let table = new DataTable('#tabla-datos');
    getdata();
  });


function logueo() {
  var Email = $("#email").val();
  var Pass = $("#pass").val();
  $.ajax({
      url: 'config/control.php', 
      type: 'POST', 
      data: { username: Email, Password: Pass }, 
      dataType: 'json', 
      success: function(response) {
        
          console.log('Solicitud exitosa');
          console.log('Respuesta del servidor:', response);
         
          if (response.success) {
              
              window.location.href = 'view/tarea.php';
          } else {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error de logueo",
              });
            
          }
      },
      error: function(xhr, status, error) {
            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "email y/o Contraseña incorrectos",
          });
      }
  });
}

function crear() {
    var nombre = $("#nombre_tarea").val();
    
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
                    title: "Se Inserto Con Exito los Datos",
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
                  });
                  $('#modal_crear input[type="text"]').val('');
                  $('#modal_crear').modal('hide');
              
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error Comuniquese con el admin",
              });
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
  

function getdata() { 
    $.ajax({
        url: '../controller/getController.php', 
        type: 'POST', 
        data: {}, 
        dataType: 'json', 
        success: function(response) {          
            if (response.success) {
                $('#body_datos').html(response.htmlTabla);
            } else {
              Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Error de logueo",
                });
              
            }
        },
        error: function(xhr, status, error) {
              Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "email y/o Contraseña incorrectos",
            });
        }
    });
  }