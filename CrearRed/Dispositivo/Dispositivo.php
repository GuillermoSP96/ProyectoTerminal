	<?php
	require '../conexion.php';
		//the SQL query to be executed
	#$query = "SELECT * FROM dispositivo;";
	$query = "SELECT idDispositivo, nombreD, tipo, nombreU FROM webcucme.dispositivo inner join webcucme.usuario where Usuario_idusuario=idusuario;";
		//initialize the array to store the processed data
	$result = $conn->query($query);
	$arreglo = array();
		//check if there is any data returned by the SQL Query
	if ($result->num_rows > 0) {
		//idDispositivo, nombreD, tipo, nombreU
		while($row = $result->fetch_assoc()) {
			$item = array();
			$item['id'] = $row['idDispositivo'];
			$item['nombre'] = $row['nombreD'];
			$item['tipo'] = $row['tipo'];
			$item['admin'] = $row['nombreU'];
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
		<H1 id="titulo" >Tabla de Dispositivos</H1>
		<title>Dispositivos</title>
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
				<th>ID</th><th>Nombre</th><th>Tipo</th><th>Administrador</th>
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
					echo "<td>".$arreglo[$i]['tipo']."</td>";
					echo "<td>".$arreglo[$i]['admin']."</td>";
					echo "<td>";
					echo "<form action='validaDatosDispositivo.php' method='post'>";
					echo "<input type='hidden' name='id' value='".$arreglo[$i]['id']."'/>";
					echo "<input type='hidden' name='nombre' value='".$arreglo[$i]['nombre']."'/>";
					echo "<input type='hidden' name='tipo' value='".$arreglo[$i]['tipo']."'/>";
					echo "<input type='hidden' name='admin' value='".$arreglo[$i]['admin']."'/>";
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
