<?php
// vérif connecté
require 'connect.php';
//bdd -> Isabelle -> table biere en forçant le type en UTF8 dans $beerArray
require 'db.php';

?>

<!-- HTML -->
<!-- PAGE PRINCIPALE de présentation des bières -->
<!DOCTYPE html>
<html>

<head>
  <title>Les bières</title>
  <meta charset='UTF-8' />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	<div class='container'>
	  	<!-- Entete  -->
	  	<header class="row">
	    	<h1 class='col-12 rounded text-white text-center bg-info col-md-12'>Les bières</h1>
	 	</header>

	    <section class = 'row'>
	      <!-- BOUCLE de lecture du tableau pour afficher un article par bière -->
			<?php foreach ($beerArray as $row): ?>
		      	<article class='text-center col-md-4 col-sm-6'>
		        	<h2 class="text-center text-truncate text-success font-weight-bold col-md-12"><?= $row["nom"]?></h2>

		        	<em>
		        		<form method="POST" action = "deletebiere.php">
		        			<input type="hidden" name="id" value=<?= $row["id"]?> >
		        			<button type="submit">suppression</button>
		        		</form>	
		        		</em>
		        	
		        	<p class='text-justify col-md-10 offset-md-1 offset-sm-2' ><?= substr((String)$row["description"],0,150) . '...';  ?></p>
		     	</article>
			<?php endforeach; ?>
	  	</section>
	</div>
</body>

</html>

<!-- mettre menu -->
<a href="page.php">Site</a>
<br />
<a href="profil.php">Profil</a>
<br />
<a href="biere.php">Bières</a>
<br />
<a href="?deconnect=true">Déconnexion</a>