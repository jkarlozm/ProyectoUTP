<?php
require ('conexion.php');

$viaje = $_POST['v'];
$origen = $_POST['o'];
$destino = $_POST['d'];
$tviaje = $_POST['tv'];
$hsalida = $_POST['hs'];
$fsalida = $_POST['fs'];
$pboleto = $_POST['pb'];
$nautobus = $_POST['nau'];
$lautobus = $_POST['la'];
$fautobus = $_POST['f'];
$cantidad = $_POST['c'];

$comando = "INSERT INTO autobuses (viaje, origen, destino, tiemviaje,
hrsalida, fesalida, precioboleto, numautobus, lineaautobus, Foto, Cantidadexistente) 
VALUES ('$viaje', '$origen', '$destino', '$tviaje', '$hsalida', '$fsalida', 
'$pboleto', '$nautobus', '$lautobus', '$fautobus', '$cantidad')";

$result = $objeto -> consulta($comando);

if($result)
{
?>
<script language="javascript">
   alert ("Registro Agregado");
</script>
<?php
}
else
{
?>
<script language="javascript">
   alert ("ERROR");
</script>
<?php
}

?>
