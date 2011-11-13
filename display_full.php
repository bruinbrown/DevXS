<?php
if (!isset($_COOKIE['Login']) || !isset($_COOKIE['username']) )
	header("Location: login.php"); 
else {
	
	
	?>

<?php

	require_once("header.php");
	
	
		
	if (isset($_GET['scope']) && $_GET['scope']=='local')
		$scope='local';
	else
		$scope='global';

	
	?>
	
	

    
    
    

    
    <?php
	
		
		if (!isset($_GET['itemid']))
			echo "no item id is found";
		else {
	
	
	
	
			$itemid = $_GET['itemid'];
			
			$db=new mysqli('localhost','root','Montefiore11','lostandfound');
			
			$rs = $db->query("select * from lost where itemid='".$itemid."'");
			if ($rs->num_rows == 0)
				echo "error";
			else
			 {
				
				if ($scope=='local') 
	
	
	
	echo "<p align='center'> <a href='display_items.php?scope=local'> Back to my losses </a></p>";

else


				echo "<p align='center'> <a href = 'display_items.php'>Back to full list </a></p>
				"; 
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
				
				echo "<tr> <th> Date lost <th> ";
				echo "<td> ".$array['lost']." </td>";
				
				echo "<tr> <th> Date submitted  <th> ";
				echo "<td> ".$array['submitted']." </td>";
				
				 
				 echo "<tr> <th> image  <th> ";
				echo "<td> <img src='".$array['image']."' width='200' alt='no picture available' > </td>";
				
				echo "</table>";
				
				if ($array['username']!=$_COOKIE['username']) {
			
			$query = "select name from categories where id=".$digits[0];
							

			$rset = $db->query($query);
			$arr = $rset->fetch_assoc();
			
			$level1 = $arr['name'];
			
			
			
			$query = "select name from categories where id=".$digits[1]." and parentkey=".$digits[0];
							

			$rset = $db->query($query);
			$arr = $rset->fetch_assoc();
			
			$level2 = $arr['name'];
			
			
			$query = "select name from categories where id=".$digits[2]." and parentkey=".$digits[1]." and gparentkey=".$digits[0];
							

			$rset = $db->query($query);
			$arr = $rset->fetch_assoc();
			
			$level3 = $arr['name'];
			
			?>
            
            <form method="post" action="found.php">
            
            <?php
			
			echo "<input type='hidden' name='level1' value='".$level1."'/>";
			echo "<input type='hidden' name='level2' value='".$level2."'/>";
			echo "<input type='hidden' name='level3' value='".$level3."'/>";
			echo "<input type='hidden' name='level' value='3' />";
			
			echo "<p align='center'> <input type='submit' value='report as found'></p>";
			
			?>
            
            
            
            </form>
            
            <?php
			
			
			
					
					
					
					 
		 }
				 
				 
				 
				 
				 
				 
				 
				 if ($scope=='local') {
					 
					
					 $rs = $db->query("select * from found where resolved is null and username!='".$array['username']."' and detailid=".$array['detailid']);
					echo "<b> note: </b>";
					if ($rs->num_rows==0)
						echo "no find reports match your description so far";
					else
						echo "your item may have been found. We will contact you shortly in case match is correct";
					 
				 }
			 }
		
		
		}
		
	
	
	?>
    
          
  <?php
  
  
  require_once("footer.html");
}
  ?>
