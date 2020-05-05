<?php
	$boton=$_POST['boton'];
	if($boton=="Modificar"){
		$id=$_POST['id'];
		$nombre=$_POST['nombre'];
		$pass=$_POST['pass'];
	}
?>
<html style="background-image: url(/wallpapers/wallpaper.jpg);">
	<head>
		<link rel="stylesheet" href="../CSS/estilo.css">
	</head>
	<body>
		<form id="formu"name="formulario" method="post" style="color: white;" action="procesaData.php">
			<input type="hidden" name="id" value="<?=$id;?>" /><br/>
			<ul>
				<input type="hidden" name="id" value="<?=$id;?>" /><br/>
				<li>
					<label for="name">Nombre:</label>
					<input type="text"   name="nombre" value="<?=$nombre;?>" /><br/><br/>
				</li>
				<li>
					<label for="pass">Contraseña:</label>
					<input type="password" name="pass" value="<?=$pass;?>" /><br/><br/>
				</li>
				<input type="submit" name="boton" value="Actualizar" style="width: 90px" />
				<input type="submit" name="boton" value="Cancelar" style="width: 90px; margin-left: 10px"/>
			</ul>
		</form>
	</body>
</html>