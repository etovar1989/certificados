<?php

include('funciones.php');

$idC = $_POST['idC'];

$listado = listadoUsuarios($idC);
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col" class="text-center">Editar</th>
    </tr>
  </thead>
  <tbody>

<?php 

foreach($listado as $row){

    //echo $row['usuario']."<br>";

?>


    <tr>      
      <td><?php echo $row['usuario'] ?></td>
      <td class="text-center"><a href="javascript:funcion(<?php echo $row['idCert']?>, '<?php echo $row['usuario']?>')" class="btnPop"><i class="fas fa-pen"></i></a></td>
    </tr>



<?php
}
?>
  </tbody>
</table>
