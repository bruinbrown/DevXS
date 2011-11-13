<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php

require_once('class.phpmailer.php');

$mail = new PHPMailer();  // create a new object

	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465; 
	$mail->Username = 'as8g10@gmail.com';  
	$mail->Password = 'Montefiore11';;           
	//$mail->SetFrom($from, $from_name);
	$mail->Subject = "sds";
	$mail->Body = "scdcsd";
	$mail->AddAddress("romaanton@ya.ru");
	$mail->addAttachment("changelog.txt");
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}


?>

<body>
</body>
</html>