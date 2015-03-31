<?php
/**
 * The Template for the Featured Posts Section
 *
 * @package WordPress
 * @subpackage Blendtec
 * @since Blendtec 1.0
 */
	$args = array(
		'posts_per_page' => 3,
		'offset' => 0,
		'orderby' => 'post_date',
		'order' => 'DESC',
		'post_type' => 'post',
		'post_status' => 'publish'
	);
	$postsArray = get_posts( $args );
?>
<div class="featured-posts--slider-wrap">
	<div class="featured-posts--slider">
		<div class="featured-posts--holder">
			<?php 
			foreach ($postsArray as $key => $post) :

				get_template_part('featured_posts_item');

			endforeach;
			?>
		</div>
	</div>
	
</div>