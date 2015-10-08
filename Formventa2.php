<?php
session_start();
if(!isset($_SESSION['vendedor']))
{
	header("Location:Index.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Ventas</title>
<meta name="generator" content="WYSIWYG Web Builder 8 - http://www.wysiwygwebbuilder.com">
<!--jQuery-->
<script type="text/javascript" src="jquery-1.10.1.min.js"></script>
<!--Procesos-->
<script type="text/javascript" src="java/procesos.js"></script>
<!--Hoja estilo-->
<LINK REL=StyleSheet HREF="hojastylo/styloventa.css" TYPE="text/css" MEDIA=screen>
</head>
<body>
<!--Datos venta y vendedor-->
<div id="space"><br></div>
<div id="container">
<div id="wb_Shape1" style="position:absolute;left:49px;top:50px;width:891px;height:660px;opacity:0.30;-moz-opacity:0.30;-khtml-opacity:0.30;filter:alpha(opacity=30);z-index:0;">
<img src="images/img0002.png" id="Shape1" alt="" style="border-width:0;width:891px;height:660px;"></div>
<div id="wb_Shape2" style="position:absolute;left:110px;top:90px;width:249px;height:188px;opacity:0.50;-moz-opacity:0.50;-khtml-opacity:0.50;filter:alpha(opacity=50);z-index:1;">
<img src="images/img0001.png" id="Shape2" alt="" style="border-width:0;width:249px;height:188px;"></div>
<input type="hidden" id="idvendedor" value="<?php echo $_SESSION['idvendedor'];?>">
<input type="text" id="Editbox1" style="position:absolute;left:210px;top:99px;width:130px;height:23px;line-height:23px;z-index:2;" name="vendedor" value="<?php echo $_SESSION['vendedor'];?>" maxlength="30" autocomplete="off">
<input type="text" id="Editbox2" style="position:absolute;left:210px;top:134px;width:129px;height:23px;line-height:23px;z-index:3;" name="venta" value="<?php echo isset( $_SESSION['venta'])?$_SESSION['venta']:0; ?>" maxlength="4" autocomplete="off">
<input type="date" id="Editbox3" style="position:absolute;left:210px;top:170px;width:129px;height:23px;line-height:23px;z-index:4;" name="fecha" value="" maxlength="20" autocomplete="off">
<div id="wb_Text1" style="position:absolute;left:122px;top:104px;width:89px;height:19px;z-index:5;text-align:left;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;"><strong><em>Vendedor</em></strong></span></div>
<div id="wb_Text2" style="position:absolute;left:123px;top:138px;width:54px;height:19px;z-index:6;text-align:left;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;"><strong><em>Venta</em></strong></span></div>
<div id="wb_Text3" style="position:absolute;left:123px;top:174px;width:54px;height:19px;z-index:7;text-align:left;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;"><strong><em>Fecha</em></strong></span></div>
<div id="wb_Text4" style="position:absolute;left:123px;top:209px;width:74px;height:19px;z-index:8;text-align:left;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;"><strong><em>Cliente</em></strong></span></div>

<!--Cliente-->
<?php
		require ('conexion.php');
         $recupera="select idcliente, Nombre from clientes";
         $objeto->consulta($recupera);
         $numren=$objeto->contarRenglones();
         if($numren==0)
         {
             echo "la base de datos esta vacia";
             exit;
         }
         else
         {
?>
<select name="cliente" size="1" id="Combobox1" style="position:absolute;left:210px;top:204px;width:132px;height:28px;z-index:9;">
<?php
while($rowCliente=$objeto->extraer_registros())
             {
                 $n=$rowCliente[1];
                 echo "<option value='".$rowCliente[0]."'>". $n."</option>";
             }
?>
</select>
<?php
}
?>

<!--Boton Registrar Venta-->
<input type="submit" id="Button1" onclick="Rventa()" name="" value="Registrar Venta" style="position:absolute;left:220px;top:240px;width:109px;height:25px;z-index:10;">

<!--Datos productos-->
<div id="wb_Shape3" style="position:absolute;left:560px;top:90px;width:321px;height:435px;opacity:0.50;-moz-opacity:0.50;-khtml-opacity:0.50;filter:alpha(opacity=50);z-index:11;">
<img src="images/img0003.gif" id="Shape3" alt="" style="border-width:0;width:321px;height:435px;"></div>

<!--Producto-->
<?php
    $recupera="select Idproducto, numboleto from autobuses";
	$objeto->consulta($recupera);
	$numren=$objeto->contarRenglones();
	?>
<select name="boleto" size="1" id="Combobox2" onchange="enviarProducto()" style="position:absolute;left:729px;top:100px;width:131px;height:26px;z-index:12;">
<?php
		while ($row = $objeto->extraer_registros ())
			{	$n=$row[1];
				echo "<option value='".$row[0]."'> ". $n."</option>";
			}		
         ?>
</select>

<input type="text" id="txtprecio" style="position:absolute;left:729px;top:205px;width:130px;height:22px;line-height:22px;z-index:13;" name="precio" value="" autocomplete="off">
<input type="text" id="txthsa" style="position:absolute;left:729px;top:240px;width:130px;height:22px;line-height:22px;z-index:14;" name="hrsalida" value="" autocomplete="off">
<input type="text" id="txtnauto" style="position:absolute;left:730px;top:275px;width:130px;height:22px;line-height:22px;z-index:15;" name="nautobus" value="" autocomplete="off">
<input type="text" id="txtfsa" style="position:absolute;left:729px;top:310px;width:130px;height:22px;line-height:22px;z-index:16;" name="fsalida" value="" autocomplete="off">
<input type="text" id="txtliaut" style="position:absolute;left:729px;top:345px;width:130px;height:22px;line-height:22px;z-index:17;" name="lautobus" value="" autocomplete="off">
<input type="text" id="txtcantidad" style="position:absolute;left:729px;top:380px;width:130px;height:22px;line-height:22px;z-index:18;" name="llibres" value="" autocomplete="off">
<div id="wb_Text5" style="position:absolute;left:574px;top:104px;width:64px;height:19px;z-index:19;text-align:left;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;"><strong><em>Boleto</em></strong></span></div>
<div id="wb_Text6" style="position:absolute;left:574px;top:139px;width:64px;height:19px;z-index:20;text-align:left;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;"><strong><em>Origen</em></strong></span></div>
<div id="wb_Text7" style="position:absolute;left:574px;top:175px;width:74px;height:19px;z-index:21;text-align:left;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;"><strong><em>Destino</em></strong></span></div>
<div id="wb_Text8" style="position:absolute;left:574px;top:208px;width:64px;height:19px;z-index:22;text-align:left;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;"><strong><em>Precio</em></strong></span></div>
<div id="wb_Text9" style="position:absolute;left:573px;top:244px;width:94px;height:19px;z-index:23;text-align:left;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;"><strong><em>Hr Salida</em></strong></span></div>
<div id="wb_Text10" style="position:absolute;left:574px;top:280px;width:124px;height:19px;z-index:24;text-align:left;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;"><strong><em>Num. Autobus</em></strong></span></div>
<div id="wb_Text11" style="position:absolute;left:573px;top:314px;width:124px;height:19px;z-index:25;text-align:left;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;"><strong><em>Fecha Salida</em></strong></span></div>
<div id="wb_Text12" style="position:absolute;left:573px;top:349px;width:134px;height:19px;z-index:26;text-align:left;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;"><strong><em>Linea Autobus</em></strong></span></div>
<div id="wb_Text13" style="position:absolute;left:573px;top:384px;width:144px;height:19px;z-index:27;text-align:left;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;"><strong><em>Lugares Libres</em></strong></span></div>
<div id="wb_Text14" style="position:absolute;left:573px;top:419px;width:84px;height:19px;z-index:28;text-align:left;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;"><strong><em>Cantidad</em></strong></span></div>

<!--Agregar Producto-->
<input type="submit" id="Button2" name="" onclick="Aproducto()" value="Agragar Producto" style="position:absolute;left:733px;top:491px;width:124px;height:25px;z-index:29;">

<div id="wb_Shape4" style="position:absolute;left:721px;top:569px;width:159px;height:114px;opacity:0.50;-moz-opacity:0.50;-khtml-opacity:0.50;filter:alpha(opacity=50);z-index:30;">
<img src="images/img0004.gif" id="Shape4" alt="" style="border-width:0;width:159px;height:114px;"></div>
<input type="number" id="Editbox12" style="position:absolute;left:729px;top:415px;width:130px;height:22px;line-height:22px;z-index:31;" name="cantidad" value="" autocomplete="off">
<input type="text" id="Editbox13" style="position:absolute;left:730px;top:580px;width:130px;height:22px;line-height:22px;z-index:32;" name="subtotal" value="" autocomplete="off" placeholder="Subtotal">
<input type="text" id="Editbox14" style="position:absolute;left:730px;top:650px;width:130px;height:22px;line-height:22px;z-index:33;" name="total" value="" autocomplete="off" placeholder="Total">
<div id="wb_Shape5" style="position:absolute;left:359px;top:310px;width:176px;height:181px;opacity:0.50;-moz-opacity:0.50;-khtml-opacity:0.50;filter:alpha(opacity=50);z-index:34;">
<img src="images/img0005.gif" id="Shape5" alt="" style="border-width:0;width:176px;height:181px;"></div>
<div id="wb_Image1" style="position:absolute;left:376px;top:326px;width:142px;height:152px;z-index:35;">
<img src="images/Fondo.jpg" id="Image1" alt="" border="0" style="width:142px;height:152px;"></div>
<div id="wb_Shape6" style="position:absolute;left:109px;top:537px;width:461px;height:123px;opacity:0.50;-moz-opacity:0.50;-khtml-opacity:0.50;filter:alpha(opacity=50);z-index:36;">
<img src="images/img0006.gif" id="Shape6" alt="" style="border-width:0;width:461px;height:123px;"></div>
<!--Origen-->
<?php
    $recupera="select origen from autobuses";
	$objeto->consulta($recupera);
	$numren=$objeto->contarRenglones();
	?>
<select name="origen" size="1" id="Combobox3" style="position:absolute;left:730px;top:135px;width:131px;height:26px;z-index:37;">
<?php
		while ($row = $objeto->extraer_registros ())
			{	$n=$row['origen'];
				echo "<option value='".$row['origen']."'> ". $n."</option>";
			}		
         ?>
</select>
<!--Destino-->
<?php
    $recupera="select destino from autobuses";
	$objeto->consulta($recupera);
	$numren=$objeto->contarRenglones();
	?>
<select name="destino" size="1" id="Combobox4" style="position:absolute;left:730px;top:170px;width:131px;height:26px;z-index:38;">
<?php
		while ($row = $objeto->extraer_registros ())
			{	$n=$row['destino'];
				echo "<option value='".$row['destino']."'> ". $n."</option>";
			}		
         ?>
</select>
<input type="text" id="Editbox4" style="position:absolute;left:730px;top:616px;width:130px;height:22px;line-height:22px;z-index:39;" name="iva" value="" autocomplete="off" placeholder="IVA 16%">
<!--Forma pago-->
<?php
    $recupera="select Idpago, Formapago from formapago";
	$objeto->consulta($recupera);
	$numren=$objeto->contarRenglones();
	?>
<select name="destino" size="1" id="Combobox5" style="position:absolute;left:731px;top:450px;width:131px;height:26px;z-index:40;">
<?php
		while ($row = $objeto->extraer_registros ())
			{	$n=$row['Formapago'];
				echo "<option value='".$row[0]."'> ". $n."</option>";
			}		
         ?>
</select>
<div id="wb_Text15" style="position:absolute;left:575px;top:453px;width:136px;height:19px;z-index:41;text-align:left;">
<span style="color:#000000;font-family:'Courier New';font-size:16px;"><strong><em>Forma de pago</em></strong></span></div>
</div>
</body>
</html>