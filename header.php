<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hakeem
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header" style="background-image:url('<?php header_image(); ?>');">
		<div class="header-top row">
			<div class="logo">
						<?php 
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );						
						if (!$image[0]):?>
							<h1 class="site-title"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else :?>
							<h1><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $image[0] ); ?>"></a></h1>
						<?php endif;?>	
			</div>
			<?php $description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div>
		<!-- container to normalize fixed navigation behavior when scrolling -->
		<div class="navcontain">
			<div class="navbar" gumby-fixed="top" id="nav">
				<div class="row">
					<?php 
					$menu_name = 'primary';

					if( has_nav_menu('primary') ){
						echo '<a class="toggle" gumby-trigger="#nav > .row > ul" href="#"><i class="icon-menu"></i></a>';
						wp_nav_menu( array( 'theme_location' => 'primary', 'container'=>'', 'fallback_cb' =>'', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'walker' => new hakeem_walker) );
					}
					else 
						echo '<ul><li><a href="' . esc_url( home_url('/') ) . 'wp-admin/nav-menus.php">' . __('Go to "Appearance - Menus" to set-up menu', 'hakeem') . '</a></li></ul>';	
					?>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->


