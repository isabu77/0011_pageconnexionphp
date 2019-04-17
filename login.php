<?php
session_start();
if (isset($_SESSION["connect"])) {
	$connect = $_SESSION["connect"];
}else{
	$connect = false;
}
if($connect){
	header("Location: page.php");
	// FIN DU TRAITEMENT
	exit();
}

if(!empty($_POST)){
	//$stock = require 'stock.php';
	$username = strtolower($_POST["username"]);
	$password = $_POST["password"];
	$passwordVerif = $_POST["password_verif"];

	if (!empty($username) && !empty($password)){
		require_once 'db.php';
		$sql = 'SELECT * FROM `users` WHERE `name` = ?';
		$statement = $pdo->prepare($sql);
		$statement->execute([$username]);
		$user = $statement->fetch();
		if (!$user){
				// vérifier la taille du password
			if (strlen($password) >= 5 && strlen($password) <= 10){
				// vérifier le password
				if ($password === $passwordVerif){
					// insérer le user dans la base
					//INSERT INTO `users` (`id`, `name`, `password`) VALUES (NULL, 'autre', 'autre')
					// cryptage du password
					$password = password_hash($password, PASSWORD_BCRYPT);
					require_once 'db.php';
					$sql = 'INSERT INTO `users` (`name`, `password`) VALUES (:name, :password)';
					$statement = $pdo->prepare($sql);
					$result = $statement->execute([
										':name' => $username, 
										':password' => $password]);
					if ($result){
						// connexion directe
						$_SESSION["connect"] = true;
						$_SESSION["username"] = $username;
						header("Location: page.php");
						// FIN DU TRAITEMENT
						exit();
					}else{
						// TODO signaler problème d'insertion
						die("erreur enregistrement en base");
					}
				}else{
					// TODO signaler mdp différents
					die("mdp différents");
				}
			}else{
				// TODO : signaler taille invalide du mdp
				die("mdp de taille invalide");

			}
		}else{
			// TODO signaler l'existence du username
			die("cet utilisateur existe");

		}
	}else{
		// TODO signaler les champs vides
		die("utilisateur ou mot de passe vides");
	}
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>formulaire d'inscription</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div class="wrapper">
		<section class="login-container">
			<div>
				<header>
					<h2>Inscription</h2>
				</header>
				<form action="" method="Post">
					<input  type="text" name="username" placeholder="Nom d'utilisateur"  />
					<input  type="password" name="password" placeholder="Mot de passe"  />
					<input  type="password" name="password_verif" placeholder="Confirmez le mot de passe"  />
					<button type="submit">S'enregistrer</button>
				</form>
			</div>
		</section>
	</div>
</body>
</html>