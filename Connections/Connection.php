<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Connection = "localhost";
$database_Connection = "lostandfound";
$username_Connection = "root";
$password_Connection = "Montefiore11";
$Connection = mysql_pconnect($hostname_Connection, $username_Connection, $password_Connection) or trigger_error(mysql_error(),E_USER_ERROR); 
?>