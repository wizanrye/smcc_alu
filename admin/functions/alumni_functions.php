<?php

function load_alumni($db,$id){
  $sql = "SELECT DISTINCT * FROM alumni_profile ap,user u WHERE ap.alumni_id <> '$id' AND ap.alumni_id = u.alumni_id ORDER BY ap.alumni_id ASC";
  $result = $db->query($sql);
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $uid = $row['userid']; 
      $apid = $row["alumni_id"];
      $pix = $row["picture"];
      $fullname = $row["fname"]."&nbsp;".$row["mname"]."&nbsp;".$row["lname"]."&nbsp;".$row["ext"];
      $address= $row["address"];
      $job = $row["position"];
      if($pix==""){
        $pix = "../dist/img/default.png";
      }
      $is_ban = $row["is_ban"];
      $ban_btn = '<button class="btn btn-warning" onclick="showProfile('.$uid.')">Ban</button>';
      if($is_ban=='YES'){
         $ban_btn = '<button class="btn btn-warning" onclick="showProfile2nd('.$uid.')">Unban</button>';
      }

      echo '
      <tr>
        <td><img src="'.$pix.'" class="img-circle img-md" alt="User Image"></td>
        <td>'.$fullname.'</td>
        <td>'.$address.'</td>
        <td>'.$job.'</td>
        <td>
          '.$ban_btn.
          '&nbsp; <a class="btn btn-success" href="course_history.php?aid='.$apid.'&&name='.$fullname.'">Course History</a>
           &nbsp; <a class="btn btn-default" href="view_alumni_profile.php?id='.$apid.'&&name='.$fullname.'&&pics='.$pix.'">View Full Profile</a>
        </td>
      </tr>';
    }
  } 
}

?>
