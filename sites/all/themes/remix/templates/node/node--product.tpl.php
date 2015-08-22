<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<div id="node-<?php print $node->nid; ?>" class="product-detail <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <div class="def-block">
        <h4> Shop Product </h4><span class="liner"></span>
        <div class="products shop clearfix">
            <div class="grid_12">
                <div class="clearfix mbs">
                    <div class="grid_6">
                        <div class="postslider clearfix flexslider">
                            <?php if (isset($content['product:field_images']['#items'])): ?>
                                <ul class="slides">
                                    <?php
                                    foreach ($content['product:field_images']['#items'] as $value) {
                                        echo '<li> <img src=' . file_create_url($value['uri']) . ' alt="products"></li>';
                                    }
                                    ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div><!-- grid6 -->

                    <div class="grid_6">
                        <h3> <?php print $title; ?> </h3>
                        <div class="item_price"><span class="from inline_display">From: </span><span class="strikethrough inline_display"><?php print render($content['product:field_old_price']); ?></span> <span class="amount inline_display"><?php print render($content['product:commerce_price']); ?></span></div>
                        <div class="woo1 rating">
                            <span class="mid"><?php print render($content['field_five_start_voting']['#items'][0]['count']); ?> Reviews</span> 
                            <span class="rate_five"><?php print render($content['field_five_start_voting']); ?></span>
                        </div>


                        <!-- PRODUCT TOOLS : begin -->
                        <div class="single_variation_wrap">					
                            <?php if (isset($content['field_product'][0]['quantity'])): ?>
                                <div class="variations_button">
                                    <?php print render($content['field_product']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- PRODUCT TOOLS : end -->



                    </div><!-- grid6 -->
                </div><!-- clearfix -->

                <?php hide($content); ?>
                <div class="clearfix mbs">
                    <?php if (isset($content['comments'])): ?>
                    <ul class="tabs">
                        <li><a href="#t-1" class="active">Full Description</a></li>
                        <li><a href="#t-2">ADDITIONAL INFORMATION</a></li>
                        <li><a href="#t-3">REVIEWS (<?php print render($content['field_five_start_voting']['#items'][0]['count']); ?>)</a></li>
                    </ul><!-- tabs -->

                    <ul class="tabs-content">
                        <li id="t-1" class="active">
                            <?php print render($content['body'][0]['#markup']); ?>
                        </li><!-- tab content -->

                        <li id="t-2">
                            <div class="shop_attributes">
                                <?php print render($content['field_information'][0]['#markup']); ?>
                            </div>
                        </li><!-- tab content -->

                        <li id="t-3">
                            <?php print render($content['comments']); ?>
                        </li><!-- tab content -->
                    </ul><!-- end tabs -->
                    <?php else: ?>
                    <ul class="tabs">
                        <li><a href="#t-1" class="active">Full Description</a></li>
                        <li><a href="#t-2">ADDITIONAL INFORMATION</a></li>
                    </ul><!-- tabs -->

                    <ul class="tabs-content">
                        <li id="t-1" class="active">
                            <?php print render($content['body'][0]['#markup']); ?>
                        </li><!-- tab content -->

                        <li id="t-2">
                            <div class="shop_attributes">
                                <?php print render($content['field_information'][0]['#markup']); ?>
                            </div>
                        </li><!-- tab content -->
                    </ul><!-- end tabs -->
                    <?php endif; ?>
                </div><!-- clearfix -->

            </div><!-- grid12 -->
        </div><!-- products -->

    </div><!-- def block -->

</div>
