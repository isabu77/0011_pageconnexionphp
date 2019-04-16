<?php
require 'connect.php';
//bdd -> Isabelle -> table biere en forçant le type en UTF8 dans $beerArray
require 'db.php';

if ($username){
	echo "mon profil est super secu <br />";
	echo "my name is " . substr($username, -3) . " " . substr($username, 0, -3) . "-" . substr($username, -3) ."<br />";
}else{
	echo "pas de username";
}
	$sql = 'SELECT * FROM `users`';
	$statement = $pdo->query($sql);
	$stock = $statement->fetchAll();

?>

<!-- liste des autres utilisateurs : 
- julien mdp : 123456
- kevin mdp : azerty
- pepito mdp : pepito -->

<h2>liste des autres utilisateurs : </h2>
<ul style='list-style-type: none;'>
	<?php foreach ($stock as $row): ?>
		<!-- changer point en tiret -->
   		<li><?= '- ' . $row["name"] . ' mdp : ' . $row["password"];  ?></li>
	<?php endforeach; ?>

</ul>


<a href="page.php">Site</a>
<br />
<a href="profil.php">Profil</a>
<br />
<a href="biere.php">Bières</a>
<br />
<a href="?deconnect=true">Déconnexion</a>
