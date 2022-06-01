<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/sidebar.php"); ?>
<?php
  $bid = $_GET['bid'];
  $name = $_GET['name'];
  $course = $_GET['course'];
  $_SESSION['bid'] = $bid;
  $_SESSION['cname'] = $name;
  $_SESSION['course'] = $course;
 ?>
<?php include("functions/certificates_functions.php"); ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $course; ?>&nbsp;Certificates of <?php echo $name; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Certificates</a></li>
              <li class="breadcrumb-item active">SMCC TVET</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php include("display/display_certificates.php"); ?>
<?php include("modal/certificates_modal.php"); ?>
<?php include("layout/footer.php"); ?>