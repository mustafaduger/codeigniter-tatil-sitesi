	
				
				<div class="col-md-9">
					<div class="box_style_1">		
						<div class="post nopadding">
							<img src="<?php echo base_url().$row->kesfet_tmb;?>" alt="Image" class="img-responsive">
							<h2><?php echo $row->kesfet_title ?></h2>
							<p><?php echo $row->kesfet_detail ?></p>
							
						</div>

					
						<!-- end post -->
					</div>
					<!-- end box_style_1 -->

					
					<?php if ($comments!=""):?>
						<h4>Yorumlar</h4>
						<div id="comments">
						
						<ol>
							<?php echo $comments; ?>
						</ol>
					</div>
					<?php endif; ?>
					
					<!-- End Comments -->

					<h4>Yorum Yaz</h4>
					<form id="comment_form" action="<?= base_url() ?>explorereadmoreview_controller/add_comment/<?= $row->kesfet_id ?>" method='post'>
						<div class="form-group">
							<input class="form-control style_2" type="text" required name="comment_name" id='name' value="<?= set_value("comment_name") ?>" placeholder="İsim Giriniz">
						</div>
						<div class="form-group">
							<input class="form-control style_2" type="text" name="comment_email" value="<?= set_value("comment_email") ?>" id='email' placeholder="Mail Adresi">
						</div>
						<div class="form-group">
							<textarea class="form-control style_2" name="comment_body" value="<?= set_value("comment_body") ?>" id='comment' placeholder="Mesaj"></textarea>
						</div>
						<input type='hidden' name='parent_id' value="0" id='parent_id' />
                    	<input type='hidden' name='kesfet_id' value="<?= set_value("kesfet_id",$row->kesfet_id) ?>" />
						<div class="form-group">
							<input type="reset" class="btn_1" value="Formu Temizle" />
							<input type="submit" class="btn_1" value="Yorum Gönder" />
						</div>
					</form>
				</div>
				<!-- End col-md-9-->

			