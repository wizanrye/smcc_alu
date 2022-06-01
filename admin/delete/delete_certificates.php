<?php
include('../../session.php');
$bid = $_SESSION['bid'];
$name =  $_SESSION['cname'];
$course = $_SESSION['course'];
$error = "okay";
$cid = mysqli_real_escape_string($db,$_GET['ccid']);
$sql = "DELETE FROM certificates WHERE cert_id='$cid'";
if (mysqli_query($db, $sql)) {
   //header("location: certificates.php?bid=".$bid."&&name=".$name."&&course=".$course);
	echo json_encode(array("statusCode"=>200));
} else {
  	//$error = mysqli_error($conn);
  	$error = $db->error;
    echo json_encode(array("statusCode"=>$error));
}	

?>
