<?php
//error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
//header('Content-type: text/html; charset=ISO-8859-1');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="bootstrap/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

</head>

<style>
.abs-center {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 20vh;
}

.form {
    width: 450px;
}

.abs-center-img {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 1vh;
}

.imagen {
    width: 150px;
}
</style>


<body>
    <!--     <div class="container">
        <div class="abs-center-img"><img src="img/logo-e.png" alt="logo" class="imagen"></div>
        <div class="abs-center">
            <div class="col-6">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form action="crear.php" method="POST" enctype="multipart/form-data" id="formulario" class="p-3 form">
                                <div class="mb-3 form-group">
                                    <label for="nombre" class="form-label">Nombre y fecha del certificado</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre del certificado (Mes año)" require>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="imagen" class="form-label">Imagen del diploma</label>
                                    <input class="form-control form-control-sm" id="imagen" type="file" name="imagen" require>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="textoPlano" class="form-label">Texto plano con los nombres y cedulas</label>
                                    <input class="form-control form-control-sm" id="textoPlano" type="file" name="archivo" require>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
 -->


    <div class="container">
        <div class="abs-center-img"><img src="img/logo-e.png" alt="logo" class="imagen"></div>
        <div class="abs-center">
            <form action="crear.php" method="POST" enctype="multipart/form-data" id="formulario"
                class="border p-3 form">
                <div class="form-group mb-3">
                    <label for="nombre" class="form-label">Nombre y fecha del certificado</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                        placeholder="nombre del certificado (Mes año)" require data-toggle="tooltip"
                        data-placement="top" title="Nombre del certificado">
                </div>
                <div class="form-group mb-3">
                    <label for="imagen" class="form-label">Imagen del diploma dimenciones 1024x790</label>
                    <input class="form-control form-control-sm" id="imagen" type="file" name="imagen" require
                        data-toggle="tooltip" data-placement="top" title="La imagen debe de ser en formato JPG">
                </div>
                <div class="form-group mb-3">
                    <label for="textoPlano" class="form-label">Documento en excel con nombre y apellido</label>
                    <input class="form-control form-control-sm" id="textoPlano" type="file" name="archivo" require
                    data-toggle="tooltip" data-placement="top" title="El documento tiene que ser con extencion xlsx">
                    <label for=""><a href="documento/ejemplo.xlsx">Descargar formato de ejemplo</a></label>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script src="bootstrap/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>


    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script>
    /* document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("formulario").addEventListener('submit', validarFormulario); 
});

function validarFormulario(evento) {
  evento.preventDefault();
  var usuario = document.getElementById('usuario').value;
  if(usuario.length == 0) {
    alert('No has escrito nada en el usuario');
    return;
  }
  var clave = document.getElementById('clave').value;
  if (clave.length < 6) {
    alert('La clave no es válida');
    return;
  }
  this.submit();
} */


    /* $(document).on('ready',function(){       
        $('#btn-ingresar').click(function(){
            var url = "datos_login.php";
            $.ajax({                        
               type: "POST",                 
               url: url,                     
               data: $("#formulario").serialize(), 
               success: function(data)             
               {
                 $('#resp').html(data);               
               }
           });
        });
    });
     */
    </script>







</body>

</html>