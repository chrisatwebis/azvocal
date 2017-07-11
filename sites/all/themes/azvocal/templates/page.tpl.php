<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<?php
  $header_class = ""; 
  if (!empty($page['featured'])){
    $header_class = "sticky";
  }
  else {
    $header_class = "img-bg";
  }
?>

<!--Only show on desktop-->
<header role="banner" id="page-header" class="<?php print $container_class; ?> <?php print $header_class;?> hidden-xs hidden-sm">
  <div class="desktop-header">
    <div class="logo-container">
      <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
        <span class="helper"></span><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    </div>
    <div class="header-bars">
      <div class="header-bar first-header-bar">
        <div class="bar-inner">
        <?php if (!empty($page['header'])): ?>
          <?php print render($page['header']); ?>
        <?php endif; ?>
        </div>
      </div>

      <div class="header-bar second-header-bar">
        <div class="bar-inner">
          <?php if (!empty($page['navigation'])): ?>
          <div id="navigation" class="region-wrapper nav-region-wrapper">
            <?php print render($page['navigation']); ?>
          </div>
          <?php endif; ?>
        </div>
      </div>

      <?php if (!empty($page['nav_second'])): ?>
      <div class="header-bar third-header-bar col-md-12">
        <div class="bar-inner">
          <div id="navbar-second" class="region-wrapper nav-second-region-wrapper">
            <?php print render($page['nav_second']); ?>
          </div>
        </div>        
      </div>
      <?php endif; ?>
    </div>
  </div>
</header> <!-- /#page-header -->

<header role="banner" id="mobile-page-header" class="<?php print $container_class; ?> hidden-md hidden-lg">
  <!--Only show on tablet and mobile-->
  <div class="mobile-header row">
    <div class="mobile-bar mobile-bar-left col-xs-2">
      <div class="mobile-menu-icon">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="mobile-bar mobile-bar-middle col-xs-8">
      <div class="logo-container">
        <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      </div>
    </div>
    <div class="mobile-bar mobile-bar-right col-xs-2">
    </div>
  </div>
  
  <div id="mobile-alert">
    <div class="alert alert-info alert-dismissible fade in hidden android" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <small>
        <?php print t("Mobile App is available for your device: !link", array("!link" => l(t('!icon Android App', array('!icon' => '<i class="fa fa-android" style="font-size: 120%"></i>')), "http://member.edwardclub.com/download/app/android", array("attributes" => array("class" => array("btn", "btn-success")), "html" => TRUE)))); ?>
      </small>
    </div>
    <div class="alert alert-info alert-dismissible fade in hidden ios" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <small>
        <?php print t("Mobile App is available for your device: !link", array("!link" => l(t('!icon iOS App', array('!icon' => '<i class="fa fa-ios" style="font-size: 120%"></i>')), "http://member.edwardclub.com/download/app/ios", array("attributes" => array("class" => array("btn", "btn-success")), "html" => TRUE)))); ?>
      </small>
    </div>
  </div>

</header>

<div id="page-content">
  <div id="mobile-menu" class="container-fluid hidden-md hidden-lg mobile-menu mobile-menu-hide">
    <div class="row">
      <div class="col-xs-12">
        <?php if (!empty($page['mobile_menu'])): ?>
          <?php print render($page['mobile_menu']) ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div id="l-page" class="l-page">
    <div class="main-container">

      <?php if (!empty($page['featured'])): ?>
      <div class="region-wrapper featured-region-wrapper" role="banner">
        <?php print render($page['featured']); ?>
      </div>
      <?php endif; ?>

      <?php if (!empty($page['above_content'])): ?>
      <div class="<?php print $container_class; ?> region-wrapper above-content-region-wrapper">
        <?php print render($page['above_content']); ?>
      </div>
      <?php endif; ?>

      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <!--<?php if (!empty($title)): ?>
        <h1 class="page-header"><?php print $title; ?></h1>
      <?php endif; ?>-->
      <?php print render($title_suffix); ?>


      <div class="<?php print $container_class; ?> region-wrapper">

        <div class="row">
          <?php if (!empty($page['sidebar_first'])): ?>
            <aside class="col-sm-3" role="complementary">
              <?php print render($page['sidebar_first']); ?>
            </aside>  <!-- /#sidebar-first -->
          <?php endif; ?>

          <section<?php print $content_column_class; ?>>
            <?php if (!empty($page['highlighted'])): ?>
              <div class="highlighted"><?php print render($page['highlighted']); ?></div>
            <?php endif; ?>
            <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>        
            <?php print $messages; ?>
            <?php if (!empty($tabs)): ?>
              <?php print render($tabs); ?>
            <?php endif; ?>
            <?php if (!empty($page['help'])): ?>
              <?php print render($page['help']); ?>
            <?php endif; ?>
            <?php if (!empty($action_links)): ?>
              <ul class="action-links"><?php print render($action_links); ?></ul>
            <?php endif; ?>
            <?php print render($page['content']); ?>
          </section>

          <?php if (!empty($page['sidebar_second'])): ?>
            <aside class="col-sm-3" role="complementary">
              <?php print render($page['sidebar_second']); ?>
            </aside>  <!-- /#sidebar-second -->
          <?php endif; ?>
        </div>

      </div>
    </div>

    <?php if (!empty($page['above_footer'])): ?>
    <div id="above-footer" class="region-wrapper above-footer-region-wrapper">
      <?php print render($page['above_footer']); ?>
    </div>
    <?php endif; ?>

    <?php if (!empty($page['footer'])): ?>
      <footer class="footer">
        <div class="<?php print $container_class; ?> ">
          <div class="row">
            <?php print render($page['footer']); ?>
          </div>
        </div>
      </footer>
    <?php endif; ?>
  </div>
</div>
