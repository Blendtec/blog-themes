<?php get_header(); ?>
   
<div id="main">
  <div id="content">
  <div id="excerpts" class="col-md-9 col-sm-9 col-xs-12">
 <?php if (have_posts()) : while (have_posts()) : the_post();?>
<?php the_content(); ?>
<?php endwhile; endif; ?>
     
   
      </div>
       <?php get_sidebar(); ?>
  </div>
</div>


<div id="delimiter"></div>

<?php get_footer(); ?>