<?php
/**
 * The Template for the Homepage
 *
 * @package WordPress
 * @subpackage Blendtec
 * @since Blendtec 1.0
 */

get_header(); ?>

<div class="main-section--content">
	<div class="main-section--post-container">
	<?php 
		while (have_posts()) :
			the_post();
			get_template_part( 'content', 'archive' );
		endwhile;
	?>
	<?php blendtec_content_nav( 'nav-below' ); ?>
	</div>
	
	<?php get_sidebar(); ?>

	</div>
</div>
<?php get_footer();
