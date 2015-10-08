<?php
require ("conexion.php");
$idventa=$_GET['idventas'];
require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

//$pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------

$tbl =<<<EOD
<table cellspacing="0" cellpadding="1" style="width:80%;">
    <tr>
        <td align="right"><img src="images/img0001.gif"  Width="50" Height="50"></td>
        
    </tr>
	<tr>
		<td align="center"><font size="11">Viajes a Tiempo S.A de C.V. </font><br /><font size="10">R.F.C. ZAMJC-290388-RF01</font><br />Calle 6 Norte 14, Centro, 72300 Puebla<br />Tel. 01 222 233 8015</td>
	</tr>
</table><br><br>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// ----------------------------------------------------------------------------- 
	
    $comando ="SELECT Nombre, Direccion, Telefono, RFC FROM clientes 
	INNER JOIN venta ON clientes.IdCliente = venta.Idcliente
	WHERE venta.Idventa =  '$idventa'";
	$resultado = $objeto ->consulta($comando);	
    $sacardatos = $objeto->extraer_registros();
	
$tbl ='
    <table>
        <tr>
            <td width="45%">
                <table cellspacing="0" cellpadding="1" border="1" style="width:100%;">
                     <tr style="background-color:yellow;color:black;">
                          <td align="center"><b>CLIENTE</b></td>
                     </tr>
                     <tr>
         <td align="center"><b>Nombre Cliente:</b> '.$sacardatos['Nombre'].'<br /><b>Colonia:</b> '.utf8_encode($sacardatos['Direccion']).'<br><b>Telefono:</b> '.$sacardatos['Telefono'].'<br /><b>R.F.C.:</b> '.$sacardatos['RFC'].'</td>
                     </tr>
                </table>   
            </td>
            <td width="10%">
            </td>';
	
    $comando="SELECT Idfactura, Fechaexpedicion, Lugarexpedicion, Formapago
FROM factura INNER JOIN formapago ON factura.Idpago = formapago.Idpago
WHERE factura.Idventa = '$idventa'";
    $result=$objeto->consulta($comando);
  
    $sacardatos= $objeto->extraer_registros();

$tbl.='
            <td width="45%">
                <table cellspacing="0" cellpadding="2" border="1" style="width:100%;">                     
                     <tr style="background-color:yellow; color:black;">
							<td align="center"><i>Datos Factura</i></td>
					 </tr>
					 <tr>
                            <td align="center"><b>Fecha de Expedicion:</b> '.$sacardatos["Fechaexpedicion"].'<br /><b>Folio:</b> '.$sacardatos["Idfactura"].'<br /> <b>Lugar de Expedicion:</b> '.$sacardatos["Lugarexpedicion"].'<br /><b>Forma de pago:</b> '.$sacardatos["Formapago"].'</td>
                     </tr>
                </table>
            </td>
        </tr>
    </table>';

$pdf->writeHTML($tbl, true, false, false, false, '');


// -----------------------------------------------------------------------------
$comando="SELECT Precio, Cantidad, viaje, detallesventa.Origen, detallesventa.Destino
FROM detallesventa
INNER JOIN autobuses ON detallesventa.Idproducto = autobuses.Idproducto
WHERE detallesventa.Idventa = '$idventa'";
$result=$objeto->consulta($comando);
// Table with rowspans and THEAD

$tbl ='<p></p>
<table style="border: 1px solid #000;" cellpadding="1" cellspacing="0">

 <tr style="background-color:#0079C1;color:#FFFFFF;">
  
  <td align="center" width="18%" style="border: 1px solid #000;"><font size="9"><b>Numero de Boleto</b></font></td>
   
  <td align="center" width="8%" style="border: 1px solid #000;"><font size="9"><b>Origen</b></font></td>
  
  <td align="center" width="15%" style="border: 1px solid #000;"><font size="9"><b>Destino</b></font></td>
  
  <td align="center" width="18%" style="border: 1px solid #000;"><font size="9"><b>Cantidad</b></font></td>
  
  <td align="center" width="18%" style="border: 1px solid #000;"><font size="9"><b>Precio</b></font></td>
 </tr>';
$total = 0;
 while($sacardatos= $objeto->extraer_registros())
 {     
 $tbl.='<tr>
  
    <td height="20" align="center" width="18%" style="border-right: 1px solid #000; margin-top:"><font size="9">'.$sacardatos['numboleto'].'</font></td>
	<td width="8%" align="center" style="border-right: 1px solid #000;"><font size="9">'.$sacardatos['Origen'].'</font></td>	
	<td width="15%" align="center" style="border-right: 1px solid #000;"><font size="9">'.$sacardatos['Destino'].'</font></td>
	<td width="18%" align="center" style="border-right: 1px solid #000;"><font size="9">'.$sacardatos['Cantidad'].'</font></td>
	<td width="18%" align="center" style="border-right: 1px solid #000;"><font size="9">$'.$sacardatos['Precio'].'</font></td>  
 </tr>';
 }
 $tbl.='<tr>
        <td height="10" style="border-right: 1px solid #000;"></td>
        <td height="10" style="border-right: 1px solid #000;"></td>
        <td height="10" style="border-right: 1px solid #000;"></td>
        <td height="10" style="border-right: 1px solid #000;"></td>
        <td height="10" style="border-right: 1px solid #000;"></td>
        </tr></table>';


$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")

$recupera = "SELECT Precio, Cantidad from detallesventa where Idventa='$idventa'";

if($objeto->consulta($recupera))
{
	$subtotal = 0;
	$total = 0;	
	while($row = $objeto->extraer_registros())
	{
		$subtotal=$subtotal+($row['Precio']*$row['Cantidad']);
	}	
	
	$total=($subtotal*0.16)+$subtotal;
	$info = array("subtotal"=>$subtotal,"total"=>$total, "error"=>false);
}
else
{
	$info = array("subtotal"=>$subtotal,"total"=>$total, "error"=>true);
}

$tbl ='
<table cellpadding="2" cellspacing="2" >
 <tr nobr="true">
    <td width="70%">
    </td>
    <td align="right" width="17%" border="1"><font size="9"><b>SUBTOTAL:</b></font>
     </td>
     <td width="3%">
    </td>
    <td align="left" width="11%" border="1"><font size="9"><b>$'.$english_format_number = number_format($subtotal).'</b></font></td>
 </tr>
 <tr nobr="true">
    <td width="70%">
    </td>
     <td align="right" width="17%" border="1"><font size="9"><b>IVA:</b></font>
     </td>
     <td width="3%">
    </td>
     <td align="left" width="10%" border="1"><font size="9"><b>$'.number_format($subtotal*0.16).'</b></font></td>
 </tr>
 <tr nobr="true">
    <td width="70%">
    </td>
     <td align="right" width="17%" border="1"><font size="9"><b>TOTAL:</b></font>
     </td>
     <td width="3%">
    </td>
      <td align="left" width="11%" border="1"><font size="9"><b>$'.number_format($total).'</b></font></td>
 </tr>
</table><p></p><p></p>
<br><br>';

$pdf->writeHTML($tbl, true, false, false, false, '');

/*MARCA DE AGUA
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$ImageW = 209; //WaterMark Size
$ImageH = 700;
$myPageWidth = $pdf->getPageWidth();
    $myPageHeight = $pdf->getPageHeight();
    $myX = ( $myPageWidth / 2 ) - 105;  //WaterMark Positioning
    $myY = ( $myPageHeight / 2 ) - 149;

    $pdf->SetAlpha(0.07);
    $pdf->Image('images/img0001.gif', $myX, $myY, $ImageW, $ImageH, '', '', '', true, 150);
*/
//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+