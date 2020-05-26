<?php
$boton = $_POST['boton'];

if ($boton == "Insertar") {
    $nombre = '';
    $tipo   = '';
   // $admin  = '';
}
if ($boton == "Modificar") {
    $nombre = $_POST['nombre'];
    $tipo   = $_POST['tipo'];
    //$admin  = $_POST['admin'];
}
$tipoDisp = array();
array_push($tipoDisp, 'router');
array_push($tipoDisp, 'switch');
array_push($tipoDisp, 'cucme');

require "../conexion.php";

/*$query = "SELECT idusuario, nombreU from usuario;";

$usuario = array();
if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $item           = array();
        $item['id']     = $row['idusuario'];
        $item['nombre'] = $row['nombreU'];
        array_push($usuario, $item);
    }
} else {
    echo "<p>Empty</p>";
}*/
?>
<!DOCTYPE HTML>
<html >
<head>
	<link rel="stylesheet" href="../CSS/estilo.css">
	<title>Dispositivos</title>
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
				<label for="tipo">Tipo:</label>
				<!-- <input type="text" name="tipo" value="<?=$tipo;?>"><br/><br/>-->
				<select style="margin-left: 20px" name="tipo">
						<?php
for ($i = 0; $i < count($tipoDisp); $i++) {
    if ($tipoDisp[$i] == $tipo) {
        echo "<option value=" . $tipoDisp[$i] . " selected>" . $tipoDisp[$i] . "</option>";
    } else {
        echo "<option value=" . $tipoDisp[$i] . ">" . $tipoDisp[$i] . "</option>";
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
