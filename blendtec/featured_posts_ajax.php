<div class="featured-posts--holder">
<?php
	while ($postsArray->have_posts()) : $postsArray->the_post();

		get_template_part('featured_posts_item');

	endwhile;
?>
</div>