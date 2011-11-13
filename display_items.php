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

if ($scope=='local') {
	
	
	
	echo "<p align='center'> <a href='my_reports.php'> Back to my reports </a></p>";
	echo "<h2 align = 'center'>  My Lost items </h2>";
	
	
}
else
echo "<h2 align = 'center'>  Lost items </h2>";
  



	
	$db=new mysqli('localhost','root','Montefiore11','lostandfound');
	
	$query="select itemid, detailid, lost, submitted from lost where resolved is null ";
	if ($scope=='local')
		$query  = $query." and username ='".$_COOKIE['username']."'";
 	$rs = $db->query($query);
	if ($rs->num_rows==0)
		echo "no lost items have been found";
	else {
		
		echo "<table cellpadding='5'>";
		
		echo "<tr> <th> Item id </th> <th> Type </th> <th> Lost date</th><th> Submitted date</th>  </tr>";
		
		while (($row = $rs->fetch_assoc())!=null) {
		
			echo "<tr>";
			
			
			$itemid = $row['itemid'];
			$detailid = $row['detailid'];
			$date=$row['lost'];
			$submitted=$row['submitted'];
			$digits = str_split($detailid);
			
			echo "<td> <a href = display_full.php?itemid=".$itemid."&scope=".$scope." > ".$itemid."</a> </td>";
			if ($digits[2]!=9) 
			$query = "select name from categories where id=".$digits[2]." and parentkey=".							$digits[1]." and gparentkey=".$digits[0];
			else
				
			$query = "select name from categories where id=".$digits[1]." and parentkey=".							$digits[0];
			$rset = $db->query($query);
			$arr = $rset->fetch_assoc();
			$description = $arr['name'];
			echo "<td> ".$description."</td>";
		
			echo "<td> ".$date."</td>";
			echo "<td> ".$submitted."</td>";
			
			$year = (int) strtok($submitted,'-');
			$month = (int) strtok('-');
			$day= (int) strtok('-');
			$tstamp = mktime(0,0,0,$month,$day,$year);
			
			

			$diff = time()-$tstamp;
			if ($diff<86400)
				echo "<td> <b> new </b> </td>";
				
			
			echo "</tr>";
			
		}
		
			echo "</table>";
	}
 
 
	
	
	
	
	

	


?>  
  
  
  
  <?php
}
  
  
  ?>
  <?php
  
  
  require_once("footer.html");
  
  ?>
  

