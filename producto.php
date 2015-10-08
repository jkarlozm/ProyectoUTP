<?php
require("conexion.php");
$idproducto = $_POST['idproducto'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$idventa = $_POST['idventa'];
$ori = $_POST['origen'];
$des = $_POST['destino'];

$consul = "SELECT Cantidadexistente FROM autobuses WHERE Idproducto='$idproducto'";
$objeto->consulta($consul);
$row = $objeto->extraer_registros();
if($row['Cantidadexistente'] == 0)
{
	echo "Lugares agotado $row[Cantidadexistente] Lugares.";
}
else if($cantidad > $row['Cantidadexistente'])
{
	echo "Solo quedan $row[Cantidadexistente] lugares";
}
else
{
$consul = "INSERT INTO detallesventa (Idproducto,Precio,Cantidad,Idventa, Origen, Destino) values 
('$idproducto','$precio','$cantidad','$idventa', '$ori', '$des')";
if($objeto->consulta($consul))
{	
	$consul = "UPDATE autobuses SET Cantidadexistente=Cantidadexistente-$cantidad where Idproducto='$idproducto'";
	if($objeto->consulta($consul))
	{
		echo "El producto se a agregado correctamente";
	}
	else
	{
		echo "Consulta Fallida";
	}
}
else
{
	echo "Consulta Fallida";
}
}
?>