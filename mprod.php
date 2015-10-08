<?php
require("conexion.php");
$idventa=$_POST['idventa'];
$consul = "SELECT Precio, Cantidad, viaje, detallesventa.Origen, detallesventa.Destino
FROM detallesventa
INNER JOIN autobuses ON detallesventa.Idproducto = autobuses.Idproducto
WHERE detallesventa.Idventa = '$idventa'";
$objeto->consulta($consul);
if($objeto->consulta($consul))
{
   $numren=$objeto->contarRenglones();
   if ($numren==0)
   {
   echo "La base de Datos esta vacia"; 
   }else
   {
      echo "<table border=1 style='text-align: center;'><tr><td>Viaje</td><td>Precio</td><td>Cantidad</td><td>Origen</td><td>Destino</td></tr>";
      while ($rowp= $objeto->extraer_registros()){
         echo "<tr>";
         echo"<td>".$rowp['viaje']."</td>";
         echo"<td>".$rowp['Precio']."</td>";
         echo"<td>".$rowp['Cantidad']."</td>";
         echo"<td>".$rowp['Origen']."</td>";
         echo"<td>".$rowp['Destino']."</td>";
         echo "</tr>";		 
      }
      echo "</table>";	  
   }
   
}else 
{
   echo "fallo la consulta";
}

?>
