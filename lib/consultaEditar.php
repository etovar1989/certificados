<?php

include('funciones.php');

$idC = $_POST['idC'];

$listado = listadoUsuarios($idC);
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>

<?php 

foreach($listado as $row){

    //echo $row['usuario']."<br>";

?>


    <tr>      
      <td><?php echo $row['usuario'] ?><a href=""><i class="bi-alarm"></i></a></td>
    </tr>



<?php
}
?>
  </tbody>
</table>
