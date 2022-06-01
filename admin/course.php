<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/sidebar.php"); ?>
<?php include("functions/course_functions.php"); ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Course</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Course</a></li>
              <li class="breadcrumb-item active">SMCC TVET</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php include("display/display_course.php"); ?>
<?php include("modal/course_modal.php"); ?>
<?php include("layout/footer.php"); ?>