<?php


if (isset($_COOKIE['Login']) || isset($_COOKIE['username']) ) {
	

	setcookie("Login","",time()-3600);
		setcookie("username","",time()-3600);
	header("Location: login.php");
	
}




?>