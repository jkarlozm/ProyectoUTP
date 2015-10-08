<?php
require('conexion.php');
$fe = $_POST['fecha'];
$tp = $_POST['tpago'];
$idv = $_POST['idventas'];

$consult = "INSERT INTO factura (Fechaexpedicion, Lugarexpedicion, Idventa, Idpago) VALUE 
('$fe', 'Centro, Puebla', '$idv', '$tp')";

if($objeto->consulta($consult))
{
echo "Datos Agregados";
}
else
{
echo "Error!!";
}
?>