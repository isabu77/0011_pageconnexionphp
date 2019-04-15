<?php
session_start();
if (isset($_SESSION["connect"])) {
	$connect = $_SESSION["connect"];
}else{
	$connect = false;
}
if($connect){
	header("Location: http://localhost/0011_pageconnexionphp/page.php");
}
$errusername = "";
$errpassword = "";


if(!empty($_POST)){
	$stock = require 'stock.php';
	$username = $_POST["username"];
	$password = $_POST["password"];

	if (!empty($username) && !empty($password)){
		/* TODO : verifier couple user / mdp */
		if(isset($stock[$username])){
			if ($password === $stock[$username]){
					
					$_SESSION["connect"] = true;
					$_SESSION["username"] = $username;
					header("Location: http://localhost/0011_pageconnexionphp/page.php");
			}else{
				header("HTTP/1.0 403 Forbidden");
				/* TODO : USERNAME ou MDP pas bon */
				header("Location: http://localhost/0011_pageconnexionphp/");	
			}
		}else{
			if (empty($username) ){
				$errusername = "class= 'danger'";
			}
			if (empty($password) ){
				$errpassword = "class= 'danger'";
			}
			header("HTTP/1.0 403 Forbidden");
			/* TODO : USERNAME ou MDP pas bon */
			header("Location: http://localhost/0011_pageconnexionphp/");	
		}
	}else{
			if (empty($username) ){
				$errusername = "class= 'danger'";
			}
			if (empty($password) ){
				$errpassword = "class= 'danger'";
			}
/* TODO : signaler qu'il manque un champ */
		header("Location: http://localhost/0011_pageconnexionphp/");	
	}

}

	




?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>formulaire de connexion</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div class="wrapper">
		<section class="login-container">
			<div>
				<header>
					<h2>Identification</h2>
				</header>
				<form action="" method="Post">
					<input <?= $errusername ?> type="text" name="username" placeholder="Nom d'utilisateur"  />
					<input <?= $errpassword ?> type="password" name="password" placeholder="Mot de passe"  />
					<button type="submit">Connexion</button>
				</form>
			</div>
		</section>
	</div>
</body>
</html>