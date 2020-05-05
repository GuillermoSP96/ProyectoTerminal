<?php
	$boton=$_POST['boton'];

	if($boton=="Insertar"){
		$nombre='';
		$pass='';
	}
	if($boton=="Modificar"){
		$nombre=$_POST['nombre'];
		$pass=$_POST['pass'];	
	}
?>
<!DOCTYPE HTML>
<html lang="es" style="background-image: url(/wallpapers/wallpaper.jpg);">
    <head>
    	<link rel="stylesheet" href="../CSS/estilo.css">
        <title>Usuarios</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
		<form id="formu"name="formulario" method="get" style="color: white;" action="validaDatos.php">
			<ul>
				<li>
					<label for="name">Nombre:</label>
					<input style="margin-left: 20px" type="text" name="nombre" value="<?=$nombre;?>"><br/><br/>
				</li>
				<li>
					<label for="pass">Contraseña:</label>
					<input style="margin-left: 20px" type="password" name="pass" value="<?=$pass;?>"><br/><br/>
				</li>
				<input type="submit" name="boton" value="Enviar Consulta" style="margin-top: 5px" />
			</ul>
		</form>
	</body>
</html>