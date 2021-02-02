$('#login').click(function () {

  // Traemos los datos de los inputs
  var nombre = $('#nombre').val();
  var imagen = $('#imagen').val();
  var archivo = $('#archivo').val();


  // Envio de datos mediante Ajax
  $.ajax({
    type: 'POST',
    // Recuerda que la ruta se hace como si estuvieramos en el index y no en operaciones por esa razon no utilizamos ../ para ir a controller
    url: 'lib/crear.php',
    // Recuerda el primer parametro es la variable de php y el segundo es el dato que enviamos
    data: { nombre: nombre, imagen: imagen, archivo: archivo },
    // Esta funcion se ejecuta antes de enviar la información al archivo indicado en el parametro url
    beforeSend: function () {
      // Mostramos el div con el id load mientras se espera una respuesta del servidor (el archivo solicitado en el parametro url)
      /* $('#load').show(); */
      
    },
    // el parametro res es la respuesta que da php mediante impresion de pantalla (echo)
    success: function (res) {
      // Lo primero es ocultar el load, ya que recibimos la respuesta del servidor
      /* $('#load').hide(); */

      alert(res);
      if (res == 'error_0') {
        swal('Error', 'los campos son obligatorios', 'error');
      }else{
        swal('Buen trabajo', 'Datos ok' + res, 'success');
      }







    }
  });


});