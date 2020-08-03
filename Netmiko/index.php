<?php
require "conect/conexion.php";

$query = "SELECT * from dispositivo;";
#$query = "SELECT idDispositivo, nombreD, tipo, nombreU, contrasenia from dispositivo inner join usuario where idusuario = Usuario_idusuario;";

$dispositivos = array();
if ($result = $conn->query($query)) {
  while($row = $result->fetch_assoc()) {
    $item = array();
    $item['id'] = $row['idDispositivo'];
    $item['nombre'] = $row['nombreD'];
    $item['tipo'] = $row['tipo'];
#    $item['usuario'] = $row['nombreU'];
#    $item['pass'] = $row['contrasenia'];

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
	<link rel="stylesheet" href="CSS/estilo.css">
	<title>Netmiko</title>
	<meta charset="UTF-8"/>
</head>
<body>
	<form id="formu"name="formulario" method="get" style="color: white;" action="configuracion.php">
		<ul>
			<li>
				<label for="id">Dispositivo:</label>
				<select name="id">
					<?php
					for($i=0;$i<count($dispositivos);$i++)
						if($dispositivos[$i]['id']==$id){
							echo "<option value=".$dispositivos[$i]['id']." selected>".$dispositivos[$i]['nombre']."</option>";
            }
						else
							echo "<option value=".$dispositivos[$i]['id'].">".$dispositivos[$i]['nombre']."</option>";
					?>
					</select><br/><br/>
				</li>
					<button name="boton">Usar</button>
				</ul>
			</form>
		</body>
		</html>
