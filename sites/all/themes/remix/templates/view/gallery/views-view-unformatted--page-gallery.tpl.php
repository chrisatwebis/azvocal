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

<ul id="tp-grid" class="tp-grid">
	<?php foreach ($rows as $id => $row): ?>
		<?php print $row; ?>
	<?php endforeach; ?>
</ul>