<?php

session_start();
if(isset($_GET["deconnect"]) && $_GET["deconnect"]){
	unset($_SESSION["connect"]);
} 
if (isset($_SESSION["connect"])) {
	$connect = $_SESSION["connect"];
}else{
	$connect = false;
}
if (empty($connect)){
	header("Location: http://localhost/0011_pageconnexionphp/");	
}

if (isset($_SESSION["username"])) {
	$username = $_SESSION["username"];
}else{
	$username = "";
}
// pas de balise de fin quand on inclut un php dans un autre php