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
			<button name="boton">Enviar Consulta</button>
			</ul>
			</form>
</body>
</html>
