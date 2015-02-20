<div class="archive--single-post-item">

	<?php
	if (has_post_thumbnail()) :
	?>
		<div class="archive--single-post-item--featured-image">
			<div class="archive--single-post-item--image-wrap">
				<a href="<?php the_permalink(); ?>"
			  		title="<?php the_title(); ?>">
			  		<?php the_post_thumbnail( 'featured-image'); ?>
		  		</a>
			</div>
		</div>
  	<?php 
	endif;
	?>
  
	<div class="archive--single-post-item--post-content">
		<div class="archive--single-post-item--post-meta">
			<span class="archive--single-post-item--post-date"><?php the_time("F d, Y") ?></span>
			BY 
			<span class="archive--single-post-item--author"><?php the_author_link(); ?></span>
			/ 
			<a href="<?php comments_link(); ?>">
				<?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?>
			</a>	  		
		</div>
		<h1 class="archive--single-post-item--post-title">
			<a href="<?php the_permalink(); ?>" 
		  		title="<?php the_title(); ?>">
			<?php the_title(); ?>
	  		</a>
		</h1>		
		<div class="archive--single-post-item--post-excerpt">
	  		<?php 
				the_excerpt();
				get_template_part('readmore');
			?>
		</div>    
	</div>
</div>
