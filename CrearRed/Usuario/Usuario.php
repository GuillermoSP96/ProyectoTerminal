	<?php
		require '../conexion.php';
		//the SQL query to be executed
		$query = "SELECT * FROM usuario;";
		//initialize the array to store the processed data
		$result = $conn->query($query);
		$arreglo = array();
		//check if there is any data returned by the SQL Query
		if ($result->num_rows > 0) {
			//Converting the results into an associative array
			// idusuario, nombreU, contrasenia
			 while($row = $result->fetch_assoc()) {
				 $item = array();
				 $item['id'] = $row['idusuario'];
				 $item['nombre'] = $row['nombreU'];
				 $item['pass'] = $row['contrasenia'];
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
		<H1 id="titulo" >Tabla de Usuarios</H1>
		<title>Usuarios</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="../CSS/estilo.css">
	</head>
	<body >
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
				<th>ID</th><th>Nombre</th>
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
						echo "<td>";
						echo "<form action='validaDatosUsuario.php' method='post'>";
						echo "<input type='hidden' name='id' value='".$arreglo[$i]['id']."'/>";
						echo "<input type='hidden' name='nombre' value='".$arreglo[$i]['nombre']."'/>";
						echo "<input type='hidden' name='pass' value='".$arreglo[$i]['pass']."'/>";
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
