<?php

/* 
* Consulta en BD para saber cual es el ultimo ID para depues sumarle 1 y devolver el resultado  
*/
function todos(){
    include("./conexion.php");
    $query = "SELECT `idNom` FROM `registro_nomcertificados`";
    $result = mysqli_query($conexion, $query);        
    
    while($row = $result->fetch_assoc()){
        $mayor = $row['idNom'];
        if($row['idNom'] > $mayor){
            $mayor = $row['idNom'];
        }
    }
    
    $mayor = $mayor + 1;

    return $mayor;
    mysql_close($conexion);
}

/* 
* Crea un nuevo registro en la tabla de registro_nomcertificados necesita id y nombre, devuelve un booleano
*/
function crear($id,$nombre){
    include("./conexion.php");
    $query = "INSERT INTO `registro_nomcertificados`(`idNom`, `nombre`, `ref`) VALUES (".$id.",'".$nombre."','')";
    $result = mysqli_query($conexion, $query);    
    return $result;  

}

/* 
* inserta los registros de los usurios leeidos del documento en excel en base de datos
*/

function crearRegistro($id,$nombre,$cc){
    include("./conexion.php");
    $hoy = date("y-m-d"); 
    $qr = $cc."-1";
    $query = "INSERT INTO `registro_certificados`(`idCert`, `idCurso`, `usuario`, `idUcc`, `qrcode`, `fechaD`) VALUES (null,$id,'$nombre','$cc','$qr','$hoy')";
    $result = mysqli_query($conexion, $query);    
    return $result;  
}



/* 
* inserta los registros de los usurios leeidos del documento en excel en base de datos
*/
function insertarRegistro($id){
    require_once 'PHPExcel/Classes/PHPExcel.php';
    $archivo = "./documento/listado.xlsx";
    $inputFileType = PHPExcel_IOFactory::identify($archivo);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($archivo);
    $sheet = $objPHPExcel->getSheet(0); 
    $highestRow = $sheet->getHighestRow(); 
    $highestColumn = $sheet->getHighestColumn();

    $num=0;
    for ($row = 2; $row <= $highestRow; $row++){ 
        $num++;
        
        $nombre = $sheet->getCell("A".$row)->getValue();
        $cc = $sheet->getCell("B".$row)->getValue();
        
        if($nombre != ""){
            crearRegistro($id,$nombre,$cc);  
        }
        
        
    }
}



function consultarCertificados(){
    include("./conexion.php");
    $query = "SELECT `idNom`, `nombre` FROM `registro_nomcertificados`";
    $result = mysqli_query($conexion, $query);    
    return $result;
}


function listadoUsuarios($idC){
    include("../conexion.php");
    $query = "SELECT `idCert`, `idCurso`, `usuario` FROM `registro_certificados` WHERE idCurso = $idC ";
    $result = mysqli_query($conexion, $query);    
    return $result;
}



function actualizarNombre($id, $nombre){

    include("../conexion.php");
    $hoy = date("y-m-d"); 
    $query = "UPDATE `registro_certificados` SET `usuario`='$nombre',`fechaD`=$hoy WHERE idCert = $id";
    $result = mysqli_query($conexion, $query);    
    return $result;

}



?>