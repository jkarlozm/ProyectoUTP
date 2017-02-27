<?php
	class conexionUsuarios
	{
		
		private $datos = array(
			"host" => "localhost",
			"user" => "root",
			"pass" => "",
			"db" => "proyectoutp"
		);

		private $con;
		
		public function __construct()
		{
			$this->con = new mysqli($this->datos['host'],
			$this->datos['user'], $this->datos['pass'],
			$this->datos['db']);		
		}

		public function consultaSimple($sql)
		{
			return $this -> con -> query($sql);			
		}

		public function consultaRetorno($sql)
		{
			return $this -> con -> query($sql);
		}

	}
	