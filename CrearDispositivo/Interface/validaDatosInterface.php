<?php
$boton=$_POST['boton'];
if($boton=="Modificar"){
	$id=$_POST['id'];
	$nombre=$_POST['nombre'];
	$ip=$_POST['ip'];
	$estado=$_POST['estado'];
	$disp=$_POST['disp'];
}
$estados =  array( );
array_push($estados, 'up');
array_push($estados, 'down');
require "../conexion.php";

$query = "SELECT idDispositivo, nombreD from dispositivo;";
$result = $conn->query($query);
$dispositivos = array();

if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$item = array();
			$item['id'] = $row['idDispositivo'];
			$item['nombre'] = $row['nombreD'];
			array_push($dispositivos, $item);
		}
	}
else{
	echo "<p>Empty</p>";
}
$conn->close();
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
				<input style="margin-left: 20px" type="text" name="nombre" value="<?=$nombre;?>" /><br/><br/>
			</li>
			<li>
				<label for="name">IPv4:</label>
				<input style="margin-left: 20px" type="text" name="ip" value="<?=$ip;?>" /><br/><br/>
			</li>
			<li>
				<label for="tipo">Estado:</label>
				<select style="margin-left: 20px" name="estado">
					<?php
					for($i=0;$i<count($estados);$i++)
						if($estados[$i]==$estado)
							echo "<option value=".$estados[$i]." selected>".$estados[$i]."</option>";
						else
							echo "<option value=".$estados[$i].">".$estados[$i]."</option>";
						?>
					</select><br/><br/>
				</li>
				<li>
					<label for="admin">Dispositivo:</label>
					<select style="margin-left: 20px" name="disp">
						<?php
						for($i=0;$i<count($dispositivos);$i++)
							if($dispositivos[$i]['id']==$disp)
								echo "<option value=".$dispositivos[$i]['id']." selected>".$dispositivos[$i]['nombre']."</option>";
							else
								echo "<option value=".$dispositivos[$i]['id'].">".$dispositivos[$i]['nombre']."</option>";
							?>
						</select><br/><br/>
					</li>
					<input type="submit" name="boton" value="Actualizar" style="width: 90px" />
					<input type="submit" name="boton" value="Cancelar" style="width: 90px; margin-left: 10px"/>
				</li>
			</ul>

		</form>
	</body>
	</html>
