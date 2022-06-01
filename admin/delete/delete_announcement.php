<?php
include('../../session.php');
$error = "okay";
$id = mysqli_real_escape_string($db,$_GET['aid']);
$picpath = get_pic($db,$id);
$sql = "DELETE FROM announcement WHERE aid='$id'";
if(mysqli_query($db, $sql)) {
  	//echo "Alumni successfully banned!";
  	if(!$picpath==""){
  		unlink($picpath);
  	}
    delete_comment($db,$id);
  	echo json_encode(array("statusCode"=>200));
}else{
  	$error = mysqli_error($conn);
    echo json_encode(array("statusCode"=>$error));
}	

function delete_comment($db,$id){
  $sql = "DELETE FROM comment WHERE aid='$id'";
  if (mysqli_query($db, $sql)) {
   
  } 
}

function get_pic($db,$id){
	$picpath = "";
	$sql = "SELECT DISTINCT picpath FROM announcement WHERE aid='$id'";
	$result = $db->query($sql);
  	if($result->num_rows>0){
    	while($row=$result->fetch_assoc()){
    		$picpath = "../".$row['picpath'];
    	}
	}
	return $picpath;
}

?>
