<?php get_header(); ?>
   
<div id="main">
  <div id="content">
  <div id="excerpts">
<?php 
if (have_posts()) :
	while (have_posts()) :
		the_post();
		the_content();
	endwhile;
endif;
?>

     
   
      </div>
       <?php get_sidebar(); ?>
  </div>
</div>


<div id="delimiter"></div>

<?php get_footer();
