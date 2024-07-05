<?php

Class Database{

	private $dsn = "mysql:host=localhost;dbname=mon_website;charset=UTF8";
	private $user = "root";
	private $password = "root";

	public $conn;

	public function __construct(){
		try{
			$this->conn = new PDO($this->dsn, $this->user, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// echo 'connexion parfaite !';
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function getConnexion(){
		return $this->conn;
	}
}

