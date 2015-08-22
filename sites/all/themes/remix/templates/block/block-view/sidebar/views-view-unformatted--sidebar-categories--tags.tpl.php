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
<?php foreach ($rows as $id => $row): ?>
    <?php print l('<i class="icon-tag"></i>'. $view->result[$id]->taxonomy_term_data_name, 'taxonomy/term/' . $view->result[$id]->tid, array('html' => 'true')); ?>
<?php endforeach; ?>