<?php
	$nombre= $_POST['nombre'];
	$ipv4= $_POST['ipv4'];
	if(!empty($_POST['pssh'])){
     $pssh = 22;
	}
	else {
		$pssh=$_POST['pssh'];
	}
	$usuario= $_POST['usuario'];
	$contraseniassh= $_POST['contraseniassh'];
	$contraseniaenable= $_POST['contraseniaenable'];
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
		$json = json_encode($cisco);
			$sal=exec("python3.6 conect/crearDisp.py '".$nombre."' '.$ipv4.' '.$pssh.' '.$usuario.' '.$contraseniassh.' '.$contraseniaenable.'",$salida);
			//$sal=exec("python3.6 conect/crearDisp.py '".$json."'",$salida);
			echo "<pre>";
			echo $sal;
			foreach($salida as &$valor)
			{
					echo $valor.'<br/>';
			}
			echo "</pre>";
		?>
	</body>
</html>
