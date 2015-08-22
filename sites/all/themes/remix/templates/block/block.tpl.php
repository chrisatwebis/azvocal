<?php
/**
 * @file
 * Default theme implementation to display a block.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: An ID for the block, unique within each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - block: The current template type, i.e., "theming hook".
 *   - block-[module]: The module generating the block. For example, the user
 *     module is responsible for handling the default user navigation block. In
 *     that case the class would be 'block-user'.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<?php if ($block->delta == 'dc_header'): ?>
    <div class="sign-btn <?php print $classes; ?>">   
        <?php print render($title_prefix); ?>
        <?php print render($title_suffix); ?>
        <?php print $content ?>
    </div>
<?php elseif ($block->delta == 'dc_main_menu'): ?>
    <div class="<?php print $classes; ?>">   
        <?php print render($title_prefix); ?>
        <?php print render($title_suffix); ?>
        <?php print $content; ?>
    </div> 
<?php elseif ($block->delta == 'dc_shortcode_menu'): ?>
    <div class="def-block widget <?php print $classes; ?>">   
        <?php print render($title_prefix); ?>
        <?php if ($block->subject): ?>
            <h4<?php print $title_attributes; ?>><?php print $block->subject ?></h4><span class="liner"></span>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <div class="widget-content">
            <?php print $content ?>
        </div>
    </div>
<?php elseif ($block->delta == 'widget_flickr'): ?>
   <div id="t20_flickr_widgets-2" class="def-block widget T20_flickr_widgets <?php print $classes; ?>">
        <?php print render($title_prefix); ?>
        <?php if ($block->subject): ?>
            <h4<?php print $title_attributes; ?>><?php print $block->subject ?></h4><span class="liner"></span>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <div class="widget-content">
            <?php print $content ?>
        </div>
    </div>
<?php elseif ($block->delta == 'widget_twitter'): ?>
   <div class="def-block widget animtt <?php print $classes; ?>">
        <?php print render($title_prefix); ?>
        <?php if ($block->subject): ?>
            <h4<?php print $title_attributes; ?>><?php print $block->subject ?></h4><span class="liner"></span>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <div class="widget-content">
            <?php print $content ?>
        </div>
    </div>

<?php else: ?>
    <div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

        <?php print render($title_prefix); ?>
        <?php if ($block->subject): ?>
            <h2<?php print $title_attributes; ?>><?php print $block->subject ?></h2>
        <?php endif; ?>
        <?php print render($title_suffix); ?>

        <div <?php print $content_attributes; ?>> <!--class="content"-->
            <?php print $content ?>
        </div>
    </div>
<?php endif; ?>