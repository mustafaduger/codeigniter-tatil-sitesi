
<!DOCTYPE html>

<html lang="tr">

<head>
    <?php $this->load->view('front/include/head'); ?> 
    <?php $this->load->view('front/eating/include/page_style'); ?>
	
</head>

<body>

	<?php $this->load->view('front/include/header'); ?>
	<?php $this->load->view('front/eating/include/slider'); ?>
	
	<main>
		<?php $this->load->view('front/eating/breadcumb'); ?>
		<!-- Position -->

		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- End Map -->

		<div class="container margin_60">

			<div class="row">
				<?php $this->load->view('front/eating/include/sidebar'); ?>
				<?php $this->load->view('front/eating/main_content'); ?>
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</main>
	<!-- End main -->

	<?php $this->load->view('front/include/footer'); ?>
	<!-- End footer -->
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- Search Menu -->
	<!-- <div class="search-overlay-menu">
		<span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
		<form role="search" id="searchform" method="get">
			<input value="" name="q" type="search" placeholder="Search..." />
			<button type="submit"><i class="icon_set_1_icon-78"></i>
			</button>
		</form>
	</div> --><!-- End Search Menu -->

	<!-- Common scripts -->
	<?php $this->load->view('front/eating/include/page_script'); ?>

	<!-- Specific scripts -->
	<!-- Cat nav mobile -->
	
</body>

</html>