<?php
include('../../session.php');

$bid = $_SESSION['bid'];
$name =  $_SESSION['cname'];
$course = $_SESSION['course'];

date_default_timezone_set('Asia/Kuala_Lumpur');    

$error = "";
$certno = "";
$certtitle = "";
$certven = "";
$chost = "";
$certstart = "";
$certend = "";
$certgd = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){

  	$certno = mysqli_escape_string($db,$_POST['certno']);
    $certtitle = mysqli_escape_string($db,$_POST['certtitle']);
    $chost = mysqli_escape_string($db,$_POST['chost']);
    $certven = mysqli_escape_string($db,$_POST['certven']);
    $certstart = mysqli_escape_string($db,$_POST['certstart']);
    $certend = mysqli_escape_string($db,$_POST['certend']);
    $certgd = mysqli_escape_string($db,$_POST['certgd']);
    $sql = "INSERT INTO certificates(cert_given_number,cert_title,cert_venue,cert_host,cert_start_date,cert_end_date,cert_given_date,bid) VALUES('$certno','$certtitle','$certven','$chost','$certstart','$certend','$certgd','$bid')";
    if ($db->query($sql)) {
        echo json_encode(array("statusCode"=>200));     
    }else{
        $error = $db->error;
        echo json_encode(array("statusCode"=>$error));
    }
}

?>
