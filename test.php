<?php
require 'db.php';

	// cryptage des mots de passe de la table users 
	// à ne faire qu'UNE SEULE FOIS

/*	$sql = 'SELECT * FROM `users`';
	$statement = $pdo->query($sql);
	$users = $statement->fetchAll();

	foreach ($users as $user){
		$pwdhash = password_hash($user['password'], PASSWORD_BCRYPT);
		$sql = 'UPDATE `users` SET `password` = :password WHERE `users`.`id` = :id';
		$statement = $pdo->prepare($sql);
		$result = $statement->execute([
							':password' => $pwdhash, 
							':id' => $user['id']]);
		if ($result){
			echo $result . " <br />";
		}
	}
*/

/*$bdd = password_hash("julien", PASSWORD_BCRYPT);

echo $bdd;
echo "<br />";
$pwd = "Julien";
echo $pwd;
echo "<br />";

if (password_verify($pwd, $bdd)){
	echo "pareil";
}else{
	echo "diff";
}*/


?>