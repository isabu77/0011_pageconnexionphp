<?php
session_start();
if(isset($_GET["deconnect"]) && $_GET["deconnect"]){
	unset($_SESSION["connect"]);
} 
$connect = $_SESSION["connect"];
if (empty($connect)){
	header("Location: http://localhost/0011_pageconnexionphp/");	
}		
echo "mon profil est super secu <br />";

$username = $_SESSION['username'];
if ($username){
	echo "my name is " . substr($username, -3) . " " . substr($username, 0, -3) . "-" . substr($username, -3) ."<br />";
}else{
	echo "pas de username";
}



?>
<a href="http://localhost/0011_pageconnexionphp/page.php">site</a>
<br />
<a href="http://localhost/0011_pageconnexionphp/profil.php?deconnect=true">déconnexion</a>
