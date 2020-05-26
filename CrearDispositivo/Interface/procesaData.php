<?php
	require '../conexion.php';
	$boton = $_POST['boton'];
	$id=$_POST['id'];
	$nombre= $_POST['nombre'];
	$ip= $_POST['ip'];
	$estado= $_POST['estado'];
	$disp= $_POST['disp'];
	if($boton=="Insertar"){
		$query="insert into interface values (null,'".$nombre."','".$ip."','".$estado."',".$disp.");";
		if($conn->query($query)){
			header("Location: Interface.php");
		}
		else
		{
			echo "Error: ".$conn->error;
		}
		$conn->close();
	}
	if($boton=="Actualizar")
	{
		$query ="update interface set nombreI='".$nombre."',ip ='".$ip."',estado='".$estado."',Dispositivo_idDispositivo=".$disp." where idinterface=".$id.";";
		if($conn->query($query)){
			header("Location: Interface.php");
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
		header("Location: Interface.php");
		$conn->close();
	}
?>
