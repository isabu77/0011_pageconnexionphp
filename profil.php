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
<section style='list-style-type: none;'>
	<?php foreach ($stock as $row): ?>

   		<article>
   			<form method="POST" action="update.php">
   				<input type="text" name="username" value="<?= $row["name"]?>">
  				<input type="text" name="password" placeholder="modification mdp">
  				<input type="hidden" name="id" value="<?= $row["id"]?>">
  				<button type="submit">modifier</button>
   			</form>
    			
   		</article>



	<?php endforeach; ?>

</section>


<a href="page.php">Site</a>
<br />
<a href="profil.php">Profil</a>
<br />
<a href="biere.php">Bières</a>
<br />
<a href="?deconnect=true">Déconnexion</a>
