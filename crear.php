<?php
include('lib/funciones.php');

/* Validador de datos */



$id = todos();
$nombre = $_POST['nombre'];


/** Crear un registro en base dedatos para id del certificado **/
crear($id,$nombre);


/******************************* Para la subida y la renombrada de una imagen ****************************************/
$nombreArchivo = $_FILES['imagen']['name'];
$guardado = $_FILES['imagen']['tmp_name'];
$ruta = 'images';
$completo = $ruta."/".$nombreArchivo;

/*Para renombre*/
$tipo = $_FILES['imagen']['type'];
$t = explode("/",$tipo);
$tipo = $t[1];

if(!file_exists($ruta)){
    mkdir($ruta,0777,true);
    if(file_exists($ruta)){
        if(move_uploaded_file($guardado,$completo)){            
            rename($ruta."/".$nombreArchivo, $ruta."/"."diploma-".$id.".".$tipo);            
        }else{
            echo "Error al subir archivo";
        }

    }
}else{
    if(move_uploaded_file($guardado,$ruta."/".$nombreArchivo)){        
        rename($ruta."/".$nombreArchivo, $ruta."/"."listado.".$tipo);        
    }else{
        echo "Error al subir archivo";
    }

}



/******************************* Para la subida y la renombrada el excel ****************************************/

/**para guardar el archivo en excel */
$nombreArchivo = $_FILES['archivo']['name'];
$guardado = $_FILES['archivo']['tmp_name'];
$ruta = 'documento';
$completo = $ruta."/".$nombreArchivo;

/*Para renombre*/
$tipo = $_FILES['archivo']['type'];
$t = explode("/",$tipo);
$tipo = $t[1];
if($tipo == 'vnd.openxmlformats-officedocument.spreadsheetml.sheet'){
    $tipo = 'xlsx';
}


if(!file_exists($ruta)){
    mkdir($ruta,0777,true);
    if(file_exists($ruta)){
        if(move_uploaded_file($guardado,$completo)){
            //echo "Se subio el archivo";
            rename($ruta."/".$nombreArchivo, $ruta."/"."listado.".$tipo);
            insertarRegistro($id);
            
        }else{
            echo "Error al subir archivo";
        }

    }
}else{
    if(move_uploaded_file($guardado,$ruta."/".$nombreArchivo)){
        //echo "Se subio el archivo";
        rename($ruta."/".$nombreArchivo, $ruta."/"."listado.".$tipo);
        insertarRegistro($id);
    }else{
        echo "Error al subir archivo";
    }

}



?>