<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Uber History
        <small>Ride Info</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">History</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="history_tbl" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>RequestID</th>
                    <th>CityName</th>
                    <th>Distance</th>
                    <th>Status</th>
                    <th>ProductID</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach ($histories as $history) {
                      echo '<tr><td>'.$history['request_id'].'</td><td>'.$history['start_city_name'].'</td><td>'.$history['distance'].'</td><td>'.$history['status'].'</td><td>'.$history['product_id'].'</td></tr>';
                    }
                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>RequestID</th>
                  <th>CityName</th>
                  <th>Distance</th>
                  <th>Status</th>
                  <th>ProductID</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<!-- page script -->
<script>
  $(function () {
    $('#history_tbl').DataTable({
      'pagingType': 'full_numbers'
    })
  })
</script>