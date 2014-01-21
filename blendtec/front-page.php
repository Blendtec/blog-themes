<?php get_header(); ?>
   
<div id="main">
  <div id="content" class="row">

        <div id="excerpts" class="col-md-9">
         <?php while (have_posts()) : the_post(); ?>
              <?php get_template_part( 'content', 'archive' ); ?>
          <?php endwhile; ?>
              <?php blendtec_content_nav( 'nav-below' ); ?>
    	</div><!-- excerpts -->

      <?php get_sidebar(); ?>

      </div>
  </div>



<?php get_footer(); ?>