
<?php
	
	class Conexion extends PDO
	{
		private $host = 'gator3108.hostgator.com';
		private $db = 'comagt41_apiguate';
		private $usuario = 'comagt41_dbapigu';
		private $password = 'TbB1o3tEp!8$';
		
		public function __construct()
		{
			try{
				parent::__construct('mysql:host=' . $this->host . ';dbname=' . $this->db . ';charset=utf8', $this->usuario, $this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				
				} catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
				exit;
			}
		}
	}