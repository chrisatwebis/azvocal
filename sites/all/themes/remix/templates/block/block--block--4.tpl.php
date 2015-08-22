<div id="<?php print $block_html_id; ?>" class="def-block widget <?php print $classes; ?>"<?php print $attributes; ?>>

        <?php print render($title_prefix); ?>
        <?php if ($block->subject): ?>
            <h4<?php print $title_attributes; ?>><?php print $block->subject ?></h4><span class="liner"></span>
        <?php endif; ?>
        <?php print render($title_suffix); ?>

        <div class="widget-content tac"<?php print $content_attributes; ?>>
            <?php print $content ?>
        </div>
    </div>