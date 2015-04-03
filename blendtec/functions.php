<?php
/**
 * Blendtec functions and definitions.
 *
 * @package WordPress
 * @subpackage reymondko
 * @since Blendtec 1.0
 */

/* Disable WordPress Admin Bar. */
show_admin_bar(false);


// Sets up the content width value based on the theme's design and stylesheet.
if (!isset($content_width)) :
	$content_width = 760;
endif;

/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Blendtec 1.0
 * @return null
 */
function blendtec_setup() {
	load_theme_textdomain('blendtec', get_template_directory() . '/languages');

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support('automatic-feed-links');

	// This theme supports a variety of post formats.
	add_theme_support('post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ));

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu('primary', __('Primary Menu', 'blendtec'));

	// Disable WordPress Admin Bar.
	show_admin_bar(false);
	add_filter('show_admin_bar', '__return_false');
	/*
	 * This theme supports custom background color and image, and here
	 * we also set up the default background color.
	 */
	add_theme_support('custom-background', array(
		'default-color' => 'e6e6e6',
	));
}

add_action( 'after_setup_theme', 'blendtec_setup' );

/**
 * Enqueues scripts and styles for front-end.
 *
 * @since Blendtec 1.0
 * @return null
 */
function blendtec_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if (is_singular() && comments_open() && get_option( 'thread_comments' )) {
		wp_enqueue_script( 'comment-reply' );
	}

	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'blendtec-style', get_stylesheet_uri() );
	wp_enqueue_script( 'blendtec-script', get_template_directory_uri() . '/js/src/scripts.min.js');
	/*
	 * Loads the Internet Explorer specific stylesheet.
	 */
	wp_enqueue_style( 'blendtec-ie', get_template_directory_uri() . '/css/ie.css', array( 'blendtec-style' ), '20121010' );
	$wp_styles->add_data( 'blendtec-ie', 'conditional', 'lt IE 9');
}

add_action('wp_enqueue_scripts', 'blendtec_scripts_styles');

add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() {
?>

<script type="text/javascript">
var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>

<?php
}


/**
 * Creates function to retrieve featured posts on via Ajax
 * 
 * @param string Current count
 * @return json
 */
function get_featured_posts() {
	$offset = intval($_POST['index']);
	$args = array(
		'posts_per_page' => 3,
		'category_name' => 'featured',
		'offset' => $offset,
		'orderby' => 'post_date',
		'order' => 'DESC',
		'post_type' => 'post',
		'post_status' => 'publish'
	);
	$postsArray = new WP_Query( $args );
	include( locate_template( 'featured_posts_ajax.php' ) );
	wp_die();
}

add_action( 'wp_ajax_get_featured_posts', 'get_featured_posts' );
add_action( 'wp_ajax_nopriv_get_featured_posts', 'get_featured_posts' );

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.*
 * @since Blendtec 1.0 
 * @return string Filtered title.
 */
function blendtec_wp_title($title, $sep) {
	global $paged, $page;

	if (is_feed()) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo('name');

	// Add the site description for the home/front page.
	$site_description = get_bloginfo('description', 'display');
	if ($site_description && (is_home() || is_front_page())) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ($paged >= 2 || $page >= 2) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'blendtec' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'blendtec_wp_title', 10, 2 );

/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @param string $html_id Id of the content nav*
 * @since Blendtec 1.0
 * @return null
 */
function blendtec_content_nav($html_id) {
	global $wp_query;

	$html_id = esc_attr($html_id);

	if ($wp_query->max_num_pages > 1) :
		?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav icon icon_arrow_left"></span> <span class="nav-text left">Older posts</span>', 'blendtec' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( __( '<span class="nav-text right">Newer posts</span><span class="meta-nav icon icon_arrow"></span>', 'blendtec' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
		<?php
	endif;
}

/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own blendtec_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Blendtec 1.0
 * @return null
 */
