	<?php
	require '../conexion.php';
	$query = "SELECT idinterface, nombreI, ip, estado, Dispositivo_idDispositivo, nombreD FROM WebCUCME.interface inner join WebCUCME.dispositivo where Dispositivo_idDispositivo=idDispositivo;";
		//initialize the array to store the processed data
	$result = $conn->query($query);
	$arreglo = array();
		//check if there is any data returned by the SQL Query
	if ($result->num_rows > 0) {
			 //Converting the results into an associative array
			//idinterface, nombreI, ip, estado, Dispositivo_idDispositivo
		while($row = $result->fetch_assoc()) {
			$item = array();
			$item['id'] = $row['idinterface'];
			$item['nombre'] = $row['nombreI'];
			$item['ip'] = $row['ip'];
			$item['estado'] = $row['estado'];
			$item['disp'] = $row['Dispositivo_idDispositivo'];
			$item['nombreD'] = $row['nombreD'];
			 //append the above created object into the main array.
			array_push($arreglo, $item);
		}
	}
	else{
		echo "<p>Empty</p>";
	}
		 //Closing the connection to DB
	$conn->close();

	?>
	<html >
	<head>
		<link rel="stylesheet" href="../CSS/estilo.css">
		<H1 id="titulo" >Tabla de Interfaces</H1>
		<title>Interfaces</title>
		<meta charset="UTF-8"/>
	</head>
	<body style="">
		<button>
			<a href="/">
				Inicio
			</a>
		</button>
		<button>
			<a href="../">
				Atras
			</a>
		</button>
		<table border=1 id="centro" method='post'>
			<tr>
				<th>ID</th><th>Nommbre</th><th>IPv4</th><th>Estado</th><th>Dispositivo</th>
				<th>
					<form name="formulario" method="post" action="formulario.php">
						<input type='submit' name='boton' value='Insertar'/>
					</form>
				</th><th>Borrar</th></tr>
				<?php
				for($i=0;$i<count($arreglo);$i++) {
					echo "<tr>";
					echo "<td>".$arreglo[$i]['id']."</td>";
					echo "<td>".$arreglo[$i]['nombre']."</td>";
					echo "<td>".$arreglo[$i]['ip']."</td>";
					echo "<td>".$arreglo[$i]['estado']."</td>";
					echo "<td>".$arreglo[$i]['nombreD']."</td>";
					echo "<td>";
					echo "<form action='validaDatosInterface.php' method='post'>";
					echo "<input type='hidden' name='id' value='".$arreglo[$i]['id']."'/>";
					echo "<input type='hidden' name='nombre' value='".$arreglo[$i]['nombre']."'/>";
					echo "<input type='hidden' name='ip' value='".$arreglo[$i]['ip']."'/>";
					echo "<input type='hidden' name='estado' value='".$arreglo[$i]['estado']."'/>";
					echo "<input type='hidden' name='disp' value='".$arreglo[$i]['disp']."'/>";
					echo "<input type='submit' name='boton' value='Modificar'/>";
					echo "</form>";
					echo "</td>";
					echo "<td>";
					echo "<form action='procesaData.php' method='post'>";
					echo "<input type='hidden' name='id' value='".$arreglo[$i]['id']."'/>";
					echo "<input type='submit' name='boton' value='Borrar'/>";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
				}
				?>
			</table>
		</body>
		</html>
