<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package FashionBuzz
 */

get_header(); ?>

  <div class="container">
    	<div class="row">
        	<div class="col-md-9">
                	<div class="content">
            <header>
                <h1 class="entry-title"><?php _e( '<strong>404</strong> Not Found', 'fashionbuzz' ); ?></h1>
            </header>
            <div class="page-content">
                <p class="text-404"><?php _e( 'Looks like you have taken a wrong turn.....<br />Don\'t worry... it happens to the best of us.', 'fashionbuzz' ); ?></p>
                
            </div><!-- .page-content -->
            </div>
            </div>
        <div class="col-md-3">
                	<div class="sidebar">
        			<?php get_sidebar('page'); ?>
                    </div>
        		</div>
    </div>
</div>

<?php get_footer(); ?>