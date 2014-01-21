<?php get_header(); ?>

<div id="main">
  <div id="content" class="row">

        <div id="excerpts" class="span8">
     <?php $posts = get_posts();
            foreach($posts as $post) : setup_postdata($post);
            ?>
            <?php get_template_part( 'content', 'archive' ); ?>
            <?php endforeach; ?>
              <?php blendtec_content_nav( 'nav-below' ); ?>
    	</div><!-- excerpts -->

      <?php get_sidebar(); ?>

      </div>
  </div>



<?php get_footer(); ?>