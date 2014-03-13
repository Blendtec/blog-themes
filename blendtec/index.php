<?php get_header(); ?>
<div id="wrapper">
  <div id="main" class="container">
    <div id="content" class="row">
      <div id="excerpts">
        <?php $searchquery = get_query_var('s'); ?>
        <?php if($searchquery != "") : ?>
        <header class="page-header">
    		  <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'blendtec' ), '<span>' . $searchquery . '</span>' );?></h1>
    		</header>
        <?php endif; ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part( 'content', 'archive' ); ?>
        <?php endwhile; ?>
        <?php blendtec_content_nav( 'nav-below' ); ?>
    	</div><!-- excerpts -->
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>