<?php
include('../../session.php');
$id = $_SESSION['aid'];
$name = $_SESSION['aname'];
$error = "okay";
$bid = mysqli_real_escape_string($db,$_GET['ccid']);
$sql = "DELETE FROM batch WHERE bid='$bid'";
if (mysqli_query($db, $sql)) {
  delete_certificates($db,$bid);
  //header("location: course_history.php?aid=".$id."&&name=".$name);
  echo json_encode(array("statusCode"=>200));
} else {
  	$error = mysqli_error($conn);
  	echo json_encode(array("statusCode"=>$error));
}	
//echo $error;

function delete_certificates($db,$id){
  $sql = "DELETE FROM certificates WHERE bid='$id'";
  if (mysqli_query($db, $sql)) {
    
  }
} 

?>
