<?php



$username = $_POST["username"];
$password = $_POST["password"];


$encrypt =sha1 ( $password);

$db=@new mysqli('localhost','root','Montefiore11','lostandfound') or die (mysql_error());



$query = "SELECT * FROM users where id='".$username."' AND pass='".$encrypt."'";
$rs = $db->query($query);





if ( $rs->num_rows == 1 )
{
	header("Location: main.php");
	setcookie ( 'Login', true, time() + 60 * 60 );
	setcookie ( 'username', $username, time() + 60 * 60 );
	
}

else
{
	header("Location: login.php");
}

$db->close();

?>

