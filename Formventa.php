<?php
session_start();
if(!isset($_SESSION['vendedor']))
{
	header("Location:Index.php");
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Ventas</title>
<meta name="generator" content="WYSIWYG Web Builder 8 - http://www.wysiwygwebbuilder.com">
</head>
<body>

<table border="0" cellspacing="10" class="contacto">
<tr>
<td align="center"><!--Datos venta y vendedor-->
<form>
<input type="hidden" id="idvendedor" value="<?php echo $_SESSION['idvendedor'];?>">
<label>Vendedor:</label> <input type="text" style="width:200px; text-align:center;" id="Editbox1" name="vendedor" value="<?php echo $_SESSION['vendedor'];?>"/>
<br />
<label>Venta:</label> <input type="text" id="Editbox2" style="width:200px; text-align:center;" name="venta" value="<?php echo isset( $_SESSION['venta'])?$_SESSION['venta']:0; ?>"/>
<br />
<label>Fecha:</label> <input type="date" id="Editbox3" style="width:200px; text-align:center;" name="fecha" value="" />
<br/>
<!--Combo Cliente-->
<?php
    require ('conexion.php');
	$recupera="select IdCliente, Nombre from clientes";
	$objeto->consulta($recupera);
	$numero=$objeto->contarRenglones();
	?>
<label>cliente:</label> <select name="cliente" size="1" id="Combobox1" >
<?php
		while ($row = $objeto->extraer_registros ())
			{	$n=$row[1];
				echo "<option value='".$row[0]."'> ". $n."</option>";
			}		
         ?>
</select>

<br />
<!--Boton Registrar Venta-->
<input type="button" id="Button1" onclick="Rventa()" name="" value="Registrar Venta" /></td>
</form>
<td></td>
</tr>
<tr>
<td align="center">
<!--Total, IVA, Subtotal-->
<input type="text" name="subtotal" id="txtsubtotal" placeholder="Subtotal" style="width:200px; text-align:center;"><br />
<input type="text" name="iva" id="txtIVA" placeholder="IVA 16%" style="width:200px; text-align:center;"><br />
<input type="text" name="total" id="txttotal" placeholder="Total" style="width:200px; text-align:center;"><br />
<!--Combobox forma de pago-->
<?php
    $recupera="select Idpago, Formapago from formapago";
	$objeto->consulta($recupera);
	$numren=$objeto->contarRenglones();
	?>
<select id="Combobox5">
<?php
		while ($row = $objeto->extraer_registros ())
			{	$n=$row[1];
				echo "<option value='".$row[0]."'> ". $n."</option>";
			}		
         ?>
</select><br />
<input type="button" value="Factura" onclick="Pcfac()">
</td>
<td align="center"><!--Datos producto-->
<form>
<!--Combo Productos-->
<?php
    $recupera="select Idproducto, viaje from autobuses";
	$objeto->consulta($recupera);
	$numren=$objeto->contarRenglones();
	?>
<label>Viajes:</label> <select name="boleto" size="1" id="Combobox2" onchange="enviarProducto()" >
<?php
		while ($row = $objeto->extraer_registros ())
			{	$n=$row[1];
				echo "<option value='".$row[0]."'> ". $n."</option>";
			}		
         ?>
</select> <br />
<label>Origen:</label> <input type="text" name="origen" id="txtorigen" style="width:200px; text-align:center;"/><br />
<label>Destino:</label> <input type="text" name="destino" id="txtdestino" style="width:200px; text-align:center;"/><br />
<label>Precio:</label> <input type="text" id="txtprecio" name="precio" style="width:200px; text-align:center;" /><br /> 
<label>Hora Salida:</label> <input type="text" id="txthsa" name="hrsalida" style="width:200px; text-align:center;" /><br />
<label>Numero Autobus:</label> <input type="text" id="txtnauto" name="nautobus" style="width:200px; text-align:center;" /><br />
<label>Fecha Salida:</label> <input type="text" id="txtfsa" name="fsalida" style="width:200px; text-align:center;" /><br />
<label>Linea Autobus:</label> <input type="text" id="txtliaut" name="lautobus" style="width:200px; text-align:center;" /><br />
<label>Lugares Libres:</label> <input type="text" id="txtcantidad" name="llibres" style="width:200px; text-align:center;" /><br />
<label>Cantidad:</label> <input type="number" id="Editbox12" name="cantidad" style="width:200px; text-align:center;" /></br>
<!--Boton Agregar Venta-->
<input type="button" id="Button2" name="" onclick="Aproducto()" value="Agragar Producto" /></td>
</form>
<tr>
<tr>
<td colspan="2" ALIGN="CENTER">
<!--Tabla con Datos-->
<div id="tabla"></div>
</td>
<tr>
</table>




</body>
</html>