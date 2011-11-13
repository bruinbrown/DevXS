<?php
if (!isset($_COOKIE['Login']) || !isset($_COOKIE['username']) )
	header("Location: login.php"); 
else {	

?>

<?php

	require_once("header.php");
	
	?>

  
 <h2 align="center"> My reports </h2>
  <p>&nbsp;</p>
  <p align="center" ><a class="link" href="display_findings.php"> My findings</a></p>
  <p align="center"><a class="link" href="display_items.php?scope=local"> My losses </a></p>

 <p>&nbsp;</p>
  
  
  
  
  <?php
}
  
  
  ?>

  <?php
  
  
  require_once("footer.html");
  
  ?>
  