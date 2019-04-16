<?php
// vérif connecté
require 'connect.php';
//bdd -> Isabelle -> table biere en forçant le type en UTF8 dans $beerArray
require 'db.php';

$sql = "DELETE FROM `biere` WHERE `id` = 1";
$nb = $pdo->exec($sql);
echo $nb;


// vider la table biere : DELETE FROM `biere`

?>