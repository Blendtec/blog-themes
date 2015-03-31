<div class="featured-posts--slide">
	<div class="featured-posts--slide--image-wrap">
		<a href="<?php the_permalink(); ?>"
	  		title="<?php the_title(); ?>">
	  		<?php the_post_thumbnail('featured-thumbnail'); ?>
  		</a>
	</div>
	<h3 class="featured-posts--slide--title">
		<?php the_title(); ?>
	</h3>
	<div class="featured-posts--slide--date">
		<?php the_time("F d, Y") ?>
	</div>
</div>