<?php 
include('../../session.php');
$id = mysqli_real_escape_string($db,$_GET['id']);
$sql = "SELECT DISTINCT * FROM batch b,course c WHERE b.course_id = c.course_id AND b.bid='$id'";
$result = mysqli_query($db,$sql);
$data = mysqli_fetch_array($result);

echo json_encode($data);

?>