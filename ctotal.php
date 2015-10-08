<?php
require ("conexion.php");
$idven = $_POST['idventa'];
$recupera = "SELECT Iddetalles, Idproducto, Precio, Cantidad FROM detallesventa WHERE Idventa='$idven'";
if($objeto->consulta($recupera))
{
   $subtotal = 0;
   $total = 0;
   while($row = $objeto->extraer_registros())
   {
      $subtotal=$subtotal+($row['Precio']*$row['Cantidad']);
   }
   $iva = ($subtotal*0.16);
   $total=($subtotal*0.16)+$subtotal;
   $info = array("subtotal"=>$subtotal,"total"=>$total, "iva"=>$iva, "error"=>false);
}
else
{
   $info = array("subtotal"=>$subtotal,"total"=>$total, "iva"=>$iva, "error"=>true);
}
echo json_encode($info);
?>
