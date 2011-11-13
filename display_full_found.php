<?php
if (!isset($_COOKIE['Login']) || !isset($_COOKIE['username']) )
	header("Location: login.php"); 
else {
	
	
	?>

<?php

	require_once("header.php");
	
	echo "<p align='center'> <a href='display_findings.php'> Back to my findings </a></p>";
	
	
	?>
    
    <?php
	
		
		if (!isset($_GET['itemid']))
			echo "no item id is found";
		else {
	
	
	
	
			$itemid = $_GET['itemid'];
			
			$db=new mysqli('localhost','root','Montefiore11','lostandfound');
			
			$rs = $db->query("select * from found where username='".$_COOKIE['username']."' and  itemid='".$itemid."'");
			if ($rs->num_rows == 0)
				echo "error";
			else
			 {
				
				
				echo "<h2 align='center'> Item details </h2>";
				$array = $rs->fetch_assoc();
				
				echo "<table>";
				
				echo "<tr> <th> item id <th> ";
				echo "<td> ".$array['itemid']." </td>";
				
				
				
				$digits = str_split($array['detailid']);
			
			
			if ($digits[2]!=9) 
			$query = "select name from categories where id=".$digits[2]." and parentkey=".							$digits[1]." and gparentkey=".$digits[0];
			else
				
			$query = "select name from categories where id=".$digits[1]." and parentkey=".							$digits[0];
			$rset = $db->query($query);
			$arr = $rset->fetch_assoc();
			$type = $arr['name'];
				
				
				
				echo "<tr> <th> detail type <th> ";
				echo "<td> ".$type." </td>";
				
				echo "<tr> <th> other <th> ";
				echo "<td> ".$array['other']." </td>";
				
				echo "<tr> <th> description <th> ";
				echo "<td> ".$array['description']." </td>";
				
				
				
				echo "<tr> <th> Lost in building:  <th> ";
				echo "<td> ".$array['building']." </td>";
				
				echo "<tr> <th> Date found <th> ";
				echo "<td> ".$array['found']." </td>";
				
				echo "<tr> <th> Date submitted  <th> ";
				echo "<td> ".$array['submitted']." </td>";
				
				 echo "</table>";
				 
		
				 
				 $rs = $db->query("select * from lost where resolved is null and username!='".$array['username']."' and detailid=".$array['detailid']);
					echo "<b> note: </b>";
					if ($rs->num_rows==0)
						echo "no loss reports match your description so far";
					else
						echo "we may have found the owner. We will contact you shortly in case match is correct";
				 
				 
				 
			 }
		
		
		}
		
	
	
	?>
    
          
  <?php
  
  
  require_once("footer.html");
}
  ?>
