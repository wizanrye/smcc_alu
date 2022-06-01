<?php $id = $_SESSION['userid']; ?>
  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Alumni</h3>
                <!--<button class="btn btn-success btn-sm" style="float:right;">Add Alumni</button>-->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Job</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php load_alumni($db,$id); ?>
                  </tbody>
                </table>
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
