<div class="def-block widget newsletters <?php print $classes; ?>">   
        <?php print render($title_prefix); ?>
        <?php if ($block->subject): ?>
            <h4<?php print $title_attributes; ?>><?php print $block->subject ?></h4><span class="liner"></span>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <div class="widget-content">
            <?php print $content ?>
        </div>
    </div>