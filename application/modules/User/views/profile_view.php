<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Rider Profile
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Profile</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- /.col -->
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="settings">
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" value="<?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $this->session->userdata('email'); ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPromoCode" class="col-sm-2 control-label">PromoCode</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPromoCode" value="<?php echo $this->session->userdata('promo_code'); ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputUID" class="col-sm-2 control-label">UUID</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputUID" value="<?php echo $this->session->userdata('uuid'); ?>" readonly>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
  