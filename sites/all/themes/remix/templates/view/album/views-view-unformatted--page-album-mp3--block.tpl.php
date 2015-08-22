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
            <div class="track_info" style="display:none">
                <span class="track_title"><?php print ($view->result[$id]->node_title); ?></span>
                <span class="track_file"><?php print file_create_url($view->result[$id]->field_field_file_mp3[0]['rendered']['#file']->uri); ?></span>
                <span class="track_artist"><?php print ($view->result[$id]->field_field_mp3_artist[0]['rendered']['#title']); ?></span>
                <span class="track_duration"><?php print ($view->result[$id]->field_field_mp3_duration[0]['rendered']['#markup']); ?></span>
                <span class="track_rate"><?php print ($view->result[$id]->field_field_mp3_rate[0]['rendered']['#markup']); ?></span>
                <span class="track_cover"><?php print file_create_url($view->result[$id]->field_field_pic_cover[0]['rendered']['#file']->uri); ?></span>
            </div>
<?php endforeach; ?>