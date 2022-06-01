<?php

function load_course($db,$id,$name){
  $sql = "SELECT DISTINCT * FROM batch b, course c, alumni_profile a WHERE b.course_id=c.course_id AND b.alumni_id=a.alumni_id AND b.alumni_id='$id'";
  $result = $db->query($sql);
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $bid = $row["bid"];
      $course_id = $row["course_id"];
      $title = $row["course_title"];
      $code = $row["course_code"];
      $batch = $row["batch_year"];

      echo '
      <tr>
        <td>'.$code.'</td>
        <td>'.$title.'</td>
        <td>'.$batch.'</td>
        <td>
          <a class="btn btn-warning" onclick="editCourseHistory('.$bid.')">Edit</a>
          <a class="btn btn-danger" onclick="deleteCourseHistory('.$bid.')">Delete</a>
          <a class="btn btn-success" href="certificates.php?bid='.$bid.'&&name='.$name.'&&course='.$title.'">Certificates</a>
        </td>
      </tr>';
    }
  } 
}

?>