(function ($, Drupal, window, document) {

  Drupal.behaviors.common = {
    attach: function (context, settings) {

      $('.addtoany_list').once('common').attr('data-markup-msg', Drupal.t('SHARE'));

    }
  };

} (jQuery, Drupal, this, this.document));;(function ($) {
  $(document).ready(function() {

		//get mobile header
		var mobile_header = $('#mobile-page-header');
		var mobile_header_top = mobile_header.offset().top;
		var mobile_header_height = mobile_header.height();

  	//register the anchors for animation;
		$(window).on("load", function() {
			mobile_header_top = mobile_header.offset().top;
		});

  	$(window).scrollTop(1);

		//mobile menu toggle animation
		$('.mobile-menu-icon').click(function(){
			$('.mobile-menu-icon').toggleClass('open');
			if($('#mobile-menu').hasClass('mobile-menu-hide')) {
				showPopout();
			}
			else {
				hidePopout();
			}			
		});

		function showPopout() {
			mobile_header_top = mobile_header.offset().top;
			mobile_header_height = mobile_header.height();
			$('#mobile-menu').css("top", mobile_header_top+mobile_header_height).addClass('mobile-menu-show').removeClass('mobile-menu-hide');
			$('.l-page').addClass('mobile-menu-show');
			$('#mobile-menu').animate({
				'margin-left': 0,
				'scrollTop': 0,
			}, 100, function(){
			});
		}

		function hidePopout() {
			$('#mobile-menu').animate({
				'margin-left': '-100%'
			}, 100, function(){
				$('#mobile-menu').removeClass('mobile-menu-show').addClass('mobile-menu-hide');
				$('.l-page').removeClass('mobile-menu-show');
			});
		}

    //function to get cookie
    function getCookie(cname) {
      var name = cname + "=";
      var ca = document.cookie.split(';');
      for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }

    //function to set cookie
    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      var expires = "expires="+d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }


	});

})(jQuery);