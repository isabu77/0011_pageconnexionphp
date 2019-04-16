<?php
require 'connect.php';

if ($username){
	echo "mon profil est super secu <br />";
	echo "my name is " . substr($username, -3) . " " . substr($username, 0, -3) . "-" . substr($username, -3) ."<br />";
}else{
	echo "pas de username";
}
?>
<a href="http://localhost/0011_pageconnexionphp/page.php">site</a>
<br />
<a href="http://localhost/0011_pageconnexionphp/profil.php">profil</a>
<br />
<a href="biere.php">Bière</a>
<br />
<a href="http://localhost/0011_pageconnexionphp/profil.php?deconnect=true">déconnexion</a>
