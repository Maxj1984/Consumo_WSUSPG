<?php
class Conexion extends PDO
{
    private $hostBd = 'gator3108.hostgator.com';
	private $nombreBd = 'comagt41_comagt';
	private $usuarioBd = 'comagt41_dbcoma';
	private $passwordBd = '+UXn=UeCDN4+';
    
    
    public function __construct(){
        try{
            parent::__construct('mysql:host='.$this->hostBd.';dbname='.$this->nombreBd.';charset=utf8mb4', $this->usuarioBd,$this->passwordBd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch(PDOException $e){
            echo 'Error: ' .$e->getMessage();
            exit;
        }

    }
}
?>