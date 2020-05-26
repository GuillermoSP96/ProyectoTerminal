<?php
	require '../conexion.php';
	$boton = $_POST['boton'];
	$id=$_POST['id'];
	$nombre= $_POST['nombre'];
	$pass= $_POST['pass'];
	if($boton=="Insertar"){
		$query="insert into usuario values (null,'".$nombre."','".$pass."');";
		if($conn->query($query)){
			header("Location: Usuario.php");
		} 
		else 
		{
			echo "Error: ".$conn->error;
		}
		$conn->close();
	}
	if($boton=="Actualizar")
	{		
		$query ="update usuario set nombreU='".$nombre."',contrasenia='".$pass."' where idusuario=".$id.";";
		if($conn->query($query)){
			header("Location: Usuario.php");
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
		header("Location: Usuario.php");
		$conn->close();
	}
?>
