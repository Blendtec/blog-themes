<?php get_header(); ?>
<div id="wrapper">
	<div id="main" class="container">
		<div id="content" class="row">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Posts tagged: %s', 'blendtec' ), '<span>' . single_cat_title( '', false ) . '</span>' );?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
				?>
			</header>
			<div id="excerpts" class="col-md-9 col-sm-9 col-xs-12">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'archive' );?>
				<?php endwhile; ?>
				<?php blendtec_content_nav( 'nav-below' ); ?>
			</div><!-- excerpts -->
		<?php else : ?>
			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'blendtec' ); ?></h1>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'blendtec' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->
		<?php endif; ?>
		<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>