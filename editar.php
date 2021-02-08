<?php
//error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
//header('Content-type: text/html; charset=ISO-8859-1');
include('lib/funciones.php');

$certificados = consultarCertificados();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edicion</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!--load all styles -->
    <link href="lib/fontawesome/css/all.css" rel="stylesheet">

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
    <div class="container">
        <div class="abs-center-img"><img src="img/logo-e.png" alt="logo" class="imagen"></div>
        <div class="abs-center">
            <div class="border p-3 form">

                <div class="form-group mb-3">
                    <select class="form-control" id="combo">
                        <option value="0">Seleccione el certificado a editar</option>
                        <?php
                        foreach ($certificados as $row) {
                        ?>
                            <option value="<?php echo $row['idNom'] ?>"><?php echo $row['nombre'] ?></option>

                        <?php     }

                        ?>
                    </select>
                    <label for="nombres"></label>
                    <div id="usuarios"></div>
                </div>
            </div>

        </div>





    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script src="bootstrap/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- bootbox code -->
    <script src="lib/bootbox/bootbox.min.js"></script>
    <script src="lib/bootbox/bootbox.locales.min.js"></script>



    





    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>


    <script>        
        $("#combo").change(function() {

            buscarCertificado();


        });
    </script>


    <script>
    function buscarCertificado(){
        var idC = $("#combo option:selected").val();
            if (idC > 0) {



                $.ajax({
                    data: {
                        idC: idC
                    },
                    type: 'post',
                    url: 'lib/consultaEditar.php',
                    success: function(respuesta) {
                        //console.log(respuesta);
                        $("#usuarios").html(respuesta);

                    },
                    error: function() {
                        //console.log("No se ha podido obtener la información");
                        alert('Hubo un error')
                    }
                });


            } else {
                $("#usuarios").html("");
            }
    }
    
    </script>



    <script>
        function funcion(id, nombre) {
            bootbox.prompt({
                title: "Modificacion de nombre!",
                inputType: 'text',
                value: nombre,
                callback: function (result) {
                    if(result.length > 4 ){
                        actualizar(id, result, nombre);                   
                    }else{
                        swal('Error', 'No es un nombre valido', 'error');
                    }                    
                   
                    

                }
            });
        }
    </script>

    <script>
        function actualizar(id, nombre, old) {
            var volver;

            $.ajax({
                data: {
                    id: id,
                    nombre: nombre
                },
                type: 'post',
                url: 'lib/actualizarNombre.php',
                success: function(respuesta) {
                    if(respuesta == 1){
                        swal("Todo salio coqueto", "Se modifico el nombre de " + old + " por el de " + nombre, "success");
                        buscarCertificado();                    
                    }else{
                        swal('Error', 'No se puedo actualizar', 'error');
                    }
                    

                },
                error: function() {
                    //console.log("No se ha podido obtener la información");
                    alert('Hubo un error');                    
                }
            });            

        }
    </script>


</body>

</html>