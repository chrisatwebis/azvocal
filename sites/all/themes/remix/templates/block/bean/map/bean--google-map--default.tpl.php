<div id="map" class="hovermap">
    <?php  
		//print render($content['field_map']); 
		print render($content['field_map'][0]['googlemap']);
	?>
</div>
<?php   if(isset($content['field_description'])) :?>
    <?php  print render($content['field_description'][0]['#markup']); ?>
<?php endif;?>
