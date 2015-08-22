<?php
//dpm($form);

//hide
hide($form['subject']);
hide($form['author']);
hide($form['comment_body']);

//unset
unset($form['author']['name']['#theme_wrappers']);
unset($form['author']['mail']['#theme_wrappers']);
unset($form['author']['homepage']['#theme_wrappers']);
unset($form['comment_body']['und'][0]['value']['#theme_wrappers']);
unset($form['field_your_rating']['und'][0]['rating']['#theme_wrappers']);

//$form['author']['name']['#attributes'] = array('placeholder' => 'Your Name *');
//$form['author']['mail']['#attributes'] = array('placeholder' => 'Your Email *');
//$form['author']['homepage']['#attributes'] = array('placeholder' => 'Website');


//textarea
$form['comment_body']['und'][0]['value']['#resizable'] = FALSE;
//submit
$form['actions']['submit']['#value'] = t('Submit it Now');
$form['actions']['submit']['#attributes'] = array('class' => array('send-message'));
?>

<?php if (isset($form['author']['_author'])) : ?>
  <?php unset($form['author']['_author']['#theme_wrappers']); ?>
  <?php unset($form['author']['_author']); ?>
<?php else : ?>
  <div class="clearfix">
  <div class="grid_4 alpha mb">
    <?php print drupal_render($form['author']['name']); ?>
  </div>
  <div class="grid_4 mb">
    <?php print drupal_render($form['author']['mail']); ?>
  </div>
  <div class="grid_4 omega mb">
    <?php print drupal_render($form['author']['homepage']); ?>
  </div>
  </div>
<?php endif; ?>
  <?php print drupal_render($form['comment_body']['und'][0]['value']); ?>
  <?php print drupal_render_children($form); ?>
<p>
  <?php print drupal_render($form['actions']['submit']); ?>
</p>
