<div id="sidebar" class="col-md-3 col-sm-3 col-xs-12">
 <div id="sidebar-banner"> 	
   <a href="#modalRecipesNewsletter" arrow="1" data-toggle="modal" onClick="_gaq.push(['_trackEvent', 'Image Button', 'Sign Up Newsletter', 'Sidebar Top']);"><img src="<?php bloginfo('template_directory'); ?>/images/recipe_side-1.png" alt="" /></a>
 </div>


  <div id="modalRecipesNewsletter" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="#submit" id="NewsletterDisplayForm" method="POST" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div>	<div class="modal-header">
  		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
  	</div>
  	<div class="modal-body">
  		<h2>Get Blendtec Recipes</h2>
  		<p>Get new Blendtec recipes delivered to your inbox each week</p>
  		<div class="newsletters form">
  			<fieldset>
  				<div class="newsletter-email">
           <label for="NewsletterEmail" class="control-label">Email<span class="required">*</span></label>
          <div class="controls">
            <input name="data[Newsletter][email]" type="email" id="NewsletterEmail" required="required">
          </div></div>
          <div class="newsletter-firstname">
          <label for="NewsletterFirstName" class="control-label">First Name<span class="required">*</span></label><div class="controls">
          <input name="data[Newsletter][first_name]" type="text" id="NewsletterFirstName" required="required"></div></div>
          <div class="newsletter-lastname"><label for="NewsletterLastName" class="control-label">Last Name<span class="required">*</span></label><div class="controls">
          <input name="data[Newsletter][last_name]" type="text" id="NewsletterLastName" required="required"></div></div>			</fieldset>

  		</div>

  	</div>
  	<div class="modal-footer">
  		<div class="newsletter-submit"><button type="submit" class="btn btn-red" onClick="_gaq.push(['_trackEvent', 'Image Button', 'Send Me Recipes', 'Modal Submit Button ']);">Send Me Recipes<span class="font-arrow">&#9658;</span></button></div>
    </div>
	</form>

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