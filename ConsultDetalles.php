<?php

require ('conexion.php');
$v1=$_POST['idProdSel'];
$comando="Select * from autobuses where(Idproducto ='$v1')";;
$resul=$objeto->consulta($comando);

while ($sacarDatos=$objeto->extraer_registros())
{
$datos=array("ori"=>$sacarDatos[2], "des"=>$sacarDatos[3], "numero"=>$sacarDatos[8], "prec"=>$sacarDatos[7], "hora"=>$sacarDatos[5], "linea"=>$sacarDatos[9],
 "fecha"=>$sacarDatos[6], "fot"=>$sacarDatos[10], "cantidad"=>$sacarDatos[11]);
echo json_encode($datos);
}

?>