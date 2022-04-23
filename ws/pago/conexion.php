<?php
	class Conexion extends PDO
	{
		private $hostBd = 'gator3108.hostgator.com';
		private $nombreBd = 'comagt41_guatedata';
		private $usuarioBd = 'comagt41_dbguate';
		private $passwordBd = 'aPI-IutRCyq*';
		
		public function __construct()
		{
			try
			{
				parent::__construct('mysql:host=' . $this->hostBd . ';dbname=' . $this->nombreBd . ';charset=utf8', $this->usuarioBd, $this->passwordBd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				
			} 
			catch(PDOException $e)
			{
				echo 'Error: ' . $e->getMessage();
				exit;
			}
		}
	}
?>