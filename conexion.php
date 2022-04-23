<?php
class Conexion extends PDO
{
    /*private $hostBd = 'gator3108.hostgator.com';
	private $nombreBd = 'comagt41_comagt';
	private $usuarioBd = 'comagt41_dbcoma';
	private $passwordBd = '+UXn=UeCDN4+';*/


private $hostBd='localhost'; //local host, en algunos casos usar 127.0.0.1
private $nombreBd ='ws_valid_usuarios'; // nombre de la base de datos
private $usuarioBd ='root';
private $passwordBd ='50p0rt3..';
    public function __construct()
    {
        try{
            parent::__construct('mysql:host='.$this->hostBd.';dbname='.$this->nombreBd.';charset=utf8mb4', $this->usuarioBd,$this->passwordBd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch(PDOException $e){
            echo 'Error: ' .$e->getMessage();
            exit;
        }
    }
}
?>
