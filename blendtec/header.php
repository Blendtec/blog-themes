<?php
/**
 * The Template for displaying footer
 *
 * @package WordPress
 * @subpackage Blendtec
 * @since Blendtec 1.0
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />

<?php
	if (is_single()) :
		if (have_posts()) :
			while (have_posts()) :
				the_post();
				$largeImageUrl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
			?>

				<meta property="og:title" content="<?php the_title(); ?>" />
				<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
				<meta property="og:type" content="article" />
				<meta property="og:url" content="<?php the_permalink(); ?>" />
				<meta property="og:image" content="<?php echo $largeImageUrl[0]; ?>" />
				<meta property="og:site_name" content="Blendtec Official Blog"/>
				<meta property="fb:app_id" content="50696200937743"/>

			<?php 
			endwhile;
		endif;
	endif;
?>

<?php 
	$searchquery = get_query_var('s');
	if ($searchquery != "") :
	?>
	<link rel="canonical" href="http://www.blendtec.com/blog/"/>
	<?php
	endif;
?>

<?php wp_head(); ?>
<!--[if IE 7]>
<link href='<?php bloginfo('template_directory'); ?>/css/ie7.css' rel='stylesheet' type='text/css'>
<![endif]-->
<!--[if IE 6]>
<link href='<?php bloginfo('template_directory'); ?>/css/ie6.css' rel='stylesheet' type='text/css'>
<![endif]-->
<!--[if lt IE 9]>
<script src="<?php bloginfo('template_directory'); ?>/js/html5shiv.js"></script>
<![endif]-->

<script src="//cdn.blendtec.com/js/modernizr.min.js"></script>


<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-43Z4V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-43Z4V');</script>
<!-- End Google Tag Manager -->
</head>

<body>
<?php 
	get_template_part('partials/recipemodal');
	get_template_part('partials/navigation');
?>
	<!-- <div id="graybg"></div> -->

	<section class="header-top-banner top-banner container">
		<a href="<?php echo get_bloginfo('url'); ?>">
		<div class="header-top-banner--image-wrap">
			<div class="row header-top-banner--text-wrap">
				<h1 class="header-top-banner--main-header">The Blendtec Blog</h1>
				<h2 class="header-top-banner--secondary-header">Fuel / Nurture / Create</h2>
			</div>
			<div class="header-top-banner--stripe">
				<div class="header-top-banner--stripe-inner">
					<div class="header-top-banner--recipe-signup hidden-sm hidden-md hidden-lg">
						<div class="header-top-banner--recipe-signup--wrap">
							<p class="header-top-banner--recipe-signup--description">
								Get Recipes, Tips &amp; Offers!
							</p>
							<?php get_template_part('recipe_signup'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>		
		</a>
	</section>
	<section class="main-section">