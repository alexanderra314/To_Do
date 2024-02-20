
   $(document).ready( function () {
    // var table = new DataTable('#tabla-datos');
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
                  getdata();
               
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
                // $('#tabla-datos').DataTable().ajax.reload();
            } else {
              Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "No se encontro información",
                });

                $('#body_datos').html('');
              
            }
        },
        error: function(xhr, status, error) {
              Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Error, Comuniquese con el admin",
            });
        }
    });
}

function update($id_tarea) {

  var valorSeleccionado = $('#select_datos'+ $id_tarea).val(); 

  $.ajax({
    url: '../controller/updateController.php', 
    type: 'POST', 
    data: { id_tarea: $id_tarea, select: valorSeleccionado }, 
    dataType: 'json', 
    success: function(response) {
        console.log(response);
        if (response.success) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Se actualizo correctamente",
                showConfirmButton: false,
                timer: 1500
              });
              getdata();
        } else {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "No se actulizo la Informacion",
              });
              $('#modal_crear input[type="text"]').val('');
              $('#modal_crear').modal('hide');
          
        }
    },
    error: function(xhr, status, error) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Error, Comuniquese con el admin",
          });
    }
});
}

function eliminar($id_tarea) {

  $.ajax({
    url: '../controller/deleteController.php', 
    type: 'POST', 
    data: { id_tarea: $id_tarea, estado: 0 }, 
    dataType: 'json', 
    success: function(response) {
        console.log(response);
        if (response.success) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Se Elimino correctamente",
                showConfirmButton: false,
                timer: 1500
              });
             
        } else {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "No se Elimino la Informacion",
              });
              $('#modal_crear input[type="text"]').val('');
              $('#modal_crear').modal('hide');
          
        }
    },
    error: function(xhr, status, error) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Error, Comuniquese con el admin",
          });
    },
    complete : function(xhr, status) {
      getdata();
  }

});
}

function cerrar_sesion() {
  window.location.href = '../index.php';
}

function exportar() {
  $.ajax({
    url: '../controller/exportarController.php', 
    type: 'POST', 
    data: { }, 
    dataType: 'json', 
    success: function(response) { 
        if (response.success) { 
          var datos = response.datos; 
           descargarCSV(datos);       
        } else {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "No hay Datos para exportar",
              });
              $('#modal_crear input[type="text"]').val('');
              $('#modal_crear').modal('hide');
          
        }
    },
    error: function(xhr, status, error) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Error, Comuniquese con el admin",
          });
    },
    complete : function(xhr, status) {
      getdata();
  }

});
  
}
function descargarCSV(response) {
 var csv = 'ID,Nombre,Estado,Fecha\n';  
response.forEach(element => {
  csv +=element+'\n';
});
 
  var blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
  var enlace = document.createElement('a');
  var url = URL.createObjectURL(blob);
  enlace.setAttribute('href', url);
  enlace.setAttribute('download', 'datos.csv');
  document.body.appendChild(enlace);
  enlace.click(); 
  document.body.removeChild(enlace);
  URL.revokeObjectURL(url);
}
