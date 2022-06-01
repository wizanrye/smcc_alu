<?php

include('../../session.php');
$error = "okay";
$id = mysqli_real_escape_string($db,$_GET['cid']);
$sql = "DELETE FROM comment WHERE comment_id='$id'";
if (mysqli_query($db, $sql)) {
  	//echo "Alumni successfully banned!";
  	echo json_encode(array("statusCode"=>200));
} else {
  	$error = mysqli_error($conn);
  	echo json_encode(array("statusCode"=>$error));
}	
//echo $error;
?>