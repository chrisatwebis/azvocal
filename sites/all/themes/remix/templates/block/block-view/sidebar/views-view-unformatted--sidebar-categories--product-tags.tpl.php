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
	<?php $title_pro = $view->result[$id]->tid_1.' Product'; ?>
    <?php print l('<i class="icon-tag"></i>'. $view->result[$id]->taxonomy_term_data_name, 'taxonomy/term/' . $view->result[$id]->tid, array('html' => 'true', 'attributes' => array('class' => 'toptip','original-title'=>$title_pro))); ?>
<?php endforeach; ?>