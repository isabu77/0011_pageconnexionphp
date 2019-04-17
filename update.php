<?php
require 'connect.php';
//bdd -> Isabelle -> table biere en forçant le type en UTF8 dans $beerArray
require 'db.php';

if(!empty($_POST)){
	$username = strtolower($_POST["username"]);
	$password = $_POST["password"];
	$id = $_POST["id"];

	if(!empty($id)){
		if(!empty($username)){
			$sql = 'SELECT * FROM `users` WHERE `name` = ?';
			$statement = $pdo->prepare($sql);
			$statement->execute([$username]);
			$user = $statement->fetch();
			if (!$user){
				if(!empty($password)){
					if (strlen($password) >= 5 && strlen($password) <= 10){

						$pwdhash = password_hash($password, PASSWORD_BCRYPT);
						$sql = 'UPDATE `users` SET `name` = :name , `password` = :password WHERE `users`.`id` = :id';
						$statement = $pdo->prepare($sql);
						$result = $statement->execute([
											':name' 	=> $username, 
											':password' => $pwdhash, 
											':id' 		=> $id
										]);
						if ($result){
							echo $result . " <br />";
						}
					}else{
						die("mdp mauvais format");
						// TODO créer erreur
					}
				}else{
					// modifier seulement le username
					$sql = 'UPDATE `users` SET `name` = :name WHERE `users`.`id` = :id';
					$statement = $pdo->prepare($sql);
					$result = $statement->execute([
										':name' 	=> $username, 
										':id' 		=> $id
									]);
					if ($result){
						echo $result . " <br />";
					}

				}
			}else{
				if(!empty($password)){
					if (strlen($password) >= 5 && strlen($password) <= 10){

						$pwdhash = password_hash($password, PASSWORD_BCRYPT);
						$sql = 'UPDATE `users` SET `name` = :name , `password` = :password WHERE `users`.`id` = :id';
						$statement = $pdo->prepare($sql);
						$result = $statement->execute([
											':name' 	=> $username, 
											':password' => $pwdhash, 
											':id' 		=> $id
										]);
						if ($result){
							echo $result . " <br />";
						}
					}else{
						die("mdp mauvais format");
						// TODO créer erreur
					}
				}else{
					die("username existe déjà");
				}
			}
		}
	}
}

header("Location: profil.php");


