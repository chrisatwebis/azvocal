<div class="features_sec20">
	<div class="container">
		<?php require_once 'portfolio_filter.tpl.php';?>
		<div id="grid-container" class="cbp-l-grid-projects">
			<ul>
				<?php
		$i=0;
		foreach ($nodes as $node) :
			$i++;
		$image_full = '';
		$image_field = field_get_items('node', $node, 'field_image');
		if (!empty($image_field)) {
			$image_full = file_create_url($image_field[0]['uri']);
		}
		$node_url = url('node/' . $node->nid);
	?>
				<li class="cbp-item <?php print portfolio_format_terms('field_categories_portfolio', $node); ?>">
					<div class="cbp-caption">
						<div class="cbp-caption-defaultWrap">
							<?php 
						if (!empty($image_field)):
							$url_image = file_create_url($node->field_image['und'][0]['uri']);
							$image_uri = $image_field[0]['uri'];
							$style_name = 'large';
							print theme('image_style', array('style_name' => $style_name, 'path' => $image_uri)); 
						else:
							$url_image = '';
						endif;
					?>
						</div>
						<div class="cbp-caption-activeWrap">
							<div class="cbp-l-caption-alignCenter">
								<div class="cbp-l-caption-body"><a href="<?php print $node_url?>" class="cbp-l-caption-buttonLeft">more info</a><a href="<?php print $url_image;?>" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="<?php print $node->title;?>">view larger</a></div>
							</div>
						</div>
					</div>
					<div class="threeborder">
						<div class="cbp-l-grid-projects-title">&nbsp;&nbsp;<?php print $node->title;?></div>
						<div class="cbp-l-grid-projects-desc">&nbsp;&nbsp;<?php print widget_format_terms('field_categories', $node); ?></div>
					</div>
				</li>
				<?php
			endforeach;
		?>
			</ul>
		</div>
		<div class="cbp-l-loadMore-text">
			<div data-href="#" class="cbp-l-loadMore-text-link"></div>
		</div>
	</div>
</div>
