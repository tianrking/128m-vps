<?php
/**
 * The Template for displaying all single posts.
 *
 * @package FashionBuzz
 */

get_header(); ?>

<div class="container">
    	<div class="row">
            	<div class="col-md-3">
                	<div class="sidebar">
        			<?php get_sidebar(); ?>
                    </div>
        		</div>
                <div class="col-md-9">
                	<div class="content">
			<?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', 'single' ); ?>
                <?php fashionbuzz_content_nav( 'nav-below' ); ?>
                <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() )
                    comments_template();
                ?>
            <?php endwhile; // end of the loop. ?>
            </div>
            </div>
       </div>
  </div><div class="clear"></div>

<?php get_footer(); ?>