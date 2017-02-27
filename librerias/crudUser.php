<?php
	require_once('../consultas/consultaUsuarios.php');

	$consultarUsers = new users();

	switch ($_POST['type']) {
		case 1:
			//Inicio de sesión.
			session_start();
			$sesionDatos = $consultarUsers -> login($_POST['user'], $_POST['pass']);			
			if (mysqli_num_rows($sesionDatos) > 0) {
				foreach ($sesionDatos as $datos) {					
					$_SESSION['user'] = $datos['Usuario'];					
				}
				echo "1";
			}
			else{
				echo "2";
			}
			break;	
		
	}