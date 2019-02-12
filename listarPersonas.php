<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM personas;");
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tabla de ejemplo</title>
	<style>
	table, th, td {
	    border: 1px solid black;
	}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Género</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<!--
				Atención aquí, sólo esto cambiará
				Pd: no ignores las llaves de inicio y cierre {}
			-->
			<?php foreach($personas as $persona){ ?>
			<tr>
				<td><?php echo $persona->id ?></td>
				<td><?php echo $persona->nombre ?></td>
				<td><?php echo $persona->apellidos ?></td>
				<td><?php echo $persona->sexo ?></td>
				<td><a href="<?php echo "editar.php?id=" . $persona->id?>">Editar</a></td>
				<td><a href="<?php echo "eliminar.php?id=" . $persona->id?>">Eliminar</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>