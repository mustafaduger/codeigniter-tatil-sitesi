					<div class="widget">
						<form action="<?php echo base_url('exploreview_controller/exploreviewsearch')?>"  method="post">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Ara..." name="searchterm" id="searchterm"> 
							<span class="input-group-btn">
						<button class="btn btn-default" type="submit" style="margin-left:0;"><i class="icon-search"></i></button>
						</span>
						</div>
						</form>
						<!-- /input-group -->
					</div>
					<!-- End Search -->

					<hr>


					<div class="widget" id="cat_blog">
						<h4>Kategoriler</h4>
						<ul>
							<?php foreach (get_categoryexploreview() as $value) : ?>
								<li><a href="<?php echo base_url('exploreview_controller/explorelistbyCategory/'.$value->kategori_id.'') ?>"><?php echo $value->kategori_adi ?></a></li>
							<?php endforeach;?>
						</ul>
					</div>
					<!-- End widget -->

					<hr>

					<!-- <div class="widget">
						<h4>Son Yorumlar</h4>
						<ul class="recent_post">
							<li>
								<i class="icon-calendar-empty"></i> 16th July, 2020
								<div><a href="#">It is a long established fact that a reader will be distracted </a>
								</div>
							</li>
							<li>
								<i class="icon-calendar-empty"></i> 16th July, 2020
								<div><a href="#">It is a long established fact that a reader will be distracted </a>
								</div>
							</li>
							<li>
								<i class="icon-calendar-empty"></i> 16th July, 2020
								<div><a href="#">It is a long established fact that a reader will be distracted </a>
								</div>
							</li>
						</ul>
					</div>
					End widget -->
			<!--  -->		<!-- <hr> -->
					
