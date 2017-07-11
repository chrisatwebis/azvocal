(function ($, Drupal, window, document) {

  Drupal.behaviors.common = {
    attach: function (context, settings) {

      $('.addtoany_list').once('common').attr('data-markup-msg', Drupal.t('SHARE'));

    }
  };

} (jQuery, Drupal, this, this.document));