<?php
include('../../session.php');

$id = $_SESSION['aid'];
$name = $_SESSION['aname'];

date_default_timezone_set('Asia/Kuala_Lumpur');    

$error = "";
$title = "";
$batch = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){

  	$course = mysqli_escape_string($db,$_POST['course']);
    $batch = mysqli_escape_string($db,$_POST['batch_year']);
    $sql = "INSERT INTO batch(course_id,alumni_id,batch_year) VALUES('$course','$id','$batch')";
    if ($db->query($sql) === TRUE) {
        echo json_encode(array("statusCode"=>200));
    }else{
        //echo $db->error;
        $error = $db->error;
        echo json_encode(array("statusCode"=>$error));
    }
}

?>