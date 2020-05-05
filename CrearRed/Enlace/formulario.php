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

require "../conexion.php";

$query = "SELECT * from dispositivo;";

$enlaces = array();
if ($result = $conn->query($query)) {
	while($row = $result->fetch_assoc()) {
		$item = array();
		// idDispositivo, nombreD, tipo, Usuario_idusuario
		$item['id'] = $row['idDispositivo'];
		$item['nombre'] = $row['nombreD'];
		$item['tipo'] = $row['tipo'];
		array_push($enlaces, $item);
	}
}
else{
	echo "<p>Empty</p>";
}
?>
<!DOCTYPE HTML>
<html lang="es" style="background-image: url(/wallpapers/wallpaper.jpg);">
<head>
	<link rel="stylesheet" href="../CSS/estilo.css">
	<title>Enlaces</title>
	<meta charset="UTF-8"/>
</head>
<body>
	<form id="formu"name="formulario" method="get" action="validaDatos.php">
		<ul>
			<li>
				<label for="disp1">Dispositivo 1:</label>
				<!-- <input type="text" name="tipo" value="<?=$tipo;?>"><br/><br/>-->
				<select style="margin-left: 20px" name="disp1">
					<?php
					for($i=0;$i<count($enlaces);$i++)
						if($enlaces[$i]['id']==$disp1)
							echo "<option value=".$enlaces[$i]['id']." selected>".$enlaces[$i]['nombre']."</option>";
						else
							echo "<option value=".$enlaces[$i]['id'].">".$enlaces[$i]['nombre']."</option>";
					?>
				</select><br/><br/> 
			</li>
			<li>
				<label for="disp2">Dispositivo 2:</label>
				<!-- <input type="text" name="tipo" value="<?=$tipo;?>"><br/><br/>-->
				<select style="margin-left: 20px" name="disp2">
					<?php
					for($i=0;$i<count($enlaces);$i++)
						if($enlaces[$i]['id']==$disp2)
							echo "<option value=".$enlaces[$i]['id']." selected>".$enlaces[$i]['nombre']."</option>";
						else
							echo "<option value=".$enlaces[$i]['id'].">".$enlaces[$i]['nombre']."</option>";
					?>
				</select><br/><br/> 
			</li>
			<button name="boton">Enviar Consulta</button> 
		</ul>
	</form>
</body>
</html>