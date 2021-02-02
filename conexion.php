<?php

    /*Datos de conexion*/
    $server = 'localhost';
    $usuario = 'root';
    $clave = "";
    $bd = "edtksite_registro";
    
    
   	$conexion=new mysqli($server,$usuario,$clave,$bd); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
    
    

?>