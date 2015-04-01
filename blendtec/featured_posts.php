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
		'category_name' => 'featured',
		'offset' => 0,
		'orderby' => 'post_date',
		'order' => 'DESC',
		'post_type' => 'post',
		'post_status' => 'publish'
	);
	$postsArray = get_posts( $args );
?>
<h2 class="featured-posts--header">Featured <span>Posts</span></h2>
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
	
	<nav class="featured-posts--slider-nav">
	    <a href="#slide-0" class="active">Slide 0</a> 
	    <a href="#slide-1">Slide 1</a> 
	    <a href="#slide-2">Slide 2</a> 
	  </nav>
</div>