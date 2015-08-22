<?php
	$terms = array();
	$vid = NULL;
	$vid_machine_name = 'categories_portfolio';
	$vocabulary = taxonomy_vocabulary_machine_name_load($vid_machine_name);
	if (!empty($vocabulary->vid)) {
	  $vid = $vocabulary->vid;
	}
	if (!empty($vid)) {
	  $terms = taxonomy_get_tree($vid);
	}
?>
<div id="filters-container" class="cbp-l-filters-alignCenter">
<button data-filter="*" class="cbp-filter-item-active cbp-filter-item">All</button>
<?php if (!empty($terms)): ?>
	<?php foreach ($terms as $term): ?>
		<button data-filter=".tid-<?php print $term->tid; ?>" class="cbp-filter-item"><?php print $term->name; ?></button>
	<?php endforeach; ?>
<?php endif; ?>
</div>