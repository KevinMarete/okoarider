<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $page_title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!--styles-->
  <?php $this->load->view('template/styles_view'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!--header-->
    <?php $this->load->view('template/header_view'); ?>
    <!--sidebar-->
    <?php $this->load->view('template/sidebar_view'); ?>
    <!--content-->
    <?php $this->load->view($content_view); ?>
    <!--footer-->
    <?php $this->load->view('template/footer_view'); ?>
  </div>
  <!-- ./wrapper -->
  <!--scripts-->
  <?php $this->load->view('template/scripts_view'); ?>
</body>
</html>
