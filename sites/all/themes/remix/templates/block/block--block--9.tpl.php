<div id="t20_flickr_widgets-2 <?php print $block_html_id; ?>" class="def-block widget T20_flickr_widgets <?php print $classes; ?>"<?php print $attributes; ?>>

        <?php print render($title_prefix); ?>
        <?php if ($block->subject): ?>
            <h4<?php print $title_attributes; ?>><?php print $block->subject ?></h4><span class="liner"></span>
        <?php endif; ?>
        <?php print render($title_suffix); ?>

        
            <?php print $content ?>
        
    </div>