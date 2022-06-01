<?php 
include('../../session.php');

$id = mysqli_real_escape_string($db,$_GET['id']);
$sql = "SELECT DISTINCT * FROM certificates c,batch b WHERE c.bid = b.bid AND c.cert_id='$id'";
$result = mysqli_query($db,$sql);
$data = mysqli_fetch_array($result);

echo json_encode($data);

?>