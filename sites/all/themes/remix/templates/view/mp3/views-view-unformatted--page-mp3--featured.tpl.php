<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>

<li id="<?php print $view->style_options['row_class'];?>">
	<div class="post no-border no-mp clearfix">
		<ul class="tab-content-items">
			<?php foreach ($rows as $id => $row): ?>
				<li class="grid_6">
					<?php print $row; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</li><!-- tab content -->