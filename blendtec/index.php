<?php
	get_header();
	$searchquery = get_query_var('s');
?>
<div class="main-section--content">
  <div class="main-section--post-container">

    <?php if (have_posts()) : ?>
      <header class="page-header">
      		<?php
			if($searchquery != "") :
		?>
       		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'blendtec' ), '<span>' . $searchquery . '</span>' );?></h1>
       	<?php
			endif;
		?>
  	</header>
      
      <?php 
		while (have_posts()) :
			the_post();
			get_template_part( 'content', 'archive' );
		endwhile;
	?>
	<?php blendtec_content_nav( 'nav-below' ); ?>
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
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer();
