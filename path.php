<?php

	if(isset($_GET['p'])){
		if($_GET['p'] == 'compte'){
			include_once('controllers/MemberController.php');
			$memberController = new MemberController();
			$memberController->showMemberPage();
		}elseif($_GET['p'] == 'login'){
			if(isset($_GET['t'])){
				include_once('controllers/MemberController.php');
				$memberController = new MemberController();
				$memberController->showFormLogin();
			}else{
				echo '<p><i class="fa-solid fa-triangle-exclamation"></i> Cette page n\'existe pas</p>';
			}
		}else{
			echo '<p><i class="fa-solid fa-triangle-exclamation"></i> Cette page n\'existe pas</p>';
		}
	}else{
		include_once('controllers/HomeController.php');
		$homeController = new HomeController();
		$homeController->showHomePage();
	}