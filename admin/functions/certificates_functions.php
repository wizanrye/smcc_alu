<?php
function load_certificates($db,$id){
  $sql = "SELECT DISTINCT * FROM certificates c, batch b WHERE c.bid=b.bid AND c.bid='$id'";
  $result = $db->query($sql);
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $cid = $row["cert_id"];
      $cert_num = $row["cert_given_number"];
      $title = $row["cert_title"];
      $venue = $row["cert_venue"];
      $host = $row["cert_host"];
      $coverage = $row["cert_start_date"].'-'.$row["cert_end_date"];
      $given_date = $row["cert_given_date"];

      echo '
      <tr>
        <td>'.$cert_num.'</td>
        <td>'.$title.'</td>
        <td>'.$venue.'</td>
        <td>'.$host.'</td>
        <td>'.$coverage.'</td>
        <td>'.$given_date.'</td>
        <td>
          <a class="btn btn-warning" onclick="editCertificates('.$cid.')">Edit</a>
          <a class="btn btn-danger" onclick="deleteCertificates('.$cid.')">Delete</a>
        </td>
      </tr>';
    }
  } 
}

?>