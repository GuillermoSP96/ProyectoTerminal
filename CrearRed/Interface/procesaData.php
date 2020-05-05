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
		//$query="update dispositivo set Nombre='".$nombre."',Edad=".$edad.",Genero=".$gen.", Nivel_Estudios=".$nivEst.", EDO_CIVIL_idEDO_CIVIL=".$idEC.", Pais_Nacimiento=".$idpN.", Pais_Origen=".$idpO." where idPERSONA=".$id.";";
		
		$query ="update dispositivo set nombreD='".$nombre."',tipo ='".$tipo."',Usuario_idusuario=".$admin." where idDispositivo=".$id.";";
		if($conn->query($query)){
			header("Location: Dispositivo.php");
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
		header("Location: Dispositivo.php");
		$conn->close();
	}
?>
