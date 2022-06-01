<?php include("layout/header.php"); ?>
<?php include("functions/alumni_functions.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/sidebar.php"); ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Alumni</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Alumni</a></li>
              <li class="breadcrumb-item active">SMCC TVET</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<?php include("display/display_alumni.php"); ?>
<?php include("modal/modals.php"); ?>
<?php include("layout/footer.php"); ?>
