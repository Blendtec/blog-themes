<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Blendtec
 * @since Blendtec 1.0
 */

get_header(); ?>
<div id="main" class="container">
  <div id="content" class="row">
  	<div id="main_content" class="col-md-9 col-sm-9 col-xs-12">
    <?php if (have_posts()) : while (have_posts()) : the_post();  ?>
    	  <?php get_template_part( 'content', 'single' ); ?>
				<?php endwhile; else: ?>
					<p>Sorry, no posts matched your criteria.</p>
				<?php endif; ?>

		</div>
		

     <?php get_sidebar(); ?>
      </div>
      
  </div>
<?php get_footer(); ?>