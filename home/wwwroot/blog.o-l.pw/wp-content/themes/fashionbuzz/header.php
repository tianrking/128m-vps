<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package FashionBuzz
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
// NAVIGATION CALLBACK
var ww = jQuery(window).width();
jQuery(document).ready(function() { 
	jQuery(".nav li a").each(function() {
		if (jQuery(this).next().length > 0) {
			jQuery(this).addClass("parent");
		};
	})
	jQuery(".toggleMenu").click(function(e) { 
		e.preventDefault();
		jQuery(this).toggleClass("active");
		jQuery(".nav").slideToggle('fast');
	});
	adjustMenu();
})

// navigation orientation resize callbak
jQuery(window).bind('resize orientationchange', function() {
	ww = jQuery(window).width();
	adjustMenu();
});

var adjustMenu = function() {
	if (ww < 719) {
		jQuery(".toggleMenu").css("display", "block");
		if (!jQuery(".toggleMenu").hasClass("active")) {
			jQuery(".nav").hide();
		} else {
			jQuery(".nav").show();
		}
		jQuery(".nav li").unbind('mouseenter mouseleave');
	} else {
		jQuery(".toggleMenu").css("display", "none");
		jQuery(".nav").show();
		jQuery(".nav li").removeClass("hover");
		jQuery(".nav li a").unbind('click');
		jQuery(".nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
			jQuery(this).toggleClass('hover');
		});
	}
}

</script>
</head>

<body <?php body_class(); ?>>
<div class="description">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-12">
						<div class="logo">
                            		<a href="<?php echo home_url('/'); ?>">
                                        	<h1><?php bloginfo('name'); ?></h1>
                                    </a>
                                    <p><?php bloginfo('description'); ?></p>
                             </div>
                     <div class="toggle">
                         <a class="toggleMenu" href="#"><?php _e('Menu','fashionbuzz'); ?></a>
                    </div><!-- toggle --> 
                 <div class="nav">
                    <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
                </div><!-- nav --><div class="clearfix"></div>
                </div>
                </div>
            </div><!-- site-aligner -->
		</div>

        