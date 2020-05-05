<?php
$nombre= $_GET['nombre'];
$tipo= $_GET['tipo'];
$admin= $_GET['admin'];
require "../conexion.php";

$query = "SELECT idusuario, nombreU from usuario;";

$usuario = array();
if ($result = $conn->query($query)) {
	while($row = $result->fetch_assoc()) {
		$item = array();
		$item['id'] = $row['idusuario'];
		$item['nombre'] = $row['nombreU'];
		array_push($usuario, $item);
	}
}
else{
	echo "<p>Empty</p>";
}
?>
<!DOCTYPE html>
<html >
<head>
	<link rel="stylesheet" href="../CSS/estilo.css">
	<title>Valida Datos</title>
</head>
<body>
	<form id = "formu"name="formulario" method="post"  style="color: white;" action="procesaData.php">
		<ul>
			<li>
				<label for="name">Nombre:</label>
				<input style="margin-left: 20px"type="text" name="nombre" value="<?php echo $nombre;?>" readonly/><br/><br/>
			</li>
			<li>
				<label for="name">Tipo:</label>
				<input style="margin-left: 20px"type="text" name="tipo" value="<?php echo $tipo;?>" readonly/><br/><br/>
			</li>
			<li>
				<label for="name">Administrador:</label>
				<input type="text" name="admin" value="<?php echo $admin;?>" style="width: 30px; text-align: center;margin-left: 20px" readonly/><?echo " ".$usuario[$admin-1]['nombre'];?><br/><br/>
			</li>

			<input type="submit" name="boton" value="Insertar" style="width: 80px"  />
			<input type="submit" name="boton" value="Modificar" formaction="formulario.php"/>
		</ul>
	</form>
</div>
</body>
</html>
