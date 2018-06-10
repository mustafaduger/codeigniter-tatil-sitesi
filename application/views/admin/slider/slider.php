<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('admin/include/head'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>
<div class="content-wrapper">
<?php $this->load->view('admin/slider/breadcrumb'); ?>
<?php $this->load->view('admin/slider/main_content'); ?>
</div>
<?php $this->load->view('admin/include/footer'); ?>
</div>
<?php $this->load->view('admin/include/script'); ?>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>