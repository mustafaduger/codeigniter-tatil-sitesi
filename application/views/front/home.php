<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html lang="tr">
<head>
 <?php $this->load->view('front/include/head'); ?>
 
</head>
<body>
    <?php $this->load->view('front/include/header'); ?>  
    <?php $this->load->view('front/home/main_content'); ?>   
	<?php $this->load->view('front/include/footer'); ?>
    <?php $this->load->view('front/home/page_script'); ?>
    
  </body>
</html>