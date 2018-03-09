<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package politsturm
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<link href="<?php echo get_template_directory_uri(); ?>/favicon.ico"  rel="shortcut icon" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/favicon-194x194.png" sizes="194x194">
<link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
<meta name="apple-mobile-web-app-title" content="Politsturm">
<meta name="application-name" content="Politsturm">
<meta name="yandex-verification" content="9749765212bb996c" />


<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700&subset=cyrillic-ext" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'politsturm' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrap">
			<div class="header-left">
				<div class="logo"><a href="<?php echo home_url( '/' ); ?>" title="Вернуться на главную">&nbsp;</a></div>
				
				<div class="mob-menu-button">
					<ul class="mmul">
					<?php
						wp_nav_menu( array(
						'theme_location'  => 'primary',
						'container'       => false,
						'items_wrap'      => '<span>%3$s</span>'
						) ); 
					?>
					<div class="mmul-close"></div>
					</ul>
				</div>
			</div>
			<div class="header-right">
				<div class="menuTop">
					<?php
						wp_nav_menu( array(
						'theme_location'  => 'primary',
						'container'       => false,
						'items_wrap'      => '<ul>%3$s</ul>'
						) ); 
					?>
				</div>
				<div class="search">
					<form id="searchform" name="search" action="<?php echo home_url( '/' ) ?>" role="search" method="get" class="search-form">
						<input type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="" id="s" class="search-input">
						<button type="submit" id="searchsubmit" class="search-button"></button>
					</form>
				</div>
				<!--<div class="social">
					<ul>
						<a class="header-fb" href="https://www.facebook.com/politsturm/" target="_blank" title="Facebook"></a>
						<a class="header-vk" href="https://vk.com/politsturm" target="_blank" title="Вконтакте"></a>
						<a class="header-tw" href="https://twitter.com/politshturm" target="_blank" title="Twitter"></a>
						<a class="header-lj" href="http://politshturm.livejournal.com/" target="_blank" title="LiveJournal"></a>
					</ul>
				</div>-->
				<div class="send">
					<a class="send-mat" href="/vash-material/">// Прислать материал</a>
				</div>
	        </div>
        </div>
	</header><!-- #masthead -->
	
	<div class="site-branding" style="display:none;">
		<?php
		if ( is_front_page() && is_home() ) : ?>
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else : ?>
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php
		endif;

		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
		<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
		<?php
		endif; ?>
	</div>

	<div id="content" class="site-content">
