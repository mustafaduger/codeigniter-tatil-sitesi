
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ECOMMERCE | Yönetici Giriş Formu</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <link rel="stylesheet" href="<?php echo base_url('assets/admin/');?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/');?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/');?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/');?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/');?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>TATİL</b>İstanbul</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Yönetici Giriş Formu</p>
              
              

    <p class="text-red"><?php echo $this->session->flashdata('message'); ?></p>
             
     <?php echo validation_errors(); ?>
    <!-- //<?php /*echo validation_errors()*/; ?> -->
    <form action="<?php echo base_url('auth/login'); ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="identity" class="form-control" placeholder="Email Adresinizi Giriniz">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Şifrenizi Giriniz">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
     
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Giriş Yap</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

</body>
</html>