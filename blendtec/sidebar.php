<?php
/**
 * The Template for the Sidebar
 *
 * @package WordPress
 * @subpackage Blendtec
 * @since Blendtec 1.0
 */
?>
<div class="main-section--sidebar">
  	<div class="sidebar-email-recipe-signup hidden-xs"> 	
   		<div class="sidebar-email-recipe-signup--content-wrap">
   			<h2 class="sidebar-email-recipe-signup--header">Recipes</h2>
   			<div class="sidebar-email-recipe-signup--description">
   				Get recipes, tips &amp; offers delivered to your inbox.
   			</div>
   			<?php get_template_part('recipe_signup'); ?>
   		</div>
	</div>
	<div class="sidebar--social-list">
		<h3 class="sidebar--section-header">
			<?php _e('Connect'); ?>
		</h3>
		<?php get_template_part('social_list'); ?>
	</div>

 	<div class="sidebar--search-form">
 		<h3 class="sidebar--section-header"><?php _e('Search'); ?></h3>
 		<?php get_search_form( true ); ?>
 	</div>
	 
  	<div class="sidebar--category-list-wrap">
  		<h3 class="sidebar--section-header"><?php _e('Categories'); ?></h3>
  		<ul class="sidebar--category-list">
		<?php 
		$args = array(
			'orderby' => 'name',
			'order' => 'ASC',
			'show_count' => '1',
			'hierarchical' => '0',
			'title_li' => __('')
		);
		wp_list_categories($args); ?>
  		</ul>
  	</div>
	
</div>