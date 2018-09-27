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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
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
				<div class="logo"><a href="<?php echo home_url( '/' ); ?>" title="Вернуться на главную">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 180 70">
						<path class="logo-text" d="M33.47 37.17l-11.588.02-.065-.001-2.58 7.723H33.47zm-14 .014l-2.633 7.727c-1.477-.005-7.007-.022-7.289-.015-2.333.063-2.211 4.306.194 4.356 0 0 2.546 0 5.615.007l-2.666 7.827c-.922-.023-1.834-.05-2.7-.082C4.235 56.792-.953 53.571.149 45.748c1.101-7.823 9.637-8.585 9.637-8.585zm-4.316 19.953c4.358.074 8.312.069 8.312.069 3.664-.22 4.229 4.15.443 4.25-.585.016-5.188-.05-10.155-.127l-2.634 7.883 12.515.004s10.523-.195 10.878-8.776c.356-8.58-6.472-11.046-9.066-11.117-1.159-.031-4.414-.049-7.663-.058zm-3.894 4.152l-2.698 7.922-8.025-.003.003-8.098s5.212.09 10.72.179zm44.609 8.654h-8.542v-.762l8.542-7.328zm11.611-32.76H55.87v-.003h-8.542v.002H36.568v8.495h10.759v20.475l8.542-7.627V45.677H67.48zm.313-.068h8.42v23.257c0 .544.447.988.993.988h17.86a.993.993 0 0 0 .991-.988v-2.363l7.98-1.09v2.74c0 5.349-4.393 9.725-9.762 9.725H77.511c-5.345 0-9.718-4.356-9.718-9.68zm28.264 18.24c2.257-.417 6.316-1.137 7.98-1.43v-16.81h-7.98zm17.505 14.25h-8.334v-4.767l12.232-12.903h14.443c.925 0 1.682-.754 1.682-1.675v-3.352c0-.922-.757-1.676-1.682-1.676h-8.088l7.696-8.118h1.292c4.42 0 8.036 3.603 8.036 8.006v6.863c0 4.403-3.616 8.006-8.036 8.006h-.32l8.883 9.534h-10.47l-9.354-9.534h-7.98zm-8.334-9.252l8.117-8.418h-.06v-6.703h6.523l7.828-8.118h-22.408V59.99zm35.598-23.187V55.2l13.107-8.105-4.554-9.929zm14.222 12.196l-14.222 8.262V69.26h8.553V53.726l6.672 15.421 8.325.114 7.146-16.772-.05 16.678 8.528.072-.029-32.026s-2.503 0-5.547.028c-3.044.029-5.829 5.549-5.829 5.549l-8.168 18.145zM1.144 13.289h8.538l-8.538 1.523zm16.322.29L1.144 16.356v2.434l8.82 8.304h5.623c3.43 0 6.236-2.795 6.236-6.212v-1.38c0-2.766-1.838-5.124-4.357-5.923zM7.629 27.094H5.905v5.805H1.144V20.97zm-1.724-8.85H16.01c.715 0 1.3.584 1.3 1.296v1.728c0 .712-.585 1.295-1.3 1.295H5.905zm22.1-5.033h.99l-5.957 4.107a5.068 5.068 0 0 1 4.967-4.107zm3.39 0l-8.444 6.402v7.852c0 2.769 2.274 5.035 5.054 5.035H40.32c2.78 0 5.054-2.266 5.054-5.035v-9.22a4.994 4.994 0 0 0-1.086-3.11c-1.793-.46-5.248-1.346-7.508-1.924zm-2.324 4.574h10.183c1.02 0 1.855.831 1.855 1.847v6.287a1.857 1.857 0 0 1-1.855 1.848H29.071a1.857 1.857 0 0 1-1.855-1.848v-6.287c0-1.016.835-1.847 1.855-1.847zm17.178-4.896h5.088v12.907l-5.088-1.824zm9.868 14.62h8.758v3.139zm8.575 5.073L46.25 25.71v6.873h5.088zm.887-19.75h5.088v.033L65.58 15.81zm5.088 2.218l-5.088 2.825v14.69h5.088zm8.263-1.877h11.768v5.069h-6.68v7.574l-5.088 4.418V18.242h-6.68v-5.07zm5.088 14.603a573.686 573.686 0 0 0-5.088 4.567v.563h5.088z" fill="#000200" fill-rule="evenodd"/>
						<path d="M92.425 25.483l-1.218-.96-2.946 2.935L130.327 70l3.3-2.991-28.624-28.898 11.27-10.591s2.988-3.826 4.98-5.385c1.99-1.559 2.474-2.012 2.474-2.012l-2.361 4.223 4.922-3.005s3.897 6.632 5.69 6.207c1.792-.425 12.29-8.87 12.346-9.21.057-.34-.512-3.884.342-4.507.853-.624 2.788-.17 2.788-.17l2.93-4.478s-4.41 2.295-4.78 2.664c-.37.368-1.194.623-1.194.623s-.91-1.332.227-2.21c1.138-.879 3.386-2.58 3.386-2.58s-5.15 1.361-5.49 1.56c-.342.198-3.3 1.955-3.3 1.955s-.408-2.913.655-5.128c1.062-2.215 1.175-2.342 1.175-2.342l-2.478 1.227s-.661-.984.021-2.6C139.29.737 139.687 0 139.687 0s-3.641 3.344-4.608 3.826c-.968.482-7.227 5.527-7.227 5.527s-.825-1.756-1.736-3.124v-.001a3.37 3.37 0 0 0-.074-.11l-.012-.017-.03-.04c-1.229-1.674-3.29-1.03-3.29-1.03s-9.363 3.768-9.925 4.167c-.408.29-.858 1.565-1.074 2.24-.139.436-.146.397.091.772l1.571 2.476-2.808-2.051s-.133.053-.588.186c-.454.133-2.406.347-2.406.347l-1.525.932s-.478.061-.721.08c-.244.018-.65.153-.65.153zm9.795-2.951s3.556-1.247 4.864.057c1.309 1.303-.455 2.012-1.422 1.587-.967-.425-1.195-.567-1.622-.794-.426-.227-1.82-.85-1.82-.85zm25.12-1.644s5.69-2.976 6.06-.794c.37 2.183-1.906 6.094-1.906 6.094l-2.874-3.571c-.227-.284-1.28-1.729-1.28-1.729zm-4.381-7.482l1.85 1.87s-1.31.312-1.537-.141c-.227-.454-.313-1.73-.313-1.73zm17.07 1.814s1.337 3.23-.114 4.11c-1.451.878-1.536.453-1.28-.653.186-.805.918-2.832 1.394-3.457zm-6.544-5.074l1.878 1.36-1.337.624-1.48-1.303z" fill="#d5001f" fill-rule="evenodd"/>
					</svg>
				</a></div>

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
					<div class="search-mob-wrapper">
						<div class="search">
							<form id="searchform" name="search" action="<?php echo home_url( '/' ) ?>" role="search" method="get" class="search-form">
								<input type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="Поиск" id="s" class="search-input">
								<button id="searchsubmit" class="search-button">
									<span class="search-icon"></span>
								</button>
							</form>
						</div>
					</div>
					</ul>
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
						<input type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="Поиск" id="s" class="search-input">
						<button id="searchsubmit" class="search-button">
							<span class="search-icon"></span>
						</button>
					</form>
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
