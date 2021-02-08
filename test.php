<?php



/* $cursos[1] = "Uso pedagógico de las TIC, Transición a la Educación no Presencial (Fundación Mayaguez)";
$cursos[2] = "Uso pedagógico de las TIC, Transición a la Educación no Presencial (Manos Visibles)";
$cursos[3] = "Uso pedagógico de las TIC, Transición a la Educación no Presencial (Agosto 2020)";
$cursos[4] = "Diseño y creación de recursos digitales multimediales en entornos educativos (Septiembre 2020)";
$cursos[5] = "Uso pedagógico de las TIC, Transición a la Educación no Presencial (Septiembre 2020)";
$cursos[6] = "Uso pedagógico de las TIC, Transición a la Educación no Presencial (UNAL 2020)";
$cursos[7] = "Uso pedagógico de las TIC, Transición a la Educación no Presencial (Octubre 2020)";
$cursos[8] = "Uso pedagógico de las TIC, Transición a la Educación no Presencial (Octubre 29 2020)";
$cursos[9] = "Uso pedagógico de las TIC, Transición a la Educación no Presencial (Cañaverales 1)";
$cursos[10] = "Uso pedagógico de las TIC, Transición a la Educación no Presencial (Cañaverales 2)";
$cursos[11] = "Uso pedagógico de las TIC, Transición a la Educación no Presencial (Noviembre 26 2020)";
$cursos[12] = "Uso pedagógico de las TIC, Transición a la Educación no Presencial (Noviembre 26 2020)";
$cursos[13] = "Uso pedagógico de las TIC, Transición a la Educación no Presencial (Jefferson, Diciembre 3 2020)";
$cursos[14] = "Diplomado en Juego y Psicomoticidad en Primera Infancia para Periodo de Confinamiento (ICESI, Diciembre 18 2020)";


var_dump($cursos);

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

$cursos1 = cursos($conexion);
var_dump($cursos1); */

/* recorre la tabla de registro_nomcertificados y devuelve un array con el id como pocicion */

/* 
function cursos($conexion){    
    $query = "SELECT `idNom`, `nombre` FROM `registro_nomcertificados`";
    $result = mysqli_query($conexion, $query);
    
    foreach($result as $row){
        $cursos[$row['idNom']] = $row['nombre'];
    }
    return $cursos; 
}
 */

function actualizarNombre($id, $nombre){    
    $hoy = date("y-m-d"); 
    include("conexion.php"); 
    $query = "UPDATE `registro_certificados` SET `usuario`='$nombre',`fechaD`=$hoy WHERE idCert = $id";
    $result = mysqli_query($conexion, $query);    
    return $result;

}

$actualizar = actualizarNombre(1, 'Boris Sánchez Molano Ceró');

var_dump($actualizar);




?>