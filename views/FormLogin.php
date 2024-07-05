<?php if($_GET['t'] == 'connexion') :?>

	<?php
		//le formulaire d'enregistrement envoyé
		if(isset($_GET['v']) AND $_GET['v'] == 'ok'){
			include_once('controllers/MemberController.php');
			$memberController = new MemberController();
			$email = $_POST['email'];
			$password = $_POST['password'];
			$memberController->connexionMember($email, $password);
		}
	?>

	<div class="d-flex align-items-center py-4 bg-body-tertiary cover-content">
		<main class="form-signin w-100 m-auto">
			<h1>Se connecter</h1>
			<form method="POST" action="?p=login&t=connexion&v=ok">
				
		  		<div class="form-floating">
					<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" autocomplete="email" name="email">
					<label for="floatingInput">Email</label>
			    </div>

			    <div class="form-floating">
					<input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
					<label for="floatingPassword">Mot de Passe</label>
				</div>

				<div class="form-check text-start my-3">
					<input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
					<label class="form-check-label" for="flexCheckDefault">
					Se souvenir de moi
					</label>
				</div>

				<button class="btn btn-primary w-100 py-2" type="submit">Se connecter</button>
				<p><small>Pas de compte ? <a href="?p=login&t=register">S'enregister ici</a></small>.
			</form>
		</main>
	</div>

<?php elseif($_GET['t'] == 'register'):?>

	<?php
		//le formulaire d'enregistrement envoyé
		if(isset($_GET['v']) AND $_GET['v'] == 'ok'){
			include_once('controllers/MemberController.php');
			$memberController = new MemberController();
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$memberController->registerMember($name, $email, $password);
		}
	?>

	<div class="d-flex align-items-center py-4 bg-body-tertiary cover-content">
		<main class="form-signin w-100 m-auto">
			<h1>S'enregistrer</h1>
			<form method="POST" action="?p=login&t=register&v=ok">
				
				<div class="form-floating">
					<input type="text" class="form-control" id="floatingName" placeholder="Your Name" autocomplete="given-name" name="name">
					<label for="floatingName">Nom</label>
			    </div>

		  		<div class="form-floating">
					<input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" autocomplete="email" name="email">
					<label for="floatingEmail">Email</label>
			    </div>

			    <div class="form-floating">
					<input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
					<label for="floatingPassword">Mot de Passe</label>
				</div>

				<button class="btn btn-primary w-100 py-2" type="submit">S'enregistrer</button>
				<p><small>Déjà enregistré ? <a href="?p=login&t=connexion">Se connecter ici</a></small>.
			</form>
		</main>
	</div>


<?php elseif($_GET['t'] === 'logout') :?>

	<?php 
		unset($_SESSION['auth']);
		unset($_SESSION['role']);
		unset($_SESSION['id']);

		$_SESSION['success'] = "Vous êtes maintenant déconnecté";

		header('Location:index.php?p=login&t=connexion');
	?>

<?php endif ?>
