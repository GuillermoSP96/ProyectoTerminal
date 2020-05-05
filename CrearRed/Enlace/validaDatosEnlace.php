<?php
$boton=$_POST['boton'];
if($boton=="Modificar"){
	$id=$_POST['id'];
	$nombre=$_POST['nombre'];
	$tipo=$_POST['tipo'];
	$admin=$_POST['admin'];
}
if($boton=="Eliminar"){
	$id=$_POST['id'];
}
$tipoDisp =  array( );
array_push($tipoDisp, 'router');
array_push($tipoDisp, 'switch');
array_push($tipoDisp, 'cucme');

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
<html >
<head>
	<link rel="stylesheet" href="../CSS/estilo.css">
</head>
<body>
	<form id="formu"name="formulario" method="post" style="color: white;" action="procesaData.php">
		<ul>
			<input type="hidden" name="id" value="<?=$id;?>" /><br/>
			<li>
				<label for="name">Nombre:</label>
				<input type="text"   name="nombre" value="<?=$nombre;?>" /><br/><br/>
			</li>
			<li>
				<label for="tipo">Tipo:</label>
				<!-- <input type="text" name="tipo" value="<?=$tipo;?>"><br/><br/>-->
				<select name="tipo">
					<?php
					for($i=0;$i<count($tipoDisp);$i++)
						if($tipoDisp[$i]==$tipo)
							echo "<option value=".$tipoDisp[$i]." selected>".$tipoDisp[$i]."</option>";
						else
							echo "<option value=".$tipoDisp[$i].">".$tipoDisp[$i]."</option>";
						?>
					</select><br/><br/>
				</li>
				<li>
					<label for="admin">Administrador:</label>
					<!-- <input type="text" name="tipo" value="<?=$tipo;?>"><br/><br/>-->
					<select name="admin">
						<?php
						for($i=0;$i<count($usuario);$i++)
							if($usuario[$i]['id']==$admin)
								echo "<option value=".$usuario[$i]['id']." selected>".$usuario[$i]['nombre']."</option>";
							else
								echo "<option value=".$usuario[$i]['id'].">".$usuario[$i]['nombre']."</option>";
							?>
						</select><br/><br/>
					</li>
					<input type="submit" name="boton" value="Actualizar" style="width: 90px" /><input type="submit" name="boton" value="Cancelar" style="width: 90px; margin-left: 10px"/>
				</li>
			</ul>

		</form>
	</body>
	</html>
