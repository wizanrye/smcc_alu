<?php
include('../../session.php');

$id = $_SESSION['userid'];
$pic = $_SESSION['pic'];
date_default_timezone_set('Asia/Kuala_Lumpur');    

$error = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $announcement = mysqli_escape_string($db,$_POST['annId']);
  $content = addslashes($_POST['comtxt']);
  $date_insert = date("Y-m-d h:i:s");
  $sql = "INSERT INTO comment(aid,userid,comment_content,comment_date) VALUES('$announcement','$id','$content','$date_insert')";
  if ($db->query($sql) === TRUE) {
     // echo json_encode(array("statusCode"=>200));
    header("location: ../index.php");
  }else{
      $error = $db->error;
      echo $error;
    //  echo json_encode(array("statusCode"=>$error));
  }
}

?>