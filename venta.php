<?php
session_start();
require ("conexion.php");

$fecha = $_POST['date'];
$vendedor = $_POST['vendedor'];
$cliente = $_POST['cliente'];

$recupera = "INSERT INTO venta ( Fechaventa, Idvendedor, Idcliente) VALUES ('$fecha','$vendedor','$cliente')";
$objeto->consulta($recupera);

echo $id= mysql_insert_id ($objeto->cnx);
$_SESSION['venta'] = $id;

?>