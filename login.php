<?php

	require_once("header.php");
	
	?>


<?php

if (isset($_COOKIE['Login']) || isset($_COOKIE['username']) ) {
	
	echo "<h2 align='center'> Welcome ".$_COOKIE['username']." </h2>";
	echo "<h3 align='center'> <a class='link' href='logout.php'> Log out </h3>";
}
else {
?>


<div align="center">
<h2> Log in </h2>
<form name="0.1_login" action="validate_login.php" method="post" onsubmit="return window.confirm(&quot;You are submitting information to an external page.\nAre you sure?&quot;);">
Username:<input type="text" name="username"> <br/>
Password:<input type="password" name="password"> <br/>
<input type="submit" value="Submit">
</form>
<br />

<a class = 'link' href = 'processes.php' > Not a user </a>
</div>


<?php
}

?>


  <?php
  
  
  require_once("footer.html");
  
  ?>
  