<?php
session_start();
require("conexion.php");
$mail = $_POST['user'];
$pw = $_POST['password'];
$consul = "SELECT * FROM registro WHERE Correo='$mail' and Contrasena='$pw'";
if($objeto->consulta($consul))
{
	if($objeto->contarRenglones()>0)
	{
		$row = $objeto->extraer_registros();		
		$_SESSION['idvendedor'] = $row['Idvendedor'];
		$_SESSION['vendedor'] = $row['Nombre'];
		header("Location:myMenu.html");
	}
	else
	{
		header("Location:index.php");
	}
}
else
{
	echo "fallo la consulta";
}

?>