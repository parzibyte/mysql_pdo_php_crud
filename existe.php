<?php
include_once "base_de_datos.php";
# Recuerda que nombre puede venir de cualquier lugar
$nombre = "Parzibyte";
# Seleccionar el id para que sea ligero, pues no necesitamos obtener los datos, solamente
# queremos saber si existe
$sentencia = $base_de_datos->prepare("SELECT id FROM personas WHERE nombre = ? LIMIT 1;");
$sentencia->execute([$nombre]);
# Ver cuántas filas devuelve
$numeroDeFilas = $sentencia->rowCount();
# Si son 0 o menos, significa que no existe
if ($numeroDeFilas <= 0) {
    echo "El usuario con nombre $nombre NO existe";
} else {
    echo "El usuario con nombre $nombre SÍ existe";
}
