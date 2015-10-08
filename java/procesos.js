//Detalles Productos
function enviarProducto(){
$("#Combobox2").change(function(){
var selectedValue = $(this).find(":selected").val();
	 var parametros = {"idProdSel" : selectedValue};

		 $.ajax({
	                	data:  parametros,
		                url:   'ConsultDetalles.php',
		                type:  'post',		
	                	success:  function (data) {
						var producto=jQuery.parseJSON(data);						
						document.getElementById("txtorigen").value=producto.ori;
						document.getElementById("txtdestino").value=producto.des;
						document.getElementById("txtprecio").value=producto.prec;
						document.getElementById("txthsa").value=producto.hora;
						document.getElementById("txtnauto").value=producto.numero;
						document.getElementById("txtfsa").value=producto.fecha;
						document.getElementById("txtliaut").value=producto.linea;
						document.getElementById("txtcantidad").value=producto.cantidad;
						document.getElementById("Image1").src=producto.fot;
                   }
	        });
	});}
//Agregar Venta
	function Rventa(){	
	var caja1 = $("#idvendedor").val();
	var caja2 = $("#Combobox1").val();
	var caja3 = $("#Editbox3").val();	
	var parametros= {"vendedor":caja1,"cliente":caja2,"date":caja3};
	$.ajax({
	                	data:  parametros,
		                url:   'venta.php',
		                type:  'post',						
	                	success:  function (response) 
						{						
							$("#Editbox2").val(response);						
						}
	});
}

//Agregar Producto
function Aproducto()
{
	var caja1 = $("#Combobox2").val();
	var caja2 = $("#Editbox12").val();
	var caja3 = $("#txtprecio").val();
	var caja4 = $("#Editbox2").val();
	var caja5 = $("#txtorigen").val();
	var caja6 = $("#txtdestino").val();
	var parametros = {'idproducto':caja1,"precio":caja3,"cantidad":caja2,"idventa":caja4, "origen":caja5, "destino":caja6};
	$.ajax({
		data:  parametros,
		                url:   'producto.php',
		                type:  'post',		
	                	success:  function (response) {
						$("#celda").html(response);
						alert(response);
						mospro();
						total();
						}
	});
}

//Mostrar productos agragados
function mospro()
{

   var caja4 = $("#Editbox2").val();
   var parametros = {"idventa":caja4};
   $.ajax({
      data:  parametros,
                      url:   'mprod.php',
                      type:  'post',
                     success:  function (response) {
                  $("#tabla").html(response);
                  }
   });
}

//Total
function total()
{
var idventas = $("#Editbox2").val();
   var parametros = {"idventa":idventas};
   $.ajax({
   data:parametros,
   url:"ctotal.php",
      type:"post",
      dataType:"json",
      success:
         function(response)
         {
            $("#txtsubtotal").val(response.subtotal);
            $("#txttotal").val(response.total);
			$("#txtIVA").val(response.iva);
         }
   });
}

//Crear factura
function Pcfac()
		{
			var caja1 = $("#Editbox3").val();
			var caja2 = $("#Combobox5").val();
			var caja3 = $("#Editbox2").val();			
			var parametros = {"fecha":caja1, "tpago":caja2, "idventas":caja3};			
			$.ajax({
				url:"crearfac.php",
				data:parametros,
				type:"post",
				success:
					function(response)
					{						
						alert(response);
						Pfac();
					}
			});
			
		}

//Imprimir Factura
function Pfac()
		{
			var caja4 = $("#Editbox2").val();
			alert(caja4);
			var parametros = {"idventas":caja4};			
			$.ajax({
				url:"factura.php",
				data:parametros,
				type:"post",
				success:
					function(response)
					{						
						window.open("factura.php?idventas="+caja4);
					}
			});
			
		}