<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OkoaRider | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!--favicon-->
  <link rel="shortcut icon" type="text/css" href="<?php echo base_url().'public/img/favicon.ico';?>">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url().'public/plugin/bootstrap/dist/css/bootstrap.min.css';?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'public/plugin/font-awesome/css/font-awesome.min.css';?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url().'public/plugin/Ionicons/css/ionicons.min.css';?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'public/css/AdminLTE.min.css';?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url().'public/plugin/iCheck/square/blue.css';?>">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url();?>"><b>Okoa</b>Rider</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Enter your Credentials to Sign in</p>
    <?php echo $this->session->flashdata('login_msg'); ?>
    <form action="<?php echo base_url().'authenticate';?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="<?php echo $auth_request_url;?>" class="btn btn-block btn-social btn-success btn-flat">
        <i class="fa fa-car"></i> Sign in using Uber
      </a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="<?php echo base_url().'register';?>" class="text-center">Register a new Account</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url().'public/plugin/jquery/dist/jquery.min.js';?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url().'public/plugin/bootstrap/dist/js/bootstrap.min.js';?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url().'public/plugin/iCheck/icheck.min.js';?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
