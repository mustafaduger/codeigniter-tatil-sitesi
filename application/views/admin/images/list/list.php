<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('admin/include/head'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view('admin/include/header'); ?>
<script type="text/javascript">
    var base_url = "<?php echo base_url();?>";
	</script>
<?php $this->load->view('admin/include/sidebar'); ?>
<div class="content-wrapper">
<?php $this->load->view('admin/images/list/breadcrumb'); ?>
<?php $this->load->view('admin/images/list/main_content'); ?>
</div>
<?php $this->load->view('admin/include/footer'); ?>
</div>
<?php $this->load->view('admin/include/script'); ?>

</body>
</html>
