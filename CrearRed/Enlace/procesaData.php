<?php
	require '../conexion.php';
	$boton = $_POST['boton'];
	$id=$_POST['id'];
	$nombre= $_POST['nombre'];
	$tipo= $_POST['tipo'];
	$admin= $_POST['admin'];

	$disp1= $_POST['disp1'];
	$disp2= $_POST['disp2'];

	if($boton=="Insertar"){
		$query="insert into webcucme.enlace values (null,".$disp1.",".$disp2.");";
		if($conn->query($query)){
			header("Location: Enlace.php");
		}
		else
		{
			echo "Error: ".$conn->error;
		}
		$conn->close();
	}
	if($boton=="Borrar"){
		$query="DELETE FROM webcucme.enlace WHERE idenlace = ".$id.";";
		if($conn->query($query)){
			header("Location: Enlace.php");
		}
		else
		{
			echo "Error: ".$conn->error;
		}
		$conn->close();
	}
	if($boton=="Actualizar")
	{
		$query ="UPDATE enlace set Interface_idinterface=$disp1,Interface_idinterface1=$disp2 where idenlace=$id;";
		if($conn->query($query)){
			header("Location: Enlace.php");
		}
		else
		{
			echo "Error: ".$conn->error;
		}
		$conn->close();
	}
	if($boton=="Modificar"){
		header("Location: formulario.php");
		$conn->close();
	}
	if($boton=="Cambiar"){
		echo "<form name=\"formulario\" method=\"post\" action=\"procesaData.php\">";
		$boton="Cambiar";
		header("Location: formulario.php");
		$conn->close();
	}
	if($boton=="Cancelar"){
		header("Location: Enlace.php");
		$conn->close();
	}
?>
