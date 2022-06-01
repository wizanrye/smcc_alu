<?php

function load_course($db){
  $sql = "SELECT DISTINCT * FROM course";
  $result = $db->query($sql);
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $course_id = $row["course_id"];
      $title = $row["course_title"];
      $code = $row["course_code"];
      $description = $row["course_description"];

      echo '
      <tr>
        <td>'.$code.'</td>
        <td>'.$title.'</td>
        <td>'.$description.'</td>
        <td>
          <a class="btn btn-warning" onclick="editCourse('.$course_id.')">Edit</a>
          <a class="btn btn-danger" onclick="deleteCourse('.$course_id.')">Delete</a>
        </td>
      </tr>';
    }
  } 
}

?>