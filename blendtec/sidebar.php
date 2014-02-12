<div id="sidebar" class="col-md-3 col-sm-3 col-xs-12">
 <div id="sidebar-banner"> 	
   <a href="#" arrow="1" data-toggle="modal" data-target="#modalRecipesNewsletter" ><img src="<?php bloginfo('template_directory'); ?>/images/recipe_side-1.png" alt="" /></a>
 </div>


 <h2 class="sidebartitle"><?php _e('Search Posts'); ?></h2>
<?php get_search_form( true ); ?>
    <h2 class="sidebartitle"><?php _e('Latest Posts'); ?></h2>
    <?php query_posts('showposts=5'); ?>
    <ul class="list-posts">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    	<li class="post-sidebar">
        <a href="<?php the_permalink() ?>">
        <div class="post-sidebar-title"><?php the_title() ?></div>
        <div class="post-sidebar-arrow"></div>
        </a>
 </li>
    <?php endwhile; endif; ?>
    </ul>
     
  <h2 class="sidebartitle"><?php _e('Categories'); ?></h2>
  <ul class="list-cat">
    <?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
  </ul>
 
  <h2 class="sidebartitle"><?php _e('Archives'); ?></h2>
    <div class="select-wrap">
      <select class="list-archives" onChange="document.location.href=this.options[this.selectedIndex].value;">
      <?php wp_get_archives('type=monthly&format=option&show_post_count=0'); ?>
      </select>
    </div>
     <?php dynamic_sidebar( $index ); ?> 
     <?php if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar() ) : ?>
     <?php endif; ?>
</div>