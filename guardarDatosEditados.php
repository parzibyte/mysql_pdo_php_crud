<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["nombre"]) || 
	!isset($_POST["apellidos"]) || 
	!isset($_POST["sexo"]) || 
	!isset($_POST["id"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$sexo = $_POST["sexo"];

$sentencia = $base_de_datos->prepare("UPDATE personas SET nombre = ?, apellidos = ?, sexo = ? WHERE id = ?;");
$resultado = $sentencia->execute([$nombre, $apellidos, $sexo, $id]); # Pasar en el mismo orden de los ?
if($resultado === TRUE) echo "Cambios guardados";
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
?>