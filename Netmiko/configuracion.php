
<?php
	$modos = array();
	array_push($modos, 'configuracion');
	array_push($modos, 'consulta');
	$comando= $_GET['comando'];
	$modo= $_GET['modo'];

?>
<!DOCTYPE html>
<html>
<head
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/estilo.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>INTERFACES</title>
</head>
<body>
	<div class="wrapper">
	<div class="box box1">
	<form id="formu"name="formulario" method="get" style="color: white;" action="configuracion.php">
		<ul>
			<li>
				<label for="name">Comando:</label>
				<input type="text" name="comando" value="<?=$comando;?>"><br/><br/>
			</li>
			<li>
				<label for="modo">Modo:</label>
				<select style="margin-left: 20px" name="modo">
						<?php
						for ($i = 0; $i < count($modos); $i++) {
							if ($modos[$i] == $modos1) {
								echo "<option value=" . $modos[$i] . " selected>" . $modos[$i] . "</option>";
							} else {
								echo "<option value=" . $modos[$i] . ">" . $modos[$i] . "</option>";
							}
						}
						?>
				</select><br/><br/>
			</li>
			<button name="boton">Enviar Consulta</button>
			</ul>
			</form>
		</div>
		<div id="salida" class="box box2">
			<scroll-container>
	<?php
		$commandP=exec("python3.6 conect/conexion.py '".$comando."' ".$modo." 2>&1",$salida);
		echo $commandP."<br>";
		echo "<pre>";
		foreach($salida as &$valor)
		{
		    echo $valor.'<br/>';
		}
		echo "</pre>";
	?></scroll-container>
</div>
</div>
</body>
</html>
