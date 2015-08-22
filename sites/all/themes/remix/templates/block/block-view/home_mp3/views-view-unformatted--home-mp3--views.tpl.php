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

<div id="<?php print $view->style_options['row_class'];?>" class="T20-tab group">
			<?php foreach ($rows as $id => $row): ?>
					<?php print $row; ?>
			<?php endforeach; ?>
</div><!-- tab content -->