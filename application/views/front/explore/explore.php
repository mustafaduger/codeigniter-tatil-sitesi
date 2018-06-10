<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html lang="tr">
<head>
 <?php $this->load->view('front/include/head'); ?> 
 <?php $this->load->view('front/explore/include/page_style'); ?>   
</head>
<body>
    <?php $this->load->view('front/include/header'); ?>
	<?php $this->load->view('front/explore/include/slider'); ?>

	<main>
	<?php $this->load->view('front/explore/breadcumb'); ?>
		<!-- End position -->
		<div class="container margin_60">
			<div class="row">
			<aside class="col-md-3 add_bottom_30">
			<?php $this->load->view('front/explore/include/sidebar') ?>
			</aside>
			<!-- End aside -->
    		<?php $this->load->view('front/explore/main_content'); ?> 
			</div>
			<!-- End row-->
		</div>
		<!-- End container -->
	</main>
	<?php $this->load->view('front/include/footer'); ?>
    <?php //$this->load->view('front/home/page_script'); ?>
    
  </body>
</html>