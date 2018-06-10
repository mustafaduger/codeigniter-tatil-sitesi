			<div class="widget tags">
				<h4>Tag</h4>
				<?php $tags=explode(",",$row->kesfet_keyword);?> 
					<?php foreach ($tags as $tag) : ?>
						<a href="#"><?php echo $tag ;?></a>		
				<?php endforeach;?>				
				
			</div> 