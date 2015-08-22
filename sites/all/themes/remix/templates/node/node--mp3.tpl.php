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
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

    <div class="def-block">

        <div class="post row-fluid pic-full clearfix">
			
            <!-- Player -->
            
            <div class="track_info" style="display:none">
                <span class="track_title"><?php print $title; ?></span>
                <span class="track_file"><?php print render($content['field_file_mp3'][0]['file']['#markup']); ?></span>
                <span class="track_artist"><?php print render($content['field_mp3_artist'][0]['#title']); ?></span>
                <span class="track_duration"><?php print render($content['field_mp3_duration'][0]['#markup']); ?></span>
                <span class="track_cover"><?php print file_create_url($content['field_pic_cover'][0]['file']['#path']); ?></span>
                <span class="track_rate"><?php print render($content['field_mp3_rate']['#items'][0]['value']); ?></span>
            </div>
            
            <div class="music-single mbf clearfix"></div>
            <script type="text/javascript">
                (function($) {
                        var 
				music_title= $('.track_info .track_title').text(),
				music_file= $('.track_info .track_file').text(),
				music_artist= $('.track_info .track_artist').text(),
				music_duration= $('.track_info .track_duration').text(),
				music_cover= $('.track_info .track_cover').text(),
                                music_rate= $('.track_info .track_rate').text();
		
			var myPlaylist = [
				{
					mp3: music_file,
					title: music_title,
					artist: music_artist,
					rating: music_rate,
					buy:'#',
					price:'17.99',
					duration: music_duration,
					cover: music_cover	
				}
			];
			
			$('.music-single').ttwMusicPlayer(myPlaylist, {
				currencySymbol:'$',
				buyText:'BUY',
				tracksToShow:3,
				autoplay:true,
				ratingCallback:function(index, playlistItem, rating){
					//some logic to process the rating, perhaps through an ajax call
				},
				jPlayer:{
					swfPath: "http://www.jplayer.org/2.7.0/js/",
					supplied: "mp3",
					volume:  0.8,
					wmode:"window",
					solution: "html,flash",
					errorAlerts: true,
					warningAlerts: true
				}
			});
                })(jQuery);
            </script>
             <!-- End Player -->           

			
			
            <?php print render($content['body'][0]['#markup']); ?>
            <p><span> Tags: </span><?php print render($content['field_tags']); ?></p>
            <div class="meta">
                <span> <i class="icon-user mi"></i> <?php print $name; ?> </span>
                <span> <i class="icon-time mi"></i><?php print format_date($node->created, 'custom', "F j, o h:i a"); ?> </span>
            </div><!-- meta -->

            <?php
            // We hide the comments and links now so that we can render them later.
            hide($content['comments']);
            hide($content['links']);
            ?>

            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id))
                        return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            <?php if (theme_get_setting('button_like_facebook', 'remix') != ''): ?>
                <div class="like-post">
                    <div class="fb-like" data-href="<?php print theme_get_setting('button_like_facebook', 'remix') ?>" data-width="80" data-layout="button_count" data-show-faces="false" data-send="false"></div>
                </div><!-- like -->
            <?php endif; ?>

        </div><!-- post -->
        
        <!-- Comment Disqus -->
        <?php
        print render($content['embed']);
        print render($content['disqus']);
        ?>

    </div>
</div>
