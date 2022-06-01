<?php
$id = $_SESSION['userid'];
$pic = $_SESSION['pic'];
date_default_timezone_set('Asia/Kuala_Lumpur');    

$error = "";

function detect_links($str){
  $url_regex = "/\b((https?:\/\/?|www\.)[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|\/)))/";

  preg_match_all($url_regex, $str, $matches);

  foreach($matches[0] as $match){
    //$match = check_url($match);
    $checker = check_url($match);
    if($checker===false){
       $anchor = "<a href='http://".$match."' target='_blank'>$match</a>";
    }else{
      $anchor = "<a href='$match' target='_blank'>$match</a>";
    }
    $str = str_replace($match, $anchor, $str);
  }

  return $str;
}

function check_url($mystring){
  $word = "https://";
  $a = strpos($mystring,$word);
  return $a;
}

function count_comment($aid,$db){
   $sql = "SELECT * FROM comment c, announcement a,user u,alumni_profile ap where c.aid='$aid' AND u.userid=c.userid AND a.aid = c.aid AND ap.alumni_id = u.alumni_id ORDER BY comment_id DESC";
    $result = $db->query($sql);
    $count = mysqli_num_rows($result);
    return $count;
}

function num_comment($aid,$db){
  $count = count_comment($aid,$db);
  $word = "";
  if($count > 1){
    $word = $count." comments";
  }else if($count == 0){
    $word = "No comments";
  }else{
    $word = $count." comment";
  }
  return $word;
}

function load_comment($aid,$db){
  $sql = "SELECT DISTINCT * FROM comment c, announcement a,user u,alumni_profile ap where c.aid='$aid' AND u.userid=c.userid AND a.aid = c.aid AND ap.alumni_id = u.alumni_id ORDER BY comment_id ASC";
  $result = $db->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $addins = "";
      $fullname = $row["fname"]."&nbsp;".$row["mname"]."&nbsp;".$row["lname"]."&nbsp;".$row["ext"];
      $id = $row["comment_id"];
      $userid = $row["userid"];
      $word = explode(" ",$row["comment_date"]);
      $i = $word[0];
      $pix = $row["picture"];
      if($pix==""){
        $pix = "../dist/img/default.png";
      }
      $comment_date = date("m/d/Y",strtotime($i));
      if($userid==1){
        $addins = '<span class="fas fa-edit"" onclick="editComment('.$id.')"></span>
          <a onclick="deleteComment('.$id.')"><span class="fas fa-times"></span></a>';
      }
      echo '
        <div class="card-comment">
          <img class="img-circle img-sm" src="'.$pix.'" alt="User Image">
          <div class="comment-text">
            <span class="username">'.
              $fullname.'
              <span class="text-muted float-right">'.$comment_date.'</span>'.$addins.'</span>
              '.nl2br($row["comment_content"]).
          '</div>
        </div>';
    }
  }
}
?>