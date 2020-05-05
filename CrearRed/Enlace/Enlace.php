	<?php
		require '../conexion.php';
		//the SQL query to be executed
		$query = "SELECT * FROM enlace;";
		//initialize the array to store the processed data
		$result = $conn->query($query);
		$arreglo = array();
		//check if there is any data returned by the SQL Query
		if ($result->num_rows > 0) {
			//Converting the results into an associative array
			//idenlace, Interface_idinterface, Interface_idinterface1
			 while($row = $result->fetch_assoc()) {
				 $item = array();
				 $item['id'] = $row['idenlace'];
				 $item['disp1'] = $row['Interface_idinterface'];
				 $item['disp2'] = $row['Interface_idinterface1'];
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
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../CSS/estilo.css">
		<H1 id="titulo" >Tabla de Enlaces</H1>
		<title>Enlaces</title>
		<meta charset="UTF-8"/>
	</head>
	<body style="">
		<table border=1 id="centro" method='post'>
			<tr>
				<th>ID</th><th>Dispositivo 1</th><th>Dispositivo 2</th>
				<th>
					<form name="formulario" method="post" action="formulario.php">
						<input type='submit' name='boton' value='Insertar'/>
					</form>
				</th></tr>
				<?php
				for($i=0;$i<count($arreglo);$i++) {
						echo "<tr>";
						echo "<td>".$arreglo[$i]['id']."</td>";
						echo "<td>".$arreglo[$i]['disp1']."</td>";
						echo "<td>".$arreglo[$i]['disp2']."</td>";
						echo "<td>";
						echo "<form action='validaDatosEnlace.php' method='post'>";
						echo "<input type='hidden' name='id' value='".$arreglo[$i]['id']."'/>";
						echo "<input type='hidden' name='disp1' value='".$arreglo[$i]['disp1']."'/>";
						echo "<input type='hidden' name='disp2' value='".$arreglo[$i]['disp2']."'/>";
						echo "<input type='submit' name='boton' value='Modificar'/>";
						echo "</form>";
						echo "</td>";
						echo "</tr>";
					}
				?>
			</table>
		</body>
		</html>
