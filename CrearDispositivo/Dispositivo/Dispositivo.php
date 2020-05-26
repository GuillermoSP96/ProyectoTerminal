<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<link rel="stylesheet" href="../CSS/estilo.css">
		<meta charset="utf-8">
		<title>Crear Dispositivo</title>
	</head>
	<body>
		<form id="formu" name="formulario" method="post" action="Interfaces.php">
			<ul>
				<li>
					<label for="name">Nombre:</label>
					<input type="text" name="nombre" value="<?=$nombre;?>"><br/><br/>
				</li>
				<li>
					<label for="name">IPV4:</label>
					<input type="text" name="ipv4" value="<?=$ipv4;?>"><br/><br/>
				</li>
				<li>
					<label for="name">Puerto SSH:</label>
					<input type="text" name="pssh" value="<?=$pssh;?>" placeholder="Puerto por defecto 22"><br/><br/>
				</li>
				<li>
					<label for="name">Usuario:</label>
					<input type="text" name="usuario" value="<?=$usuario;?>"><br/><br/>
				</li>
				<li>
					<label for="name">Contraseña SSH:</label>
					<input type="password" name="contraseniassh" value="<?=$contraseniassh;?>"><br/><br/>
				</li>
				<li>
					<label for="name">Contraseña Enable:</label>
					<input type="password" name="contraseniaenable" value="<?=$contraseniaenable;?>"><br/><br/>
				</li>
				<button name="boton">Empezar</button>
			</ul>
		</form>
	</body>
</html>
