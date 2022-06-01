<?php 
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
 
require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php'; 

$mail = new PHPMailer; 

$mail->isSMTP();                      // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;               // Enable SMTP authentication 
$mail->Username = 'marwilryson23@gmail.com';   // SMTP username 
$mail->Password = 'ryewizanwilmar32';   // SMTP password 
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587;                    // TCP port to connect to 
$mail->CharSet = 'UTF-8';
 
// Sender info 
$mail->setFrom('marwilryson23@gmail.com', 'Wilson Rey Sevilla'); 
$mail->addReplyTo('marwilryson23@gmail.com', 'Wilson Rey Sevilla'); 

//send_email($mail);

function send_email($mail){
	 
	// Add a recipient 
	$mail->addAddress('marwilryson23@gmail.com'); 
		 
	//$mail->addCC('cc@example.com'); 
	//$mail->addBCC('bcc@example.com'); 
		 
	// Set email format to HTML 
	$mail->isHTML(true); 
		 
	// Mail subject 
	$mail->Subject = 'Grand Alumni Homecoming 2022'; 
		 
	// Mail body content 
	$bodyContent = '<h1>Grand Alumni Homecoming 2022</h1>' 
		.'<p><b>What</b>: SMCC Grand Alumni Homecoming 2022</p>'
		.'<p><b>Who:</b> SMCC Alumni</p>'
		.'<p><b>When</b>: May 31, 2022</p>'
		.'<p><b>Where</b>: SMCC Amphiteather</p>'
		.'<img src="cid:image">'; 
	$mail->Body    = $bodyContent; 
	$mail->AddEmbeddedImage(dirname(__FILE__).'/post_img/6eb051e518b386056032f39562184dc1.png','image'); 

	// Send email 
	if(!$mail->send()) { 
		echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
	} else { 
		echo 'Message has been sent.'; 
	} 

}

function send_temp_pwd($mail,$recipient,$temp_pwd,$db,$id){
	//$response = "";
	// Add a recipient 
	$mail->addAddress($recipient); 
		 
	//$mail->addCC('cc@example.com'); 
	//$mail->addBCC('bcc@example.com'); 
		 
	// Set email format to HTML 
	$mail->isHTML(true); 
		 
	// Mail subject 
	$mail->Subject = 'Password Recovery from SMCC Alumni System'; 
		 
	// Mail body content 
	$bodyContent = '<p>Here is your temporary password:</p>' 
		.'<p><b>'.$temp_pwd.'</b></p>'
		.'<p>Note: Please change your password after logging in.</p>'
		.'<img src="cid:image">';
	$mail->Body = $bodyContent; 
	$mail->AddEmbeddedImage(dirname(__FILE__).'/logo.png','image'); 

	// Send email 
	if(!$mail->send()) { 
		echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
	} else { 
		//echo 'Message has been sent.'; 
		update_user_pwd($db,$id,$temp_pwd);
	}
}

function update_user_pwd($db,$id,$pwd){
	$sql = "UPDATE user SET password='$pwd' WHERE userid='$id'";
	if (mysqli_query($db, $sql)) {
	    echo json_encode(array("statusCode"=>200)); 
	} else {
	    echo $db->error;
	    echo json_encode(array("statusCode"=>$error));
	} 
}

?>