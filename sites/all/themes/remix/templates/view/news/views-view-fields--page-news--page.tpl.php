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

<?php if ($row->field_field_multimedia[0]['rendered']['#bundle'] == 'video'): ?>
	<div class="span5"><?php print $fields['field_image']->content; ?></div>
<?php elseif ($row->field_field_multimedia[0]['rendered']['#bundle'] == 'image'):?>
	<div class="span5"><img src="<?php print image_style_url('mp3_soon',$row->field_field_multimedia[0]['rendered']['#file']->uri) ?> " alt=""></div>
<?php elseif ($row->field_field_multimedia[0]['rendered']['#bundle'] == 'audio'): ?>
	<div class="span5"><?php print $fields['field_img']->content; ?><!--<img src="<?php //print $fields['field_img']->content; ?>" alt="" />--></div>
<?php endif; ?> 
	<div class="span7">
		<?php print $fields['title']->content; ?>
		<?php print $fields['body']->content; ?>
		<div class="meta">
			<span> <i class="icon-time mi"></i><?php print $fields['created']->content; ?> </span> | <span> <a href="#"><i class="icon-comments-alt"></i> <?php print $fields['comment_count']->content; ?></a> </span>
		</div><!-- meta -->
		<a href="<?php print $fields['path']->content; ?>" class="sign-btn tbutton small"><span><?php print t('Read More');?></span></a>
	</div>
