<?php
   include("config.php");
   session_start();

   $error = "";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      //profile
      $sonum = mysqli_real_escape_string($db,$_POST['sonum']);
      $fn = mysqli_real_escape_string($db,$_POST['fname']);
      $mn = mysqli_real_escape_string($db,$_POST['mname']);
      $ln = mysqli_real_escape_string($db,$_POST['lname']);
      $ext = mysqli_real_escape_string($db,$_POST['ext']);

      $dob = mysqli_real_escape_string($db,$_POST['dob']);
      $addr = mysqli_real_escape_string($db,$_POST['address']);
      $gender = mysqli_real_escape_string($db,$_POST['gender']);

      $comp = mysqli_real_escape_string($db,$_POST['company']);
      $pos = mysqli_real_escape_string($db,$_POST['position']);
      $mob = mysqli_real_escape_string($db,$_POST['mobile']);
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $ut = "ALUMNI";
      $date_insert = date("m/d/Y h:i:s");
      //user
      $user = mysqli_real_escape_string($db,$_POST['user']);
      $pwd = mysqli_real_escape_string($db,$_POST['pwd']);
      $cpwd = mysqli_real_escape_string($db,$_POST['cpwd']);

      $id = "";

      if($pwd == $cpwd){

        $sql = "INSERT INTO alumni_profile(so_number,fname,mname,lname,ext,birthdate,gender,company,position,mobile,email,address,inserted_at) VALUES('$sonum','$fn','$mn','$ln','$ext','$dob','$gender','$comp','$pos','$mob','$email','$addr','$date_insert')";

        if ($db->query($sql) === TRUE) {
          $id = $db->insert_id;
          create_new_user($db,$user,$pwd,$date_insert,$ut,$id,$gender);
          $_SESSION['alumid'] = $id;
          $_SESSION['login_user'] = $user;
          $_SESSION['usertype'] = $ut;
          $_SESSION['fullname'] = $fn.'&nbsp;'.$mn.'&nbsp;'.$ln.'&nbsp;'.$ext;
          echo "
          <script>
            alert('Registered successfully');
            window.location.href = 'index.php';
          </script>";
         // header("location: index.php");
        } else {
          $error = $db->error;
        }
      }else{
        $error = "Password and confirmation password does not match";
        header("location: register.php");
      }
   }

   mysqli_close($db);

function create_new_user($db,$user,$pwd,$inserted,$usertype,$alumni_id,$gender){
  $pix = "../dist/img/avatar.png";
  $no_picture = "";
  if($gender=="Female"){
     $pix = "../dist/img/girl.png";
  }

  $sql = "INSERT INTO user(username,password,inserted_at,usertype,alumni_id,is_ban) VALUES('$user','$pwd','$inserted','$usertype','$alumni_id','NO')";
  if($db->query($sql) === TRUE){
    $_SESSION['pic'] = $pix;
    $_SESSION['userid'] = $db->insert_id;
  }else{

  }
}

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMCC | Alumni Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="icon" href="favicon.ico"/>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <a href="login.php">
              <span class="fa fa-arrow-circle-left"></span>
              <img class="img-circle" src="logo.png" height="64px" width="64px" alt="User Image"></a>&nbsp;&nbsp;SMCC Alumni Registration</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item" style="color:red;"><i><?php echo $error; ?></i></li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <form action="" method="post">
        <div class="row">
          <div class="col-lg-4">

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Personal Info</h5>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Firstname<i style="color:red;">*</i></label>
                  <input type="text" class="form-control" name="fname" placeholder="Enter firstname" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Middlename<i>(optional)</i></label>
                  <input type="text" class="form-control" name="mname" placeholder="Enter middlename">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Lastname<i style="color:red;">*</i></label>
                  <input type="text" class="form-control" name="lname" placeholder="Enter lastname" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Sr/Jr/I/..<i>(optional)</i></label>
                  <input type="text" class="form-control" name="ext" placeholder="Enter name extension">
                </div>
                <div class="form-group">
                  <label>Birth Date:</label>
                  <?php 
                    $set_date = date("Y-m-d");
                    echo '<input type="date" class="form-control" id="dob" name="dob" value="'.$set_date.'" required>';
                  ?>
                </div>
                <div class="form-group">
                  <label>Gender<i style="color:red;">*</i></label>
                  <select class="custom-select" name="gender">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Job Info</h5>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Current Company</label>
                  <input type="text" class="form-control" name="company" placeholder="Enter company">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Current Designated Position</label>
                  <input type="text" class="form-control" name="position" placeholder="Enter position">
                </div>
              </div>
            </div>

             <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Contact Info</h5>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Current Mobile No.</label>
                   <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;9999-999-9999&quot;" data-mask="" inputmode="text" name="mobile">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Current Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Current Address<i style="color:red;">*</i></label>
                  <input type="text" class="form-control" name="address" placeholder="Enter address" required>
                </div>
              </div>
            </div>

          </div>
          <div class="col-lg-4">

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">User Info</h5>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username<i style="color:red;">*</i></label>
                  <input type="text" class="form-control" name="user" placeholder="Enter username" value="" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password<i style="color:red;">*</i></label>
                  <input type="password" class="form-control" name="pwd" placeholder="Enter password" value="" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Confirm Password<i style="color:red;">*</i></label>
                  <input type="password" class="form-control" name="cpwd" placeholder="Enter password confirmation" value="" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">SO No.<i style="color:red;">*</i></label>
                  <input type="text" class="form-control" name="sonum" placeholder="Enter SO number" required>
                </div>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-footer">
                <div class="form-group">
                  <input type="submit" class="form-control btn btn-primary" value="Submit">
                </div>
              </div>
            </div>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        </form>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
   
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

  })

</script>
</body>
</html>
