
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TATİL İSTANBUL | Giriş Formu</title>
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
    
    <a href="../../index2.html"><b>Tatil</b>İstanbul</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Giriş Formu</p>
    <?php echo $this->session->flashdata('flash_message'); ?>
   
    <?php $fattr = array('class' => 'form-signin');
         echo form_open(site_url().'auth/login/', $fattr); ?>

      <div class="form-group has-feedback">
        <?php echo form_input(array(
          'name'=>'email', 
          'id'=> 'email', 
          'placeholder'=>'Email', 
          'class'=>'form-control', 
          'value'=> set_value('email'))); ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?php echo form_error('email') ?>
      </div>



      <div class="form-group has-feedback">
        <?php echo form_password(array(
          'name'=>'password', 
          'id'=> 'password', 
          'placeholder'=>'Şifre', 
          'class'=>'form-control', 
          'value'=> set_value('password'))); ?>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
           <?php echo form_error('password') ?>
      </div>
      <div class="row">
     
        <!-- /.col -->
        <div class="col-xs-12">
          
          <?php echo form_submit(array('value'=>'Giriş Yap', 'class'=>'btn btn-primary btn-block btn-flat')); ?>
        <?php echo form_close(); ?>

        </br>

        <div class="form-group">
                  
                  
                 

                  <div class="col-sm-6">
                   <p><a href="<?php echo site_url();?>auth/register">Yeni Üye</a></p>
                  </div>

                  <div class="col-sm-6">
                     <p><a href="<?php echo site_url();?>auth/forgot"> Şifremi Unuttum</a></p>
                  </div>
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
