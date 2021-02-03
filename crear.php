<?php
include('lib/funciones.php');

/* Validador de datos */

//var_dump($_FILES);

$id = todos();
$nombre = $_POST['nombre'];


/** Crear un registro en base dedatos para id del certificado **/
crear($id, $nombre);


/******************************* Para la subida y la renombrada de una imagen ****************************************/
$nombreImagen = $_FILES['imagen']['name'];
$guardadoImagen = $_FILES['imagen']['tmp_name'];
$rutaImagen = 'images';
$completoImage = $rutaImagen . "/" . $nombreImagen;

/*Para renombre*/
$tipoImagen = $_FILES['imagen']['type'];
$ti = explode("/", $tipoImagen);
$tipoImagen = $ti[1];

if (!file_exists($rutaImagen)) {
    mkdir($rutaImagen, 0777, true);
    if (file_exists($rutaImagen)) {
        if (move_uploaded_file($guardadoImagen, $completoImage)) {
            rename($rutaImagen . "/" . $nombreImagen, $rutaImagen . "/" . "diploma-" . $id . "." . $tipoImagen);
            $validador1 = "";
        } else {
            $validador1 = "Hubo un error al subir la imagen";
        }
    }
} else {
    if (move_uploaded_file($guardadoImagen, $rutaImagen . "/" . $nombreImagen)) {
        rename($rutaImagen . "/" . $nombreImagen, $rutaImagen . "/" . "diploma-" . $id . "." . $tipoImagen);
        $validador1 = "";
    } else {
        $validador1 = "Hubo un error al subir la imagen";
    }
}



/******************************* Para la subida y la renombrada el excel ****************************************/

/**para guardar el archivo en excel */
$nombreArchivo = $_FILES['archivo']['name'];
$guardado = $_FILES['archivo']['tmp_name'];
$ruta = 'documento';
$completo = $ruta . "/" . $nombreArchivo;

/*Para renombre*/
$tipo = $_FILES['archivo']['type'];
$t = explode("/", $tipo);
$tipo = $t[1];
if ($tipo == 'vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
    $tipo = 'xlsx';
}


if (!file_exists($ruta)) {
    mkdir($ruta, 0777, true);
    if (file_exists($ruta)) {
        if (move_uploaded_file($guardado, $completo)) {
            //echo "Se subio el archivo";
            rename($ruta . "/" . $nombreArchivo, $ruta . "/" . "listado." . $tipo);
            insertarRegistro($id);
            $validador2 = "";
        } else {
            $validador2 = "Hubo un error con el archivo de Excel";
        }
    }
} else {
    if (move_uploaded_file($guardado, $ruta . "/" . $nombreArchivo)) {
        //echo "Se subio el archivo";
        rename($ruta . "/" . $nombreArchivo, $ruta . "/" . "listado." . $tipo);
        insertarRegistro($id);
        $validador2 = "";
    } else {
        echo "Error al subir archivo";
        $validador2 = " Hubo un error con el archivo de Excel";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación final</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
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
    <?php if($validador1 == "" && $validador2 == ""){?>
    <div class="container">
        <div class="abs-center-img"><img src="img/logo-e.png" alt="logo" class="imagen"></div>
        <div class="abs-center">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">En hora buena todo salió bien</h1>
                    <p class="lead">Presiona el botón validar para ir al portal Eduteka.</p>
                    <a class="btn btn-primary" href="http://eduteka.icesi.edu.co/certificacion/">Validar</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    }else{?>    
    <div class="container">
        <div class="abs-center-img"><img src="img/logo-e.png" alt="logo" class="imagen"></div>
        <div class="abs-center">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Paceré ser que algo salió mal en </h1>
                    <p class="lead"><?php echo $validador1.$validador2 ?>.</p>
                </div>
            </div>
        </div>
    </div>
   
    
    <?php } ?>    


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script src="bootstrap/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>
</body>

</html>