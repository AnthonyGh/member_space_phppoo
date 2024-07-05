<?php

require_once 'models/MemberManager.php';

Class MemberController{

	protected $member;
	
	public function __construct(){
		$this->member= new MemberManager();
	}

	public function showFormLogin(){
		
		require_once('views/FormLogin.php');
		
	}

	public function showMemberPage(){

		$this->member->logged_only();
		$member = $this->member->getNameByID($_SESSION['id']);
		require_once('views/MemberView.php');


		
	}

	public function registerMember($name, $email, $password)
	{

		$emailExist = $this->member->checkEmail($email);
        
        if($emailExist){
            $_SESSION['error'] = 'Ce mail a déjà été utilisé pour un autre compte';
        }else{
        	$membercreation=$this->member->createMember($name, $email, $password);
			$_SESSION['success'] = 'Bienvenue '.$name.'! Tu as bien été enregistré';
			$_SESSION['auth'] = $name;
			header('Location:index.php');
        }

	}

	public function connexionMember($email, $password)
	{

		$member = $this->member->getNameByEmail($email);

		if($member){
			if(password_verify($password, $member['password'])){
				$_SESSION['success'] = 'Bonjour '.$member['name'].' : connexion réussie';
            	$_SESSION['auth'] = $member['name'];
            	$_SESSION['id'] = $member['id'];
            	$_SESSION['role'] = $member['role'];
            	header('Location:index.php?p=compte'); 
			}else{
				$_SESSION['error'] = 'Le mot de passe n\'est pas correct';
			}
            
        }else{
        	
			$_SESSION['error'] = 'Aucun compte ne possède cet email';
			
        }

	}
}