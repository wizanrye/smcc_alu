<?php

include('../../session.php');
$error = "okay";
$id = mysqli_real_escape_string($db,$_GET['ccid']);
$sql = "DELETE FROM course WHERE course_id='$id'";
if (mysqli_query($db, $sql)) {
    delete_batch($db,$id);
    echo json_encode(array("statusCode"=>200)); 	
} else {
  	$error = mysqli_error($conn);
    echo json_encode(array("statusCode"=>$error));
}

function delete_batch($db,$id){
  $sql = "DELETE FROM batch WHERE course_id='$id'";
  if (mysqli_query($db, $sql)) {
    
  }
} 


?>
