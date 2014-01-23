<?php get_header(); ?>
   
<div id="main" class="container">
  <div id="content" class="row">

        <div id="excerpts" class="col-md-9 col-sm-9 col-xs-12">
         <?php while (have_posts()) : the_post(); ?>
              <?php get_template_part( 'content', 'archive' ); ?>
          <?php endwhile; ?>
              <?php blendtec_content_nav( 'nav-below' ); ?>
    	</div><!-- excerpts -->

      <?php get_sidebar(); ?>

      </div>
  </div>



<?php get_footer(); ?>