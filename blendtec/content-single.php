<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
 			<div id="single-post-details">
          <ul id="post-details">
            <li class="author"><i class="icon-user"></i><?php the_author() ?></li>
            <li class='date'><i class="icon-clock"></i><?php the_time("d F, Y") ?></li>
            <li class="tags-container"><i class="icon-tags"></i><?php the_tags(); ?></li>
         </ul>
      </div>
      


		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
     <div class="postauthor">
    <div class="author_title">ABOUT THE AUTHOR</div>
    	<div class="author_avatar">
    		<?php echo get_avatar( get_the_author_id(), 140 ); ?>
            <h4><a rel="author" href="http://www.blendtec.com/blog/author/<?php echo get_the_author_meta('user_login'); ?>/" style="color:#434343"><?php the_author_firstname(); ?> <?php the_author_lastname(); ?></a></h4>
    	</div>
    	<div class="author_description">
    		<?php the_author_description(); ?>
    	</div>
    	<div class="clear-both"></div>
    </div>
    <div id="comments_container">
      <?php comments_template( '', true ); ?>
    </div>
				
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->