function blendtec_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	//var_dump($comment);
	switch ($comment->comment_type) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
		?>
		<li 
		<?php comment_class(); ?>
		id="comment-<?php comment_ID(); ?>">
		<p>
		<?php 
			_e( 'Pingback:', 'blendtec' );
			comment_author_link();
			edit_comment_link( __( '(Edit)', 'blendtec' ), '<span class="edit-link">', '</span>' );
		?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
		?>

		<li 
		<?php comment_class(); ?> 
		id="li-comment-<?php comment_ID(); ?>">

		<article id="comment-<?php comment_ID(); ?>" class="comment--article">
			<div class="comment--avatar">
				<?php echo get_avatar($comment, ''); ?>
			</div>
			<div class="comment--content">
				<header class="comment--meta comment-author vcard">
					<div class="comment--author-name">
						<?php
						printf('%1$s %2$s',
							get_comment_author_link(),
							// If current post author is also comment author, make it known visually.
							($comment->user_id === $post->post_author ) ? '<span> ' . __('Post author', 'blendtec') . '</span>' : ''
						);
						?>
					</div>
					<div class="comment--date">
						<?php
							printf('<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link($comment->comment_ID)),
								get_comment_time('c'),
								/* translators: 1: date, 2: time */
								sprintf(__( '%1$s at %2$s', 'blendtec' ), get_comment_date(), get_comment_time() )
							);
						?>	
					</div>
					
				</header><!-- .comment-meta -->

				<?php 
					if ('0' == $comment->comment_approved) :
				?>
					<p class="comment--awaiting-moderation">
						<?php _e( 'Your comment is awaiting moderation.', 'blendtec' ); ?>
					</p>
				<?php
					endif;
				?>

				<section class="comment--text">
					<?php comment_text(); ?>
					<?php edit_comment_link( __( 'Edit', 'blendtec' ), '<p class="edit-link">', '</p>' ); ?>
				</section>

				<div class="comment--reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'blendtec' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div>
			</div>
			
		</article><!-- #comment-## -->
		<?php
		endswitch; // end comment_type check
}

function blendtec_comment_form( $args = array(), $post_id = null ) {
	if ( null === $post_id )
		$post_id = get_the_ID();

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$args = wp_parse_args( $args );
	if ( ! isset( $args['format'] ) )
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = 'html5' === $args['format'];
	$fields   =  array(
		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
		'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
				'<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . ' /></p>',
		'url' => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
				'<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
	);

	$required_text = sprintf( ' ' . __('Required fields are marked %s'), '<span class="required">*</span>' );

/**
 * Filter the default comment form fields.
 *
 * @since 3.0.0
 *
 * @param array $fields The default comment fields.
 */
	$fields = apply_filters( 'comment_form_default_fields', $fields );
	$defaults = array(
		'fields' => $fields,
		'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea id="comment" name="comment" cols="45" rows="8" aria-describedby="form-allowed-tags" aria-required="true"></textarea></p>',
		/** This filter is documented in wp-includes/link-template.php */
		'must_log_in' => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		/** This filter is documented in wp-includes/link-template.php */
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . __( 'Your email address will not be published.' ) . '</span>'. ( $req ? $required_text : '' ) . '</p>',
		'comment_notes_after' => '<p class="form-allowed-tags" id="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
		'id_form' => 'commentform',
		'id_submit' => 'submit',
		'class_submit' => 'submit',
		'name_submit' => 'submit',
		'title_reply' => __( 'Leave <span>Comment</span>' ),
		'title_reply_to' => __( 'Leave a Reply to %s' ),
		'cancel_reply_link' => __( 'Cancel <span>Reply</span>' ),
		'label_submit' => __( 'Post Comment' ),
		'format' => 'xhtml',
	);

/**
 * Filter the comment form default arguments.
 *
 * Use 'comment_form_default_fields' to filter the comment fields.
 *
 * @since 3.0.0
 *
 * @param array $defaults The default comment form arguments.
 */
	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

		if (comments_open( $post_id )) :
			/**
			 * Fires before the comment form.
			 *
			 * @since 3.0.0
			 */
			do_action( 'comment_form_before' );
			?>
			<div id="respond" class="comment-respond">
				<h3 id="reply-title" class="comment-reply-title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></h3>
				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
					<?php echo $args['must_log_in']; ?>
					<?php
					/**
					 * Fires after the HTML-formatted 'must log in after' message in the comment form.
					 *
					 * @since 3.0.0
					 */
					do_action( 'comment_form_must_log_in_after' );
					?>
				<?php else : ?>
					<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="comment-form"<?php echo $html5 ? ' novalidate' : ''; ?>>
						<?php
						/**
						 * Fires at the top of the comment form, inside the form tag.
						 *
						 * @since 3.0.0
						 */
						do_action( 'comment_form_top' );
						?>
						<?php if ( is_user_logged_in() ) : ?>
							<?php
							/**
							 * Filter the 'logged in' message for the comment form for display.
							 *
							 * @since 3.0.0
							 *
							 * @param string $args_logged_in The logged-in-as HTML-formatted message.
							 * @param array  $commenter      An array containing the comment author's
							 *                               username, email, and URL.
							 * @param string $user_identity  If the commenter is a registered user,
							 *                               the display name, blank otherwise.
							 */
							echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );
							?>
							<?php
							/**
							 * Fires after the is_user_logged_in() check in the comment form.
							 *
							 * @since 3.0.0
							 *
							 * @param array  $commenter     An array containing the comment author's
							 *                              username, email, and URL.
							 * @param string $user_identity If the commenter is a registered user,
							 *                              the display name, blank otherwise.
							 */
							do_action( 'comment_form_logged_in_after', $commenter, $user_identity );
							?>
						<?php else : ?>
							<?php echo $args['comment_notes_before']; ?>
							<?php
							/**
							 * Fires before the comment fields in the comment form.
							 *
							 * @since 3.0.0
							 */
							do_action( 'comment_form_before_fields' );
							foreach ( (array) $args['fields'] as $name => $field ) {
								/**
								 * Filter a comment form field for display.
								 *
								 * The dynamic portion of the filter hook, `$name`, refers to the name
								 * of the comment form field. Such as 'author', 'email', or 'url'.
								 *
								 * @since 3.0.0
								 *
								 * @param string $field The HTML-formatted output of the comment form field.
								 */
								echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
							}
							/**
							 * Fires after the comment fields in the comment form.
							 *
							 * @since 3.0.0
							 */
							do_action( 'comment_form_after_fields' );
							?>
						<?php endif; ?>
						<?php
						/**
						 * Filter the content of the comment textarea field for display.
						 *
						 * @since 3.0.0
						 *
						 * @param string $args_comment_field The content of the comment textarea field.
						 */
						echo apply_filters( 'comment_form_field_comment', $args['comment_field'] );
						?>
						<?php echo $args['comment_notes_after']; ?>
						<div class="btblog--cta-button">
							<button class="bt-button-style cta-bt-button red-to-gray" type="submit">
								<div class="bt-button-text"><span>Post Comment</span></div>
								<span class="icon icon_arrow bt-button-arrow"></span>
							</button>
							<?php comment_id_fields( $post_id ); ?>
						</div>
						<?php
						/**
						 * Fires at the bottom of the comment form, inside the closing </form> tag.
						 *
						 * @since 1.5.0
						 *
						 * @param int $post_id The post ID.
						 */
						do_action( 'comment_form', $post_id );
						?>
					</form>
				<?php endif; ?>
			</div><!-- #respond -->
			<?php
			/**
			 * Fires after the comment form.
			 *
			 * @since 3.0.0
			 */
			do_action( 'comment_form_after' );
		else :
			/**
			 * Fires after the comment form if comments are closed.
			 *
			 * @since 3.0.0
			 */
			do_action( 'comment_form_comments_closed' );
		endif;
}

