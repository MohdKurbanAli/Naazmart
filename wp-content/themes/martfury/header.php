<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Martfury
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
 
	<meta name="google-site-verification" content="wdHpA-9SuDpWqfg5zzxsQzjaCqa6S7akaVKGFm7zxFw" />
    <!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-WHHPT00KD9"></script>
	<script>
 	 window.dataLayer = window.dataLayer || [];
  	function gtag(){dataLayer.push(arguments);}
 	 gtag('js', new Date());

 	 gtag('config', 'G-WHHPT00KD9');
	</script>
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php martfury_body_open(); ?>

<div id="page" class="hfeed site">
	<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
		?>
		<?php do_action( 'martfury_before_header' ); ?>
        <header id="site-header" class="site-header <?php martfury_header_class(); ?>">
			<?php do_action( 'martfury_header' ); ?>
        </header>
	<?php } ?>
	<?php do_action( 'martfury_after_header' ); ?>

    <div id="content" class="site-content">
		<?php do_action( 'martfury_after_site_content_open' ); ?>