<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zigcy Lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebPage">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&display=swap&subset=cyrillic" rel="stylesheet">
    <?php wp_head(); ?>
    <link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@19.7.1/dist/css/suggestions.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@19.7.1/dist/js/jquery.suggestions.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-83924870-6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-83924870-6');
</script>
</head>

<body <?php body_class(); ?>>
<div id="wptime-plugin-preloader"></div>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'zigcy-lite' ); ?></a>
		<?php
		/**
        * Mobile navigation 
        */
        do_action('zigcy_lite_mob_nav');
		$zigcy_lite_header = get_theme_mod('zigcy_lite_header_type','layout1');
        /*
        * Gets header layout dynamically from customizer value
        */
        get_template_part('template-parts/header-layouts/header',$zigcy_lite_header); ?>


    </div>
    <?php 
    if( is_front_page() ){
    	do_action('zigcy_lite_slider_promo_section');
    }else{
    	zigcy_lite_header_title_display();
    }
    ?>

    <div id="content" class="site-content">