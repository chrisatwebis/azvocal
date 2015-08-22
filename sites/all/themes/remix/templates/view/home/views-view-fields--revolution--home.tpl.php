<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>



<a href="<?php print $fields['path']->content; ?>">
		
		<?php if (isset($fields['field_multimedia']->content)): ?>
			<?php if ($row->field_field_multimedia[0]['rendered']['#bundle'] == 'video'): ?>
				<?php print $fields['field_image']->content; ?>
				<span class="cat">Video</span>
				<h3><?php print $fields['field_tracks']->content; ?><small><?php print $fields['field_singer']->content; ?></small></h3>
			<?php elseif ($row->field_field_multimedia[0]['rendered']['#bundle'] == 'image'):?>
				<img src="<?php print file_create_url($row->field_field_multimedia[0]['rendered']['#file']->uri) ?> " alt="">
				<span class="cat">News</span>
				<h3><?php print $fields['title']->content; ?><small><?php print $fields['body']->content; ?></small></h3>
			<?php elseif ($row->field_field_multimedia[0]['rendered']['#bundle'] == 'audio'): ?>
				<?php print $fields['field_img']->content; ?>
				<span class="cat">Audio</span>
				<h3><?php print $fields['title']->content; ?><small><?php print $fields['body']->content; ?></small></h3>
			<?php endif; ?> 
			
		<?php else: ?>
		
			<?php if ($fields['type']->content == 'Comming Soon'): ?>
				<?php print $fields['field_image']->content; ?>
				<span class="cat"><?php print $fields['type']->content; ?></span>
				<h3><?php print $fields['title']->content; ?><small><?php print $fields['body']->content; ?></small></h3>
			<?php elseif ($fields['type']->content == 'Mp3'): ?>	
				<?php print $fields['field_pic_cover']->content; ?>
				<span class="cat"><?php print $fields['type']->content; ?></span>
				<h3><?php print $fields['title']->content; ?><small><?php print $fields['field_mp3_artist']->content; ?></small></h3>
			<?php endif; ?> 
		<?php endif; ?>
</a>