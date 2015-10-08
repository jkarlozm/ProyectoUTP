<?php
require ('ClaseBaseDatos.php');

$servidor = "localhost";
$usuario = "root";
$pass = "";
$base_datos = "proyecto2";
$objeto = new Servidor_Base_Datos($servidor,$usuario,$pass,$base_datos);

?>