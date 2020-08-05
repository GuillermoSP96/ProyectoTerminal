<?php
	$boton=$_POST['boton'];
	if($boton=="Modificar"){
		$id= $_POST['id'];
		$idIntDisp1= $_POST['idIntDisp1'];
		$idIntDisp2= $_POST['idIntDisp2'];
	}
	require '../conexion.php';
	$query = "SELECT * from dispositivointerfaz;";
	$result = $conn->query($query);
	$arreglo = array();
	if ($result->num_rows > 0) {
		// nombreD, idinterface, nombreI, ip
		 while($row = $result->fetch_assoc()) {
			 $item = array();
			 $item['nombreD'] = $row['nombreD'];
			 $item['idinterface'] = $row['idinterface'];
			 $item['nombreI'] = $row['nombreI'];
			 $item['ip'] = $row['ip'];
		 array_push($arreglo, $item);
		 }
	 }
	 else{
	 		echo "<p>Empty</p>";
	 }
?>
<html >
	<head>
		<link rel="stylesheet" href="../CSS/estilo.css">
	</head>
	<body>
		<form id="formu"name="formulario" method="post" style="color: white;" action="procesaData.php">
			<input type="hidden" name="id" value="<?=$id;?>" /><br/>
				<ul>
					<input type="hidden" name="id" value="<?=$id;?>" /><br/>
					<li>
						<label for="disp1">Interfaz de disp 1:</label>
						<select style="margin-left: 20px" name="disp1">
							<?php
								for($i=0;$i<count($arreglo);$i++)
								if($arreglo[$i]['idinterface']==$idIntDisp1)
									echo "<option value=".$arreglo[$i]['idinterface']." selected>".$arreglo[$i]['nombreD']."|".$arreglo[$i]['nombreI']."-->".$arreglo[$i]['ip']."</option>";
									else
									echo "<option value=".$arreglo[$i]['idinterface'].">".$arreglo[$i]['nombreD']."|".$arreglo[$i]['nombreI']."-->".$arreglo[$i]['ip']."</option>";
							 ?>
						</select><br/><br/>
					</li>
					<li>
							<label for="disp2">Interfaz de disp 2:</label>
							<select style="margin-left: 20px" name="disp2">
								<?php
								for($i=0;$i<count($arreglo);$i++)
								if($arreglo[$i]['idinterface']==$idIntDisp2)
								echo "<option value=".$arreglo[$i]['idinterface']." selected>".$arreglo[$i]['nombreD']."|".$arreglo[$i]['nombreI']."-->".$arreglo[$i]['ip']."</option>";
								else
								echo "<option value=".$arreglo[$i]['idinterface'].">".$arreglo[$i]['nombreD']."|".$arreglo[$i]['nombreI']."-->".$arreglo[$i]['ip']."</option>";
								?>
							</select><br/><br/>
						</li>
				<input type="submit" name="boton" value="Actualizar" style="width: 90px" />
				<input type="submit" name="boton" value="Cancelar" style="width: 90px; margin-left: 10px"/>
			</ul>
		</form>
	</body>
</html>
