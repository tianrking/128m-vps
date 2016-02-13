<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package FashionBuzz
 */
?>

<div class="reference">
	<div class="site-aligner">
			<?php echo get_theme_mod('footer_copy',__('FashionBuzz &copy; 2015 | All Rights Reserved','fashionbuzz')); ?> <?php echo fashionbuzz_credit_link(); ?>
			<div class="social-icons">  
            		<?php if(get_theme_mod('fb_link',true) != '') { ?>
                     	<a href="<?php echo esc_url(get_theme_mod('fb_link','#')); ?>" target="_blank" class="facebook"></a>
                    <?php } ?>
                    <?php if(get_theme_mod('twitt_link',true) != '') { ?>
                     	<a href="<?php echo esc_url(get_theme_mod('twitt_link','#')); ?>" target="_blank" class="twitter"></a>
                    <?php } ?>
                    <?php if(get_theme_mod('in_link',true) != '') { ?>
                     	<a href="<?php echo esc_url(get_theme_mod('in_link','#')); ?>" target="_blank" class="linkedin"></a>
                    <?php } ?>
                    <?php if(get_theme_mod('gplus_link',true) != '') { ?>
                     	<a href="<?php echo esc_url(get_theme_mod('gplus_link','#')); ?>" target="_blank" class="gplus"></a>
                    <?php } ?>
                    <?php if(get_theme_mod('flickr_link',true) != '') { ?>
                     	<a href="<?php echo esc_url(get_theme_mod('flickr_link'.'#')); ?>" target="_blank" class="flickr"></a>
                    <?php } ?>
                   </div>  
     </div>
		</div>
    </div>
<?php wp_footer(); ?>
</body>
</html>