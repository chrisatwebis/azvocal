<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

	<h4> Videos </h4><span class="liner"></span>

	<div class="widget-content">

		<div class="video-grid clearfix">
			<?php foreach ($rows as $id => $row): ?>
				<?php print $row; ?>
			<?php endforeach; ?>
		</div>
		
	</div><!-- tab content -->
