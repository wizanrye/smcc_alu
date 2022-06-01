<?php
include('../../session.php');

$id = $_SESSION['userid'];
date_default_timezone_set('Asia/Kuala_Lumpur');    

$error = "";
$title = "";
$code = "";
$desc = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){

//  if(isset($_POST['btnComment'])){
  	$title = mysqli_escape_string($db,$_POST['ctitle']);
    $code = mysqli_escape_string($db,$_POST['ccode']);
    $desc = mysqli_escape_string($db,$_POST['cdesc']);
    $sql = "INSERT INTO course(course_title,course_code,course_description,userid) VALUES('$title','$code','$desc','$id')";
    if ($db->query($sql) === TRUE) {
        echo json_encode(array("statusCode"=>200));
    }else{
        $error = $db->error;
        echo json_encode(array("statusCode"=>$error));
    }
}

?>