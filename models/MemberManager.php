<?php

require_once 'Database.php';

Class MemberManager{

	protected $conn;
	
	public function __construct(){
		$this->conn= new Database();
	}

	public function createMember($name, $email, $password){
		$sql = "INSERT INTO members (name, email, password, role) VALUES (:name,:email,:password, 'user')";
		$stmt = $this->conn->getConnexion()->prepare($sql);
		$stmt->execute([':name'=>$name,':email'=>$email,':password'=>$password]);
		return true;
	}

	public function checkEmail($email){
		$sql = 'SELECT id FROM members WHERE email=:email';
		$stmt = $this->conn->getConnexion()->prepare($sql);
        $stmt->execute([':email'=>$email]);
        $user = $stmt->fetch();
        if($user){
        	return true;
        }else{
        	return false;
        }
	}

	public function getNameByEmail($email){
		$sql = 'SELECT * FROM members WHERE email=:email';
		$stmt = $this->conn->getConnexion()->prepare($sql);
        $stmt->execute([':email'=>$email]);
        $user = $stmt->fetch();
        return $user;
	}

	public function getNameByID($id){
		$sql = 'SELECT * FROM members WHERE id=:id';
		$stmt = $this->conn->getConnexion()->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $user = $stmt->fetch();
        return $user;
	}

	public function logged_only(){
        
        if (session_status() == PHP_SESSION_NONE) {
        	session_start();  
        }

        if(!isset($_SESSION['auth']) || $_SESSION['role'] !== "user"){
            
            $_SESSION['error'] = "Vous n'êtes pas autorisé à consulter cette page, vous devez vous connecter d'abord.";
            header('Location: index.php');
            exit();
        }
    }

}