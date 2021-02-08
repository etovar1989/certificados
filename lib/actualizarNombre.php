<?php
include('funciones.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];

$actualizar = actualizarNombre($id, $nombre);

if($actualizar){
    echo "1";
}else{
    echo "0";
}


?>