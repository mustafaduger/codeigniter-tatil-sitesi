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
<?php $this->load->view('admin/images/breadcrumb'); ?>
<?php $this->load->view('admin/images/main_content'); ?>
</div>
<?php $this->load->view('admin/include/footer'); ?>
</div>
<?php $this->load->view('admin/include/script'); ?>

</body>
</html>
