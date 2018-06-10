	
				
				<div class="col-md-9">
					<div class="box_style_1">
						
						<?php foreach ($result as $row) : ?>
						<div class="post">
							<a href="<?php echo base_url('explorereadmoreview_controller/explorereadmoreviewById/'.$row->kesfet_id.'') ?>" title="blog_post.html"><img src="<?php echo base_url().$row->kesfet_tmb?>" alt="Image" class="img-responsive">
							</a>

							
							<h2><?php echo $row->kesfet_title ?></h2>
							<p><?php echo word_limiter($row->kesfet_detail,50) ?></p>
							<a href="<?php echo base_url('explorereadmoreview_controller/explorereadmoreviewById/'.$row->kesfet_id.'') ?>" class="btn_1" title="<?php echo $row->kesfet_title ?>">Devamını Oku</a>
						</div>
						<!-- end post -->

						<hr>
						<?php endforeach;?>

						
					</div>
					<!-- end box style -->
					<hr>
					
					<div class="text-center">
						<?php echo $page_links; ?>
						<!-- end pagination-->
					</div>
				</div>
				<!-- End col-md-9-->
			