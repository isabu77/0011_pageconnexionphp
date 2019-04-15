<?php
session_start();
if(isset($_GET["deconnect"]) && $_GET["deconnect"]){
	unset($_SESSION["connect"]);
} 
$connect = $_SESSION["connect"];
if (empty($connect)){
	header("Location: http://localhost/0011_pageconnexionphp/");	
}		
$username = $_SESSION['username'];


echo "bonjour {$username}<br />";
echo "super site <br />";
?>
<a href="http://localhost/0011_pageconnexionphp/profil.php">profil</a>
<br />
<a href="http://localhost/0011_pageconnexionphp/page.php?deconnect=true">déconnexion</a>