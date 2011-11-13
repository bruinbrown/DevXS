<?php


$db = new mysqli('localhost','root','Montefiore11','lostandfound');
$pass = sha1("antonroman");
$query = "insert into users values('rs8g10','".$pass."')";
$db->query($query);






?>