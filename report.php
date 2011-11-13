<?php

if (!isset($_COOKIE['Login']) || !isset($_COOKIE['username']) )
	header("Location: login.html"); 
else {	



?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<h1> Find report form </h1>




<?php





if (!isset($_POST['level'])) {
	
	
	
	$level = 0;

}
else {
	$level = (int) $_POST['level'];

}


function correct_input() {
	

		if (isset($_POST['building']) && $_POST['building']!='' &&
			isset($_POST['level1']) && isset($_POST['level2']) &&
			isset($_POST['level3']) && 
			isset($_POST['found1']) && isset($_POST['found2']) &&
			isset($_POST['found3']) && $_POST['found1']!='' && $_POST['found2']!=''
			&& $_POST['found3']!='') {
			
		
		if (isset($_POST['description']) && strlen($_POST['description'])>150)
			return false;
			
		if (preg_match("/[0-9][0-9]/",$_POST['found1']) &&
			preg_match("/[0-9][0-9]/",$_POST['found2']) &&
			preg_match("/[0-9][0-9][0-9][0-9]/",$_POST['found3']) &&
			preg_match("/[0-9]+/",$_POST['building'])
			
		
		)
		
			 {
		
		
		
		
		$day = (int) $_POST['found1'];
		$month= (int) $_POST['found2'];
		$year = (int) $_POST['found3'];
		return checkdate($month,$day,$year);	
		
			 }
			 
			}
			 
	return false;		 
			
			
		
	
}


if ($level==4 && correct_input() ) {
	
	
	
	
	$name1 = $_POST['level1'];
	$name2 = $_POST['level2'];
	$name3 = $_POST['level3'];

	
	
$db=new mysqli('localhost','root','Montefiore11','lostandfound');

$rs = $db->query("select id from categories where name='".$name1."'");
$arr1 = $rs->fetch_row();
$id1 = $arr1[0];

$rs = $db->query("select id from categories where parentkey=".$id1." and name='".$name2."'");
$arr2 = $rs->fetch_row();
$id2 = $arr2[0];

$rs = $db->query("select id from categories where gparentkey=".$id1." and parentkey=".$id2." and name='".$name3."'");
$arr3 = $rs->fetch_row();
$id3 = $arr3[0];
	
	
$detailid = (int) $id1.$id2.$id3;	
if (isset($_POST['description']))
	$description = $_POST['description'];
else
	$description='';
if (isset($_POST['other']))
	$other = $_POST['other'];	
else
	$other='';
	
$building = (int) 	$_POST['building'];
$date = $_POST['found3'].'-'.$_POST['found2'].'-'.$_POST['found1'];


$submitted = date("Y-m-d",time());
$username=$_COOKIE['username'];

$idnumber = 24215694;



$query = "insert into found values (null,
'".$username."',
'".$idnumber."',
'".$detailid."',
'".$other."',
'".$description."',
'".$building."',
'".$date."',
'".$submitted."',null,null,null)";

if (!$db->query($query))
	echo "<h1> error </h1>";
else
	echo "<h1> Thanks for reporting </h1>";


$db->close();	

}

else {
	
	echo "<h3> Select description <h3>";
	
	if ($level==4) {
		$level = 0;
		echo "Please fill all required fields marked with *";
		
	}


?>


<form name="report" action = "report.php" method="post" >
<input type="hidden" name="level"  />

<?php

	$db=new mysqli('localhost','root','Montefiore11','lostandfound');
	
	
	
	if ($level>=0) {
		
		
		
		$rs  = $db->query("select name from categories where parentkey=0");
		
		if (!isset($_POST['level1']))
			echo "<input type='hidden' name='level1'/>";
		else {
			$value = $_POST['level1'];
			echo "<input type='hidden' value='".$value."' name='level1' />";
			
		}
	
		echo "<select name='categories1' size='5' onchange='change_level(1)'>";
		
		
		while (($array = $rs->fetch_row())!=null) {
		
			
			echo '<option>'. $array[0]. '</option>';
				
			
		}
			
		
		echo "</select>";
		
		
		
	}
	
	
	
	if ($level>=1) {
		
		$query = "select id from categories where parentkey=0 and name='".$_POST['level1']."'";

		$rs  = $db->query($query);
		$array  = $rs->fetch_row();
		$id = $array[0];
		$query="select name from categories where parentkey=".$id." and gparentkey=0";
		$rs  = $db->query($query);
		
		
		if (!isset($_POST['level2']))
			echo "<input type='hidden' name='level2'/>";
		else {
			$value = $_POST['level2'];
			echo "<input type='hidden' value='".$value."' name='level2' />";
			
		}
	
		echo "<select name='categories2' size='5' onchange='change_level(2)'>";
		
		
		while (($array = $rs->fetch_row())!=null) {
		
			
			echo '<option>'. $array[0]. '</option>';
				
			
		}
			
		
		echo "</select>";
	
		
			
		
		
	}
	
	
	
	
		if ($level>=2) {
		
		$query = "select id from categories where parentkey=0 and name='".$_POST['level1']."'";
	


		$rs  = $db->query($query);
		$array  = $rs->fetch_row();
		$id = $array[0];
		$query="select id from categories where parentkey=".$id." and gparentkey=0 and name='".$_POST['level2']."'";
		
		$rs  = $db->query($query);
		$array  = $rs->fetch_row();
		$id2 = $array[0];
		
		$query="select name from categories where parentkey=".$id2." and gparentkey=".$id;
		$rs  = $db->query($query);
		
				if (!isset($_POST['level3']))
			echo "<input type='hidden' name='level3'/>";
		else {
			$value = $_POST['level3'];
			echo "<input type='hidden' value='".$value."' name='level3' />";
			
		}
	
		echo "<select name='categories3' size='5' onchange='change_level(3)'>";
		
		
		while (($array = $rs->fetch_row())!=null) {
		
			
			echo '<option>'. $array[0]. '</option>';
				
			
		}
			
		
		echo "</select>";
	}
		
	if ($level==3 && $_POST['level3']=='other') {
		

		?>
        
        	<br/>
            Please specify: <input type="text" name="other"/>
            
        
        
        <?php
		
		
	}
	
	?>		
	
    
    
    <br/>
    
   Additional Description: <br>
 <textarea  name="description" rows="5" cols="20" wrap="physical">
    </textarea><br>

*Building:   <input type="text" maxlength="4" size="4" name="building"/><br>

*Date found (dd/mm/yyyy) <input type="text" maxlength="2" size="2"name="found1" /> / 
<input type="text" maxlength="2" size="2"name="found2" /> / <input type="text" maxlength="4" size="4"name="found3" />  <br>




    	
	<input type="submit" value="report" onClick="change_level(4)"/>

</form>	
	
<?php

}

?>










<script type="text/javascript">






function change_level(level) {
	

var form = document.forms[0];

form.elements['level'].value=level;
if (level==1) {
	form.elements['level1'].value=form.elements['categories1'].value;
	form.submit();
}
if (level==2) {
	form.elements['level2'].value=form.elements['categories2'].value;
	form.submit();
	
	
}


if (level==3)  {
	form.elements['level3'].value=form.elements['categories3'].value;
	form.submit();
	
}
	
}

if (level==4) {
	form.submit();
	
	
}



</script>








</body>
</html>
<?php

}


?>