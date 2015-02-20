<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Blendtec
 * @since Blendtec 1.0
 */

get_header(); ?>
<div class="main-section--content">
		<div class="main-section--post-container">
		<?php 
			if (have_posts()) :
				while (have_posts()) :
					the_post();
					get_template_part( 'content', 'single' );
				endwhile;
			else: ?>
				<p>Sorry, no posts matched your criteria.</p>

				<?php 
			endif;
			?>

		</div>	

		<?php get_sidebar(); ?>
	</div>	  
</div>
<?php get_footer();
