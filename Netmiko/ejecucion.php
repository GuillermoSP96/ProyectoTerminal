
<?php
	$modos = array();
	array_push($modos, 'configuracion');
	array_push($modos, 'consulta');
	$comando= $_GET['comando'];
	$modo= $_GET['modo'];
	echo $comando;
?>
<!DOCTYPE html>
<html>
<head
	<meta charset="UTF-8">
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
	<?php
		exec("python3.6 conect/conexion.py '".$comando."' ".$modo,$salida);
		echo "<pre>";
		foreach($salida as &$valor)
		{
		    echo $valor.'<br/>';
		}
		echo "</pre>";
	?>

</body>
</html>
