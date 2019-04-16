<?php
require 'config.php';

// connexion bdd -> Isabelle -> table biere en forçant le type en UTF8
$dsn = 'mysql:dbname=I'.$dbname.';host='.$dbhost.';charset=UTF8';

try {
	$pdo = new PDO($dsn, $user, $psw);

} catch (Exception $e) {
	echo 'connexion échouée : ' . $e->getMessage();
}
try {
	$sql = 'SELECT * FROM `biere`';
	$statement = $pdo->query($sql);
	$beerArray = $statement->fetchAll();

} catch (Exception $e) {
	echo 'lecture échouée : ' . $e->getMessage();
	
}
