<?php
   include("config.php"); //connection sa database
   session_start(); //maghimo user session
   
   if(isset($_SESSION['login_user'])){
      header("location:index.php"); //mu redirect sa index.php
      die(); //display sa error, pwede rani wala
   }
   
   $error = ""; //nagdeclare ug error nga variable

   if($_SERVER["REQUEST_METHOD"] == "POST") { //check if naay post nga nahitabo sa form
      $myusername = mysqli_real_escape_string($db,$_POST['username']); //nag initialize ug variable $myusername
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); //nag initialize ug variable $mypassword

      //mag query sa table nga user, akumni_profile
      $sql = "SELECT DISTINCT * FROM user u,alumni_profile a WHERE u.username = '$myusername' and u.password = '$mypassword' AND a.alumni_id = u.alumni_id";
      $result = mysqli_query($db,$sql); //kaw-on tanan result sa query
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC); //isulod sa array ang query
      $count = mysqli_num_rows($result); //check pila ka tanan nga record
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      $ban = ""; //declare ug variable $ban
      if(isset($row["is_ban"])){ //check if naa bay sulod nga data ang is_ban
        $ban = $row["is_ban"]; //ang data ni is_ban ihatag kang $ban
      }

      if($count == 1) {
         if($ban=="YES"){
            $error = "Your account has been banned by the system admin.";
         }else if($ban=="NO"){
          $_SESSION['login_user'] = $myusername;
          $_SESSION['usertype'] = $row["usertype"];
          $_SESSION['userid'] = $row["userid"];
          $_SESSION['alumid'] = $row["alumni_id"];
          $_SESSION['pic'] = $row["picture"];
          $_SESSION['fullname'] = $row["fname"]."&nbsp;".$row["mname"]."&nbsp;".$row["lname"]."&nbsp;".$row["ext"];
          unset($_SESSION['username']);
          unset($_SESSION['password']);
          header("location: index.php");
         }
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMCC TVET Alumni | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="icon" href="favicon.ico"/>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img class="img-circle" src="logo.png" height="128px" width="128px" alt="User Image"><br>
      <a href="../../index2.html" class="h1"><b>SMCC</b><br>&nbsp;TVET&nbsp;Alumni</a>
    </div>
    <div class="card-body">

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name = "username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!--<div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>-->
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>-->
      <!-- /.social-auth-links -->
      <hr style="border:1px solid #025;">
      <p class="mb-2">
        <a href="recoverpassword.php">I forgot my password</a>
      </p>
      <!--<p class="mb-1">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>-->
      <p class="mb-0">
         <i style="color:red;"><?php echo $error; ?>  </i>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
