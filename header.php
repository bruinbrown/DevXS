<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="design.css" rel="stylesheet" type="text/css" />


<style type="text/css">
#apDiv3 {
	position:absolute;
	width:200px;
	height:99px;
	z-index:3;
	left: 828px;
	top: 12px;
}
</style>
</head>


<div id="apDiv3">

<?php

if (isset($_COOKIE['Login']) && isset($_COOKIE['username'])) {
	
	echo $_COOKIE['username'];
	echo "<br/>";
	echo "<a class='link' href='logout.php'> Log out  </a> </p>";
	
}




?>


</div>
<p>
<div align="center" id="apDiv2">

<p>
<h1> Lost and Found </h1> 
</p>

<p>University of Awesome 
  <h2>&nbsp;</h2> </p>

</div>




<div id="apDiv1">
  <ul id="MenuBar1" class="MenuBarVertical">
    <li><a  href="main.php">Main</a>

    </li>
    
    <li><a href="login.php"> Log In</a></li>
    
     <li><a href="my_reports.php"> My reports </a></li>
     
     
     <li><a href="processes.php"> How it works</a></li>
    
    <li><a href="policy.php"> About</a></li>
    
    
    

  
    
    
  </ul>
</div>




<div id="content" data-collapsed="true">