	<?php
	require '../conexion.php';
		//the SQL query to be executed
	$query = "SELECT * FROM dispositivo;";
		//initialize the array to store the processed data
	$result = $conn->query($query);
	$arreglo = array();
		//check if there is any data returned by the SQL Query
	if ($result->num_rows > 0) {
			 //Converting the results into an associative array
			// idDispositivo, nombreD, tipo, Usuario_idusuario
		while($row = $result->fetch_assoc()) {
			$item = array();
			$item['id'] = $row['idDispositivo'];
			$item['nombre'] = $row['nombreD'];
			$item['tipo'] = $row['tipo'];
			//$item['admin'] = $row['Usuario_idusuario'];
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
	<html style="background-image: url(/wallpapers/wallpaper.jpg);">
	<head>
		<link rel="stylesheet" href="../CSS/estilo.css">
		<H1 id="titulo" >Tabla de Dispositivos</H1>
		<title>Dispositivos</title>
		<meta charset="UTF-8"/>
	</head>
	<body style="">
		<table border=1 id="centro" method='post'>
			<tr>
				<th>ID</th><th>Nommbre</th><th>tipo</th>
				<th>
					<form name="formulario" method="post" action="formulario.php">
						<input type='submit' name='boton' value='Insertar'/>
					</form>
				</th></tr>
				<?php
				for($i=0;$i<count($arreglo);$i++) {
					echo "<tr>";
					echo "<td>".$arreglo[$i]['id']."</td>";
					echo "<td>".$arreglo[$i]['nombre']."</td>";
					echo "<td>".$arreglo[$i]['tipo']."</td>";
					//echo "<td>".$arreglo[$i]['admin']."</td>";
					echo "<td>";
					echo "<form action='validaDatosDispositivo.php' method='post'>";
					echo "<input type='hidden' name='id' value='".$arreglo[$i]['id']."'/>";
					echo "<input type='hidden' name='nombre' value='".$arreglo[$i]['nombre']."'/>";
					echo "<input type='hidden' name='tipo' value='".$arreglo[$i]['tipo']."'/>";
					//echo "<input type='hidden' name='admin' value='".$arreglo[$i]['admin']."'/>";
					echo "<input type='submit' name='boton' value='Modificar'/>";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
				}
				?>
			</table>
		</body>	
		</html>
