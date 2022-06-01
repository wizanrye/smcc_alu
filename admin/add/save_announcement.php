<?php
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
 
$mail->setFrom('marwilryson23@gmail.com', 'Wilson Rey Sevilla'); 
$mail->addReplyTo('marwilryson23@gmail.com', 'Wilson Rey Sevilla'); 

include('../../session.php');

$id = $_SESSION['userid'];
$pic = $_SESSION['pic'];
date_default_timezone_set('Asia/Kuala_Lumpur');    

$error = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $picpath = "";
  $content = addslashes($_POST['ann']);

  if(isset($_FILES['image'])==true){
    $tmp = $_FILES['image']['tmp_name'];
    $image = $_FILES['image']['name'];
    $size = $_FILES["image"]["size"];
    $error = $_FILES["image"] ["error"];
    if($tmp==null){
          
    }else{
      $picpath = save_to_folder($tmp,$image,$size,$error);
    }
  }
    
  $date_insert = date("Y-m-d h:i:s");
  $sql = "INSERT INTO announcement(userid,content,picpath,date_created) VALUES('$id','$content','$picpath','$date_insert')";
  if($db->query($sql) === TRUE) {
    send_to_all_email($mail,$db,$content,$picpath);
    echo json_encode(array("statusCode"=>200)); 
  }else{
    $error = $db->error;
    echo json_encode(array("statusCode"=>$error));
  }
}

function send_to_all_email($mail,$db,$content,$img){
  // echo $img;
  $sql = "SELECT DISTINCT email FROM alumni_profile WHERE alumni_id <> 1";
  $result = $db->query($sql);
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $email = $row['email'];
      if(!$email==""){
        if($img==""){
          send_announcement_no_img($mail,$email,$content);
        }else{
          send_announcement($mail,$email,$content,$img);
        }
      } 
    }
  }
}

function send_announcement($mail,$recipient,$content,$img){
  $mail->addAddress($recipient); 
  //$mail->addCC('cc@example.com'); 
  //$mail->addBCC('bcc@example.com'); 
     
  // Set email format to HTML 
  $mail->isHTML(true); 
     
  // Mail subject 
  $mail->Subject = 'SMCC TVET Alumni Announcement'; 
     
  // Mail body content 
  $bodyContent = $content
    .'<br><br><img src="cid:image">';
  $mail->Body = $bodyContent; 
  $mail->AddEmbeddedImage(dirname(__FILE__).'/'.$img,'image'); 

  // Send email 
  if(!$mail->send()) { 
    $error = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
   // echo json_encode(array("statusCode"=>$error));
   // echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
  } else {
    //echo 'Message has been sent.'; 
  }
}

function send_announcement_no_img($mail,$recipient,$content){
  $mail->addAddress($recipient); 
  //$mail->addCC('cc@example.com'); 
  //$mail->addBCC('bcc@example.com'); 
     
  // Set email format to HTML 
  $mail->isHTML(true); 
     
  // Mail subject 
  $mail->Subject = 'SMCC TVET Alumni Announcement'; 
     
  // Mail body content 
  $bodyContent = $content;
  $mail->Body = $bodyContent; 

  // Send email 
  if(!$mail->send()) { 
    $error = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
  //  echo json_encode(array("statusCode"=>$error));
    //echo ; 
  } else { 
    //echo 'Message has been sent.'; 
  }
}

function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}

function save_to_folder($tmp,$image,$size,$error){
  $picpath = "";
  $image_name = $_FILES['image']['name'];
  $et = explode(".",$image);
  $ext = $et[1];
  $get_random_string = getName(8);
  $hash = hash('md5', $get_random_string);
  $new_name = $hash.".".$ext;
  if ($error > 0){
    die("Error uploading file! Code $error.");
  }else{
    if($size > 10000000){ //conditions for the file{
        die("Format is not allowed or file size is too big!");
    }else{
      move_uploaded_file($_FILES["image"]["tmp_name"],"../../post_img/".$new_name);      
      $picpath="../post_img/".$new_name;
    }
  }
  return $picpath;
}

?>