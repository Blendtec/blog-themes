<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('span8'); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
 			<div id="single_post_details">
          <ul id="post_details_list">
            <li>By <?php the_author_posts_link(); ?></li>
            <li><?php the_time('F jS, Y'); ?></li>
            <li>Add Comment</li>
         </ul>
      </div>
      <div class="social-buttons">
       <div class="fb-like" data-href="<?php echo get_bloginfo('url')."/".( basename(get_permalink()) ); ?>" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false" data-font="tahoma"></div>
       <a href="https://twitter.com/share" class="twitter-share-button" data-via="blendtec">Tweet</a>
       <script>
       !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
       </script>

       <div class="g-plusone" data-href="<?php echo get_bloginfo('url')."/".( basename(get_permalink()) ); ?>"  data-width="80" data-size="medium" ></div>
      <script type="text/javascript">
		  (function() {
		    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		    po.src = 'https://apis.google.com/js/plusone.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		  })();
		</script>
<?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>"  data-pin-do="buttonPin" data-pin-config="beside"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>
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

    <div id="tags_container"><?php the_tags(); ?></div>
				<div id="comments_container">
				<?php comments_template( '', true ); ?>
</div>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->