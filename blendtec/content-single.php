<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" 
	<?php post_class(); ?>>

		<?php
		if (has_post_thumbnail()) :
		?>
			<div class="single-post--featured-image">
				<div class="single-post--image-wrap">
				  	<?php the_post_thumbnail( 'featured-image'); ?>
				</div>
			</div>
	  	<?php 
		endif;
		?>
	<header class="single-post--header">
		<?php if ('post' == get_post_type()) : ?>
			<div class="single-post--post-meta">
				<span class="single-post--post-date"><?php the_time("F d, Y") ?></span>
				BY 
				<span class="single-post--author"><?php the_author_link(); ?></span>
				/ 
				<a href="<?php comments_link(); ?>">
					<?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?>
				</a>
			</div>
		<?php endif; ?>
		<h1 class="single-post--title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="single-post--content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<div class="single-post--content-nav">
		<?php blendtec_content_nav('nav-below'); ?>
	</div>

	<footer class="single-post--meta">
		<div class="single-post--tags">
			<?php the_tags( '<span>Categories: </span>', ', ' ); ?> 
		</div>
		<div class="single-post--post-author">
			<div class="single-post--post-author--avatar">
				<?php echo get_avatar( get_the_author_id(), 160); ?>
			</div>
			<div class="single-post--post-author--info">
				<div class="single-post--post-author--name">
						<span>Written by </span>
						<a rel="author" href="/author/<?php echo get_the_author_meta('user_login'); ?>/">
							<?php the_author_firstname(); ?> 
							<?php the_author_lastname(); ?>
						</a>
				</div>
				<div class="single-post--post-author-description">
					<?php the_author_description(); ?>
				</div>
			</div>
		</div>
		<div class="single-post--comments-container">
			<?php
				comments_template();
			?>
		</div>
				
	</footer>
</article>