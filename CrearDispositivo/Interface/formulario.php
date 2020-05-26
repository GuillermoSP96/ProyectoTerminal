<?php
$boton=$_POST['boton'];

if($boton=="Insertar"){
	$nombre='';
	$ip='';
	$estado='';
	$disp='';
}
if($boton=="Modificar"){
	$nombre=$_POST['nombre'];
	$ip=$_POST['ip'];
	$estado=$_POST['estado'];
	$disp=$_POST['disp'];
}

$estados =  array( );
array_push($estados, 'up');
array_push($estados, 'down');

/*$mascaraRed =  array( );
for($i=8;$i<32;$i++)
{
	array_push($mascaraRed, '/'.$i);
}*/

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
<!DOCTYPE HTML>
<html >
<head>
	<link rel="stylesheet" href="../CSS/estilo.css">
	<title>Interfaces</title>
	<meta charset="UTF-8"/>
</head>
<body>
	<form id="formu"name="formulario" method="get" style="color: white;" action="validaDatos.php">
		<ul>
			<li>
				<label for="name">Nombre:</label>
				<input style="margin-left: 20px" type="text" name="nombre" value="<?=$nombre;?>"><br/><br/>
			</li>
			<li>
				<label for="ip">IPv4:</label>
				<input style="margin-left: 20px" type="text" name="ip" value="<?=$ip;?>"><br/><br/>
			</li>
			<li>
				<label for="estado">Estado:</label>
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
				<label for="disp">Dispositivo:</label>
				<select style="margin-left: 20px"name="disp">
					<?php
					for($i=0;$i<count($dispositivos);$i++)
						if($dispositivos[$i]['id']==$disp)
							echo "<option value=".$dispositivos[$i]['id']." selected>".$dispositivos[$i]['nombre']."</option>";
						else
							echo "<option value=".$dispositivos[$i]['id'].">".$dispositivos[$i]['nombre']."</option>";
					?>
					</select><br/><br/>
				</li>
					<button name="boton">Enviar Consulta</button>
				</ul>
			</form>
		</body>
		</html>
