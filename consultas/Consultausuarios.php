<?php
	require_once('../bd/settingConexion.php');
	
	class users extends conexionUsuarios
	{
		
		function __construct()
		{
			$this -> con = new conexionUsuarios();
		}

		public function login($userName, $userPass)
		{
			$rsql = 'SELECT Usuario, Contrasena FROM registro WHERE Usuario = "'.$userName.'" AND Contrasena = '.$userPass;
			return $this -> con -> consultaRetorno($rsql);			
		}

	}