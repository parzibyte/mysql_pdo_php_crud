<?php
/*
	CRUD con MySQL y PHP
	@author parzibyte
	@date 2018-02-12
*/
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "pruebas";
try{
	$base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>