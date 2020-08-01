<?php
$modo = array();
array_push($modo, 'configuracion');
array_push($modo, 'consulta');

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
	<form id="formu"name="formulario" method="get" style="color: white;" action="ejecucion.php">
		<ul>
			<li>
				<label for="name">Comando:</label>
				<input type="text" name="comando" value="<?=$comando;?>"><br/><br/>
			</li>
			<li>
				<label for="modo">Modo:</label>
				<select style="margin-left: 20px" name="modo">
						<?php
						for ($i = 0; $i < count($modo); $i++) {
							if ($modo[$i] == $modos) {
								echo "<option value=" . $modo[$i] . " selected>" . $modo[$i] . "</option>";
							} else {
								echo "<option value=" . $modo[$i] . ">" . $modo[$i] . "</option>";
							}
						}
						?>
				</select><br/><br/>
			</li>
			<button name="boton">Enviar Consulta</button>
			</ul>
			</form>
</body>
</html>
