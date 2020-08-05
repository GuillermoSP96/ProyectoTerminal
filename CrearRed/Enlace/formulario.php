<?php
$boton=$_POST['boton'];

	if($boton=="Insertar"){
		$disp1='';
		$disp2='';
	}
	if($boton=="Modificar"){
		$disp1=$_POST['disp1'];
		$disp2=$_POST['disp2'];
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
<!DOCTYPE HTML>
<html >
<head>
	<link rel="stylesheet" href="../CSS/estilo.css">
	<title>Enlaces</title>
	<meta charset="UTF-8"/>
</head>
<body>
	<form id="formu"name="formulario" method="get" action="validaDatos.php">
		<ul>
			<li>
				<label for="idIntDisp1">Interfaz de disp 1:</label>
				<select style="margin-left: 20px" name="idIntDisp1">
					<?php
					for($i=0;$i<count($arreglo);$i++)
						if($arreglo[$i]['idinterface']==$idIntDisp1)
							echo "<option value=".$arreglo[$i]['idinterface']." selected>".$arreglo[$i]['nombreD']." | ".$arreglo[$i]['nombreI']."-->".$arreglo[$i]['ip']."</option>";
						else
							echo "<option value=".$arreglo[$i]['idinterface'].">".$arreglo[$i]['nombreD']." | ".$arreglo[$i]['nombreI']."-->".$arreglo[$i]['ip']."</option>";
					?>
				</select><br/><br/>
			</li>
			<li>
				<label for="idIntDisp2">Interfaz de disp 2:</label>
				<select style="margin-left: 20px" name="idIntDisp2">
					<?php
					for($i=0;$i<count($arreglo);$i++)
						if($arreglo[$i]['idinterface']==$idIntDisp2)
							echo "<option value=".$arreglo[$i]['idinterface']." selected>".$arreglo[$i]['nombreD']." | ".$arreglo[$i]['nombreI']."-->".$arreglo[$i]['ip']."</option>";
						else
							echo "<option value=".$arreglo[$i]['idinterface'].">".$arreglo[$i]['nombreD']." | ".$arreglo[$i]['nombreI']."-->".$arreglo[$i]['ip']."</option>";
					?>
				</select><br/><br/>
			</li><button name="boton">Enviar Consulta</button>
		</ul>
	</form>
</body>
</html>
