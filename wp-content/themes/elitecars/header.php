<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elitecars
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300|Roboto+Condensed" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
	<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="logo">
				<?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
					<a href="<?php echo esc_url( home_url( '/' )); ?>">
						<img src="<?php echo get_theme_mod( 'wp_bootstrap_starter_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
					</a>
				<?php else : ?>
					<a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
				<?php endif; ?>				
			</div>
			<div class="mobile-button">
				<div>
					<div id="show-menu"><i class="fa fa-bars" aria-hidden="true"></i></div>
				</div>
			</div>
			<!-- <div class="menu-buttons">
				<ul class="inline">
					<li><a href="" class="btn e_button">Contact us</a></li>
				</ul>
			</div> -->
			<div class="menu">
				<div class="mobile-view-header">
					<i class="fa fa-times close-menu" aria-hidden="true"></i>
				</div>
				<?php 
					 wp_nav_menu(array(
						'theme_location'=> 'primary',
						'menu_id' 		=> false,
						'menu_class'	=> 'inline',
						'depth'			=> 3,
					));
				?>
			</div>
			<div id="menu-bg" class="close-menu"></div>
		</div>
	</header><!-- #masthead -->
	<?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
		<div id="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
			<div class="container">
				<h1>
					<?php
					if(get_theme_mod( 'header_banner_title_setting' )){
						echo get_theme_mod( 'header_banner_title_setting' );
					}else{
						echo get_bloginfo('name');
					}
					?>
				</h1>
				<p>
					<?php
					if(get_theme_mod( 'header_banner_tagline_setting' )){
						echo get_theme_mod( 'header_banner_tagline_setting' );
				}else{
						echo esc_html__('To customize the contents of this header banner and other elements of your site go to Dashboard - Appearance - Customize','wp-bootstrap-starter');
					}
					?>
				</p>
			</div>
		</div>
	<?php endif; ?>
	<div id="content" class="site-content">
		<div class="container-fluid">
			<div class="row">
				<?php endif; ?>
