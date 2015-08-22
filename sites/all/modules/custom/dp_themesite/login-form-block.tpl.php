<?php
//dpm($form);

//unset
unset($form['name']['#theme_wrappers']);
unset($form['pass']['#theme_wrappers']);

//submit
$form['actions']['submit']['#value'] = t('Login');
$form['actions']['submit']['#id'] = 'login-button';

?>
<?php print drupal_render($form['name']); ?>
<?php print drupal_render($form['pass']); ?>
<?php print drupal_render($form['actions']['submit']); ?>
<?php print drupal_render_children($form); ?>