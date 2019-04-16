<?php
// vérif connecté
require 'connect.php';
//bdd -> Isabelle -> table biere en forçant le type en UTF8 dans $beerArray
require 'db.php';

// http://localhost/0011_pageconnexionphp/biere.php
// $_POST['id']

// $_POST vient d'un formulaire
// vider la table biere : DELETE FROM `biere`



if (isset($_POST['id'])){
	$id = $_POST['id'];

	$sql = "DELETE FROM `biere` WHERE `id` = ?" ;
	$statement = $pdo->prepare($sql);	// preparation de la requete avec des paramètres représentés par ?
	// autre syntaxe pour le ? : ':id' 
	$statement->execute([$id]); // [$id] : tableau des paramètres qui remplacent les ? dans la requete $sql 
	//echo $nb;
	// header(location : biere.php);  PAS DE HTML au-dessus (echo supprimé)
	header("Location: http://localhost/0011_pageconnexionphp/biere.php");	

}



?>