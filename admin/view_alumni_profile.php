<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/sidebar.php"); ?>

<?php 
$alumid = $_GET['id'];
$name = $_GET['name'];
$pics = $_GET['pics'];
?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><img src="<?php echo $pics; ?>" width="120px" height="120px" class="img-rounded">&nbsp;<b><?php echo $name; ?></b></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo $name; ?></a></li>
              <li class="breadcrumb-item active">SMCC TVET</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php include("display/display_view_alumni_profile.php"); ?>
<?php include("layout/footer.php"); ?>