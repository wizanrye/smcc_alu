<?php 
/*$pix = $_SESSION['pic'];
$timer = date("Y-m-d h:i:s");
if($pix==""){
  $pix = "../dist/img/default.png";
}*/

  function load_profile($db,$id){
    $sql = "SELECT DISTINCT * FROM alumni_profile ap,user u WHERE ap.alumni_id = u.alumni_id AND ap.alumni_id='$id'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count == 1) {
       echo '
            <div class="row">
              <div class="col-4">
                <label>SO Number:&nbsp;</label>'.$row['so_number'].'<br>
                <label>Address:&nbsp;'.$row['address'].'</label><br>
                <label>Birthdate:&nbsp;</label>'.$row['birthdate'].'<br>
              </div>
              <div class="col-4">
                <label>Gender&nbsp;</label>'.$row['gender'].'<br>
                <label>Mobile Number:&nbsp;</label>'.$row['mobile'].'<br>
                <label>Email Address:&nbsp;</label>'.$row['email'].'<br>
              </div>
              <div class="col-4">
               
                <label>Company:&nbsp;</label>'.$row['company'].'<br>
                <label>Position&nbsp;</label>'.$row['position'].'<br>
              </div>
            </div>';
    }else{
      echo "Cannot fetch data";
    }
  }
?>

 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $name; ?></h3>
                <!--<button class="btn btn-success btn-sm" style="float:right;">Add Alumni</button>-->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <?php load_profile($db,$alumid); ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->