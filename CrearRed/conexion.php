<?php
	$servername = "localhost";
	$username = "admin";
	$password = "password123";
	$dbName = "webcucme";
	
	$conn	= new mysqli($servername, $username, $password, $dbName);
/*
	if ($conn->connect_error) 
	{
		echo "Conexion Fallida";
	} 
	else 
	{
		echo "Conexion Exitosa";
	}
*/
?>