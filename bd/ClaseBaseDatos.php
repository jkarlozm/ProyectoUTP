<?php
//claseBaseDatos.php
class Servidor_Base_Datos
{
private $servidor;
private $usuario;
private $pass;
private $base_datos;
public $cnx;
private $resultado;
function Servidor_Base_Datos($servidor,$usuario,$pass,$base_datos)
{
	$this->servidor = $servidor; 
	$this->usuario = $usuario;  
	$this->pass = $pass;   
	$this->base_datos = $base_datos;  
	$this->conectar_base_datos();
}
public function conectar_base_datos()
{//mysql_connect abre coneccion con servidor de bases de datos
	$this->cnx = mysql_connect($this->servidor, $this->usuario, $this->pass);
//	Establece la base de datos activa en el servidor asociado con el identificador de enlace 
//especificado. Cada llamada posterior con mysql_query() será ejecutada en la base de datos activa. 
	$bd=mysql_select_db($this->base_datos, $this->cnx);
}
public function desconectar_base_datos()
{ //Cierra una conexión MySQL
mysql_close();
}
public function consulta($consulta)
  {  //mysql_query Ejecuta una consulta
		$this->resultado = mysql_query($consulta,$this->cnx) ;
		if ($this->resultado)
			return true;
			else
			 return false;			
	}
	
	public function contarRenglones ()
{
//mysql_num_rows — permite obtener el número de filas de una consulta
//o mejor dicho recupera el número de filas de una consulta.
// Este comando es únicamente válido para sentencias como SELECT o SHOW 
//que retornan un resultado real. Para recuperar el número de filas afectadas por
// consultas INSERT, UPDATE, REPLACE o DELETE, use mysql_affected_rows(). 
//resultado. Es el resultado que está siendo evaluado.
// Este resultado proviene de una llamada a mysql_query().
	$numren=mysql_num_rows($this->resultado);
	return $numren;
}

public function extraer_registros ()
{
//mysql_fetch_array — Recupera una fila de resultado como un array.
//Devuelve un array que corresponde a la fila recuperada, o falso si no quedan más filas. 

//El resultado es el que está siendo evaluado. Este resultado proviene de una llamada a mysql_query().
	if ($fila = mysql_fetch_array($this->resultado))
		{
			return $fila;
		} 
	else {
			return false;
		 }
}


public function extraer_renglon()
{
//mysql_fetch_row — Recupera una fila de resultado como un array numérico
//Devuelve un array numérico que corresponde a la fila recuperada.
//resultado. Es el resultado que está siendo evaluado.
// Este resultado proviene de una llamada a mysql_query().

	$registro=mysql_fetch_row($this->resultado);
	return $registro;
}

}
?>