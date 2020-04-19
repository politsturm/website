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

$theme_url = get_template_directory_uri();
$favicon_url = $theme_url."/assets/img/favicon/"

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $favicon_url; ?>/apple-touch-icon.png?v=2b0WvGmNYO">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $favicon_url; ?>/favicon-32x32.png?v=2b0WvGmNYO">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $favicon_url; ?>/favicon-16x16.png?v=2b0WvGmNYO">
<link rel="manifest" href="<?php echo $favicon_url; ?>/site.webmanifest?v=2b0WvGmNYO">
<link rel="mask-icon" href="<?php echo $favicon_url; ?>/safari-pinned-tab.svg?v=2b0WvGmNYO" color="#525252">
<link rel="shortcut icon" href="<?php echo $favicon_url; ?>/favicon.ico?v=2b0WvGmNYO">
<meta name="apple-mobile-web-app-title" content="Politsturm">
<meta name="application-name" content="Politsturm">
<meta name="msapplication-TileColor" content="#e00028">
<meta name="theme-color" content="#ffffff">
<meta name="p:domain_verify" content="ce654f6dd5f4e3ccbfde11b182232dfe">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
<meta name="google-site-verification" content="rW8CC0xX27fdIHAH2xhwrFY9LE3wy98uhD8YVpxL7F4" />
<meta name="yandex-verification" content="9749765212bb996c" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php include_once( 'assets/svg/sprite.php'); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'politsturm' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrap">
			<div class="header-left">
				<div class="logo">
					<a href="<?php echo home_url( '/' ); ?>">
						<img src="<?php bloginfo('template_url'); ?>/images/logo2.png" alt="politsturm">
					</a>
					<div class="logo-branch_name">
						<?php
						if (POLITSTURM_BRANCH::get_site_type() == SiteType::BranchSite) {
							echo "// ".POLITSTURM_BRANCH::get_branch_name();
						}
						?>
					</div>
				</div>

				<div class="mob-menu-button">
					<ul class="mmul">
					<?php
						wp_nav_menu( array(
						'theme_location'  => 'primary',
						'container'       => false,
						'items_wrap'      => '<span>%3$s</span>',
						'after'           => '<div class="menu__arrow"></div>'
						) );
					?>
					<div class="mmul-close"></div>
					<div class="mob-social">
						<?php include('template-parts/social-icons.php'); ?>
					</div>
					</ul>
				</div>

				<div class="search-mobile-menu">
					<div class="search">
						<form id="searchform" name="search" action="<?php echo home_url( '/' ) ?>" role="search" method="get" class="search-form">
							<input type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php _e('Search...', 'politsturm'); ?>" id="s" class="search-input">
							<button id="searchsubmit" class="search-button">
								<span class="search-icon"></span>
							</button>
						</form>
						<div class="search__close"></div>
					</div>
				</div>
			</div>
			<div class="header-right">
				<div class="menuTop">
					<?php
						wp_nav_menu( array(
						'theme_location'  => 'primary',
						'container'       => false,
						'items_wrap'      => '<ul>%3$s</ul>',
						'after'           => '<div class="menu__arrow"></div>'
						) );
					?>
				</div>
				<div class="search">
					<form id="searchform" name="search" action="<?php echo home_url( '/' ) ?>" role="search" method="get" class="search-form">
						<input type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php _e('Search...', 'politsturm'); ?>" id="s" class="search-input">
						<button id="searchsubmit" class="search-button">
							<span class="search-icon"></span>
						</button>
					</form>
					<div class="search__control-wrapper">
						<div class="search__close"></div>
					</div>
				</div>
	        </div>
        </div>
        <div class="header-overlay"></div>
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
