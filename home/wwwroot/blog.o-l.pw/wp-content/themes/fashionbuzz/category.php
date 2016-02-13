<?php
/**
 * The template for displaying all category pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
            <header>
				<h1 class="entry-title"><?php single_cat_title('Category: '); ?></h1>
            </header><!-- .page-header -->
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>
                <?php endwhile; ?>
                <?php fashionbuzz_pagination(); ?>
            <?php else : ?>
                <?php get_template_part( 'no-results', 'archive' ); ?>
            <?php endif; ?>
            </div>
          </div>
	</div>
</div>       

<?php get_footer(); ?>