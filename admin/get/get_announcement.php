<?php 

include('../../session.php');

$id = mysqli_real_escape_string($db,$_GET['id']);
$sql = "SELECT DISTINCT * FROM announcement WHERE aid='$id'";
$result = mysqli_query($db,$sql);
$data = mysqli_fetch_array($result);

echo json_encode($data);

?>
