<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM personas WHERE id = ?;");
$sentencia->execute([$id]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);
if($persona === FALSE){
	#No existe
	echo "¡No existe alguna persona con ese ID!";
	exit();
}

#Si la persona existe, se ejecuta esta parte del código
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registrar persona</title>
</head>
<body>
	<form method="post" action="guardarDatosEditados.php">
		<!-- Ocultamos el ID para que el usuario no pueda cambiarlo (en teoría) -->
		<input type="hidden" name="id" value="<?php echo $persona->id; ?>">

		<label for="nombre">Nombre:</label>
		<br>
		<input value="<?php echo $persona->nombre ?>" name="nombre" required type="text" id="nombre" placeholder="Escribe tu nombre...">
		<br><br>
		<label for="apellidos">Apellidos:</label>
		<br>
		<input value="<?php echo $persona->apellidos ?>" name="apellidos" required type="text" id="apellidos" placeholder="Escribe tus apellidos...">
		<br><br>
		<label for="sexo">Género</label>
		<select name="sexo" required name="sexo" id="sexo">
			<!-- 
			Para seleccionar una opción con defecto, se debe poner el atributo selected.
			Usamos el operador ternario para que, si es esa opción, marquemos la opción seleccionada
			 -->
			<option value="">--Selecciona--</option>
			<option <?php echo $persona->sexo === 'M' ? "selected='selected'": "" ?> value="M">Masculino</option>
			<option <?php echo $persona->sexo === 'F' ? "selected='selected'": "" ?> value="F">Femenino</option>
		</select>
		<br><br><input type="submit" value="Guardar cambios">
	</form>
</body>
</html>