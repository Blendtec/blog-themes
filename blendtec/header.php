<?php
/**
 * The Template for displaying footer
 *
 * @package WordPress
 * @subpackage Blendtec
 * @since Blendtec 1.0
 */

if( isset($_POST['data']) )
{
    send_newsletter_subscription($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link href='<?php bloginfo('template_directory'); ?>/css/blendtec.css' rel='stylesheet' type='text/css'>
<link rel="icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />

<?php if(is_single()) { ?>
<?php if (have_posts()) : while (have_posts()) : the_post();  
 $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large'); ?>

<meta property="og:title" content="<?php the_title(); ?>" />
<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php the_permalink(); ?>" />
<meta property="og:image" content="<?php echo $large_image_url[0]; ?>" />
<meta property="og:site_name" content="Blendtec Official Blog"/>
<meta property="fb:app_id" content="50696200937743"/>
<?php endwhile; endif; ?>
<?php } ?>

<?php $searchquery = get_query_var('s'); ?>
<?php if($searchquery != "") { ?>
<link rel="canonical" href="http://www.blendtec.com/blog/"/>
<?php } ?>

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

<?php if(is_single()) { ?>
<!--Social Media Scripts -->
<div id="fb-root"></div>
<script>
//(function(d, s, id) {
//   var js, fjs = d.getElementsByTagName(s)[0];
//   if (d.getElementById(id)) return;
//   js = d.createElement(s); js.id = id;
//   js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
//   fjs.parentNode.insertBefore(js, fjs);
// }(document, 'script', 'facebook-jssdk'));
</script>
<!-- End Social Media Scripts -->
<?php } ?>
<?php get_template_part('partials/recipemodal'); ?>
<?php get_template_part('partials/navigation'); ?>
	<!-- <div id="graybg"></div> -->

	<section class="top-banner container">
		<div class="row">
			<a href="<?php echo get_bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/Blendtec_BlogBanner_SQ.png" alt="Blendtec banner" /></a>
		</div>
	</section>
	<div id="wrapper">