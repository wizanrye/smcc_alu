  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Certificates</h3>
                <button class="btn btn-success btn-sm" style="float:right;" onclick="display_certificate_add_modal()">Add Certificate</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Venue</th>
                    <th>Host</th>
                    <th>Coverage</th>
                    <th>Given Date</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php load_certificates($db,$bid); ?>
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
