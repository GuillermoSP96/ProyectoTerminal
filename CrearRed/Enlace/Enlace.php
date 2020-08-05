	<?php
		require '../conexion.php';
		$query = "SELECT idenlace,nomD1, idIntDisp1, nomInt1, nomD2, idIntDisp2, nomInt2 FROM vistacompletacompleta;";
		$result = $conn->query($query);
		$arreglo = array();
		if ($result->num_rows > 0) {
			// nomD1, idIntDisp1, nomInt1, nomD2, idIntDisp2, nomInt2
			 while($row = $result->fetch_assoc()) {
				 $item = array();
				 $item['id'] = $row['idenlace'];
				 $item['nomD1'] = $row['nomD1'];
				 $item['idIntDisp1'] = $row['idIntDisp1'];
				 $item['nomInt1'] = $row['nomInt1'];
				 $item['nomD2'] = $row['nomD2'];
				 $item['idIntDisp2'] = $row['idIntDisp2'];
				 $item['nomInt2'] = $row['nomInt2'];
			 array_push($arreglo, $item);
			 }
		 }
		 else{
		 echo "<p>Empty</p>";
		 }
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
				<th>Enlace disp1</th><th>Enlace disp2</th>
				<th>
					<form name="formulario" method="post" action="formulario.php">
						<input type='submit' name='boton' value='Insertar'/>
					</form>
				</th><th>Borrar</th></tr>
				<?php
				for($i=0;$i<count($arreglo);$i++) {
						echo "<tr>";
						echo "<td>".$arreglo[$i]['nomD1']."-->".$arreglo[$i]['nomInt1']."</td>";
						echo "<td>".$arreglo[$i]['nomD2']."-->".$arreglo[$i]['nomInt2']."</td>";
						echo "<td>";
						echo "<form action='validaDatosEnlace.php' method='post'>";
						echo "<input type='hidden' name='id' value='".$arreglo[$i]['id']."'/>";
						echo "<input type='hidden' name='idIntDisp1' value='".$arreglo[$i]['idIntDisp1']."'/>";
						echo "<input type='hidden' name='idIntDisp2' value='".$arreglo[$i]['idIntDisp2']."'/>";
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