function add_slug_css_list_categories($list) {
	$cats = get_categories();
	foreach($cats as $cat) :
		$find = 'cat-item-' . $cat->term_id . '"';
		$replace = 'category-' . $cat->slug . '"';
		$list = str_replace( $find, $replace, $list );
		$find = 'cat-item-' . $cat->term_id . ' ';
		$replace = 'category-' . $cat->slug . ' ';
		$list = str_replace( $find, $replace, $list );
	endforeach;

	return $list;
}

add_filter('wp_list_categories', 'add_slug_css_list_categories');

function remove_excerpt_readmore($more) {
	return null;
}

add_filter('excerpt_more', 'remove_excerpt_readmore');

function favicon_link() {
	echo '<link rel="shortcut icon" type="image/x-icon" href="/favico.png" />' . "\n";
}
add_action('wp_head', 'favicon_link');


function blendtec_url() {
	return "http://www.blendtec.com";
}

function bt_search_form( $form ) {
	$form = '<form role="search" method="get" class="btblog--searchform" action="' . home_url( '/' ) . '" >
	<div class="btblog--searchform--input-wrap">
	<input type="text" value="' . get_search_query() . '" name="s" id="s" class="btblog--searchform--input" />
	<button type="submit" id="searchsubmit"class="btblog--searchform--button" /><i class="icon icon_search"></i></button>
	</div>
	</form>';

	return $form;
}

add_filter( 'get_search_form', 'bt_search_form' );

function modify_contact_methods($profile_fields) {

	// Add new fields
	$profile_fields['twitter'] = 'Twitter Username';
	$profile_fields['facebook'] = 'Facebook URL';

	// Remove old fields
	unset($profile_fields['aim']);
	unset($profile_fields['yahoo']);

	return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');

// This theme uses a custom image size for featured images, displayed on "standard" posts.
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 700, 400, true );
add_image_size( 'featured-image', 730, 475 ); //cropped
add_image_size( 'post-image', 640, 375, true ); //(cropped)
add_image_size('featured-thumbnail', 350, 200, true);
