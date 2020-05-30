<?php
	$nombre= $_POST['nombre'];
	$ipv4= $_POST['ipv4'];
	if(empty($_POST['pssh'])){
     $pssh = 22;
	}
	else {
		$pssh=intval($_POST['pssh']);
	}
	$usuario= $_POST['usuario'];
	$passSSH= $_POST['passSSH'];
	$passEN= $_POST['passEN'];
?>
<!DOCTYPE html>
<html >
	<head>
		<link rel="stylesheet" href="../CSS/estilo.css">
		<title>Interfaces</title>
	</head>
	<body>
		<?php

		$cisco = new stdClass();
		$cisco->nombre = $nombre;
		$cisco->ip = $ipv4;
		$cisco->puerto = $pssh;
		$cisco->usuario = $usuario;
		$cisco->passSSH = $passSSH;
		$cisco->passEN = $passEN;
		$json = json_encode($cisco);
			#$sal=exec("python3.6 ../conect/crearDisp.py '".$nombre."' '.$ipv4.' '.$pssh.' '.$usuario.' '.$contraseniassh.' '.$contraseniaenable.'",$salida);
			exec("python3.6 ../conect/crearDisp.py '".$json."'",$salida);
			echo "<pre>";
			foreach($salida as &$valor)
			{
					echo $valor.'<br/>';
			}
			echo "</pre>";
		?>
	</body>
</html>
