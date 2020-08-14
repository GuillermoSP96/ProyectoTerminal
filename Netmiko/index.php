<?php
$id=1;
$ipHost=1;
require "conect/conexion.php";

$query = "SELECT * from dispositivo;";

$dispositivos = array();
if ($result = $conn->query($query)) {
  while($row = $result->fetch_assoc()) {
    $item = array();
    $item['id'] = $row['idDispositivo'];
    $item['nombre'] = $row['nombreD'];
    $item['tipo'] = $row['tipo'];
    array_push($dispositivos, $item);
  }
}
else{
  echo "<p>Empty</p>";
}

$query = "SELECT * FROM dispositivointerfaz;";
// nombreD, idinterface, nombreI, ip
$dispoInt = array();
if ($result = $conn->query($query)) {
  while($row = $result->fetch_assoc()) {
    $item = array();
    $item['nombreD'] = $row['nombreD'];
    $item['idinterface'] = $row['idinterface'];
    $item['nombreI'] = $row['nombreI'];
    $item['ip'] = $row['ip'];
    array_push($dispoInt, $item);
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
			<li>
				<label for="ip">IP:</label>
				<select name="ip">
					<?php
					for($i=0;$i<count($dispoInt);$i++)
						if($dispoInt[$i]['ipHost']==$ipHost){
							echo "<option value=\"".$dispoInt[$i]['ip']."\" selected>".$dispoInt[$i]['nombreD']."-->".$dispoInt[$i]['nombreI']." ".$dispoInt[$i]['ip']."</option>";
            }
						else
              echo "<option value=\"".$dispoInt[$i]['ip']."\">".$dispoInt[$i]['nombreD']."-->".$dispoInt[$i]['nombreI']." ".$dispoInt[$i]['ip']."</option>";
					?>
					</select><br/><br/>
				</li>
					<button name="boton">Usar</button>
				</ul>
			</form>
		</body>
		</html>
