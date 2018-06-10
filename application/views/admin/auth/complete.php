<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TATİL İSTANBUL | Yönetici Giriş Formu</title>
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
    <p class="login-box-msg">Şifre Onaylama Formu</p>

    <!-- <h2>Almost There!</h2> -->
    <h5>Merhaba <span><?php echo $firstName; ?></span>. Kullanıcı adınız <span><?php echo $email;?></span></h5>
    <small>İşleminizi tamamlamak için şifrenizi 2 kere giriniz.</small>

    <?php 
    $fattr = array('class' => 'form-signin');
    echo form_open(site_url().'auth/complete/token/'.$token, $fattr); ?>
    
    
      <div class="form-group has-feedback">
         <?php echo form_password(array('name'=>'password', 'id'=> 'password', 'placeholder'=>'Şifre', 'class'=>'form-control', 'value' => set_value('password'))); ?>
         <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php echo form_error('password') ?>
    </div>
      <div class="form-group has-feedback">
        <?php echo form_password(array('name'=>'passconf', 'id'=> 'passconf', 'placeholder'=>'Şifre Tekrar', 'class'=>'form-control', 'value'=> set_value('passconf'))); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php echo form_error('passconf') ?>
        
      </div>

     <?php echo form_hidden('user_id', $user_id);?>

      <div class="row">
     
        <!-- /.col -->
        <div class="col-xs-12">
           <?php echo form_submit(array('value'=>'Onayla', 'class'=>'btn btn-primary btn-block btn-flat')); ?>
    <?php echo form_close(); ?>

        </br>

        

        <!-- /.col -->
      </div>
    </form>

    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

</body>
</html>
