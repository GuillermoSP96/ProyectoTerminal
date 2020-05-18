<?php
require 'conect/conexion.php';
	
	$idEn = $_POST['id'];
$query = "SELECT * FROM interface where idinterface =".$idEn.";";
$q = "SELECT nombreD FROM dispositivo where idDispositivo =".$idEn.";";


$result = $conn->query($query);
$r = $conn->query($q);
$arreglo = array();
$a = array();

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$item = array();
		$item['id'] = $row['idinterface'];
		$item['nombre'] = $row['nombreI'];
		$item['ip'] = $row['ip'];
		$item['estado'] = $row['estado'];
		$item['disp'] = $row['Dispositivo_idDispositivo'];
		 //append the above created object into the main array.
		array_push($arreglo, $item);
	}
}
else{
	echo "<p>Empty</p>";
}
if ($r->num_rows > 0) {
	while($row = $r->fetch_assoc()) {
		$item = array();
		$item['nombre'] = $row['nombreD'];
		array_push($a, $item);
	}
}
else{
	echo "<p>Empty</p>";
}
$nomDispo = $a[0]['nombre'];
	 //Closing the connection to DB
$conn->close();

?>
<html >
<head>
	<link rel="stylesheet" href="CSS/estilo.css">
	<H1 id="titulo">Interfaces del Dispositivo <?php echo $nomDispo;?></H1>
	<title>Interfaces</title>
	<meta charset="UTF-8"/>
</head>
<body style="">
	<table border=1 id="centro" method='post'>
		<tr>
			<th>ID</th><th>Nommbre</th><th>IPv4</th><th>Estado</th><th>Dispositivo</th></tr>
			<?php
			for($i=0;$i<count($arreglo);$i++) {
				echo "<tr>";
				//idinterface, nombreI, ip, estado, Dispositivo_idDispositivo
				echo "<td>".$arreglo[$i]['id']."</td>";
				echo "<td>".$arreglo[$i]['nombre']."</td>";
				echo "<td>".$arreglo[$i]['ip']."</td>";
				echo "<td>".$arreglo[$i]['estado']."</td>";
				echo "<td>";
				echo "<form action='configuracion.php' method='post'>";
				echo "<input type='hidden' name='id' value='".$arreglo[$i]['id']."'/>";
				echo "<input type='hidden' name='nombre' value='".$arreglo[$i]['nombre']."'/>";
				echo "<input type='hidden' name='ip' value='".$arreglo[$i]['ip']."'/>";
				echo "<input type='hidden' name='estado' value='".$arreglo[$i]['estado']."'/>";
				echo "<input type='hidden' name='disp' value='".$arreglo[$i]['disp']."'/>";
				echo "<input type='submit' name='boton' value='Trabajar'/>";
				echo "</form>";
				echo "</td>";
				echo "</tr>";
			}
			?>
		</table>
	</body>
	</html>
