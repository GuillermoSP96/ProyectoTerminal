<!DOCTYPE html>
<html>
<head>
	<?php

	require "conexion.php";

	$query = "SELECT * from dispositivo;";

	$dispositivo = array();
	if ($result = $conn->query($query)) {
		while($row = $result->fetch_assoc()) {
			$item = array();
			//idDispositivo, nombreD, tipo, Usuario_idusuario
			$item['id'] = $row['idDispositivo'];
			$item['nombre'] = $row['nombreD'];
			$item['tipo'] = $row['tipo'];
			$item['usuario'] = $row['Usuario_idusuario'];
			array_push($dispositivo, $item);
		}
	}
	else{
		echo "<p>Empty</p>";
	}
	 ?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>INTERFACES</title>
</head>
<body>
	<?php
	    $texto='sh ip int br';
		exec("python conexion.py '".$texto."'",$salida);
		echo "<pre>";
		foreach($salida as &$valor)
		{
		    echo $valor.'<br/>';
		}
		echo "</pre>";
	?>
		<form id="formu"name="formulario" method="post" style="color: white;" action="procesaData.php">
			<ul>
					<li>
						<label for="admin">Administrador:</label>
						<!-- <input type="text" name="tipo" value="<?=$tipo;?>"><br/><br/>-->
						<select name="admin">
							<?php
							for($i=0;$i<count($dispositivo);$i++)
								if($dispositivo[$i]['id']==$admin)
									echo "<option value=".$dispositivo[$i]['id']." selected>".$dispositivo[$i]['nombre']."</option>";
								else
									echo "<option value=".$dispositivo[$i]['id'].">".$dispositivo[$i]['nombre']."</option>";
								?>
							</select><br/><br/>
						</li>
						<input type="submit" name="boton" value="Actualizar" style="width: 90px" /><input type="submit" name="boton" value="Cancelar" style="width: 90px; margin-left: 10px"/>
					</li>
				</ul>
			</form>
</body>
</html>
