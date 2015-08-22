<?php
$disable_switcher = theme_get_setting('remix_disable_switch', 'remix');
if (empty($disable_switcher))
    $disable_switcher = 'on';
if (!empty($disable_switcher) && $disable_switcher == 'on') {
    ?>
<?php global $base_url; ?>

<div class="style-picker">
  <div class="container bgChanger" style="left: -194px;"><a href="#" class="handler">&nbsp;</a>
    <div class="options"><!--<span> Layout </span>
      <select name="layouts" id="layouts">
        <option value="boxed">Boxed</option>
        <option value="boxed-margin">Boxed Margin</option>
        <option value="full">Fullwide</option>
      </select>-->
      <span> Version </span>
      <select name="version" id="version">
        <option value="dark">Dark</option>
        <option value="light">Light</option>
      </select>
      
      
      </div>
  </div>
</div>
<!-- end style switcher -->
<script language="javascript">
       jQuery(document).ready(function ($) {
	///$('head').append('<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" /><style id="themecolors" type="text/css"></style>');
	$('head').append('<style id="themecolors" type="text/css"></style>');
	
	$('.handler').click(function(){
		if ($(this).hasClass('closed')){
			$(this).next('.options').parent().animate({left:0}, 300, function(){
				$(this).find('.handler').removeClass('closed');
			});
		} else {
			$(this).parent().animate({left:'-194px'}, 300, function(){
				$(this).find('.handler').addClass('closed');
			});
		}
		return false;
	});
	$('.handler').parent().delay(1000).animate({left:'-194px'}, 300, function(){
		$(this).find('.handler').addClass('closed');
	});
	/*if($('#layout').hasClass('boxed')){
		$('#layout').val('boxed');
	} else if($('#layout').hasClass('boxed-margin')){
		$('#layout').val('boxed-margin');
	} else {
		$('#layout').val('full');
	}*/
	
	// layouts
	if ( $('#layouts').val() == 'full' )
		$('#bgs').hide();
		var prev_bg = $( 'body' ).css( 'background' );
	/*$('#layouts').change(function(){
		var layouts = $(this).val();
		if( layouts == 'full' ){
			$('#bgs').slideUp('slow', function() {});
			$( '#layout' ).removeClass( 'boxed' ).removeClass( 'boxed-margin' ).addClass( 'full' );
		} else if(layouts == 'boxed') {
			$('#bgs').slideDown('slow', function() {});
			$( '#layout' ).removeClass( 'full' ).removeClass( 'boxed-margin' ).addClass( 'boxed' );

		} else if(layouts == 'boxed-margin') {
			$('#bgs').slideDown('slow', function() {});
			$( '#layout' ).removeClass( 'full' ).removeClass( 'boxed' ).addClass( 'boxed-margin' );
		}

		$(window).trigger('resize');
	});*/
	
	// Version
	$('#version').change(function(){
		var version = $(this).val();
		if( version == 'light' ){
			$('head').append('<link rel="stylesheet" type="text/css" href="http://drupalet.com/demo/drupal/remix-v2/sites/all/themes/remix/css/light.css" id="light" media="screen" />');
			//$('.logo a').html('<img src="images/logo_light.png" alt="Best and Most Popular Musics">');
		} else if(version == 'dark') {
			$('head #light').remove();
			//$('.logo a').html('<img src="images/logo.png" alt="Best and Most Popular Musics">');
		}
		$(window).trigger('resize');
	});

	// headings font
	
	
	
    
	// Color One   
	//$('.style-picker #bgHeaderColor').parent('a').ColorPicker({});
	
	// Body background      
	/*$('.style-picker #bgColor').parent('a').ColorPicker({
		onChange:function(hsb, hex, rgb){
			$('.style-picker').find('#bgColor').css({backgroundColor:'#' + hex});
			$('body').css({'background':'#' + hex});
		},
		onSubmit:function(hsb, hex, rgb, el){
			$(el).find('#bgColor').css({backgroundColor:'#' + hex});
			$(el).find('#bgColor').attr({title:hex});
			$('body').css({'background':'#' + hex});
			$(el).ColorPickerHide();
		},
		onBeforeShow:function(){
		    var hex = $('.style-picker').find('#bgColor').attr('title');
			$(this).ColorPickerSetColor(hex); 
		}
	});*/
	/*$('.style-picker a.bgBody').click(function(){
		var imgUrl = $(this).attr('rel');
		$('#layout').removeClass('full').addClass('boxed');
		$('body').css({'background-image':"url('"+imgUrl+"')", "background-attachment":"fixed", "background-position":"top center", "-webkit-background-size":"initial", "-moz-background-size":"initial", "background-size":"initial", "background-repeat":"repeat"});
		return false;
	});*/
});
	   
	   
    </script>
<?php
}
?>
<style type="text/css">
.style-picker{direction: ltr;font-family:Arial,"Helvetica CY",sans-serif;color:#010101;font-size:.85em;width:0;min-height:200px;position:fixed;top:40px;left:0;z-index:99999;}
.style-picker .bgChanger{position:relative;min-width:35px;min-height:100px;}
.style-picker a{color:#fff !important;}
.style-picker a:hover{text-decoration:none;}
.style-picker input, .style-picker select {font-family:"Trebuchet MS",Arial,"Helvetica CY",sans-serif;border:1px solid #b7b7b7;color:#010101;}
.style-picker input{width:120px;}
.style-picker select{
	font-size: 1em;
	width: 163px;
	padding: 3px;
	height: auto;
	border: 1px solid #CCC;
	outline: 0;
	/*background: #FAFAFA url(sites/all/themes/remix/images/select3.png) no-repeat right;*/
	-webkit-appearance: none;
	-moz-appearance: none;
}
.style-picker .container{width:150px;padding:0 40px 5px 0;}
.style-picker .options,.style-picker .handler{border:1px solid #181818;background-color:#181818;color: #CCC;box-shadow:1px 1px 1px rgba(0, 0, 0, 0.3)} 
.style-picker .options{width:180px;padding:3px 0 15px 10px;position:relative; -webkit-border-bottom-right-radius: 10px; -moz-border-radius-bottomright:3px; border-bottom-right-radius: 3px; border-radius: 0 0 3px 0;}
.style-picker .handler{background:#181818 url(http://drupalet.com/demo/drupal/remix-v2/sites/all/themes/remix/images/close.png) 5px 6px no-repeat;width:33px;height:35px;position:absolute;top:0px;right:-35px;z-index:30;border-left:0;-webkit-border-top-right-radius: 3px; -webkit-border-bottom-right-radius: 3px; -moz-border-radius-topright: 3px; -moz-border-radius-bottomright: 3px; border-radius: 0 3px 3px 0;}
.style-picker .container .handler.closed{background:#181818 url(http://drupalet.com/demo/drupal/remix-v2/sites/all/themes/remix/images/pencil.png) 5px 6px no-repeat;}
.style-picker span{display:block;padding:10px 0 3px;font-weight:bold;clear:both;}
.style-picker a.thumb-img{margin:0 5px 4px 0;border:1px solid #666;}
.style-picker a.thumb-img, .style-picker a.thumb-img img{display:block;float:left;width:17px;height:14px;cursor:pointer;}
.style-picker a.thumb-img img{border:0;background:none;padding:0;}
.style-picker a.bgColor{
	color: #ccc !important;
	display: inline-block;
	width: 90%;
	line-height: 20px;
	font-weight: bold;
	padding: 5px 18px 0 0;
	margin: 8px 0 8px;
	position: relative;
	clear: both;
}
.style-picker a.bgColor span{border:1px solid #b7b7b7;width:18px;height:18px;float:right;padding:0;margin:1px 0 0;}


@media only screen and (min-width: 480px) and (max-width: 767px) { .style-picker { display: none } }
@media only screen and (min-width: 100px) and (max-width: 479px) { .style-picker { display: none } }
</style>
