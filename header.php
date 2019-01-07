<?php
/**
 * The header for the theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri() . '/favicons/apple-touch-icon.png';?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri() . '/favicons/favicon-32x32.png';?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri() . '/favicons/favicon-16x16.png';?>">
	<link rel="manifest" href="<?php echo get_stylesheet_directory_uri() . '/favicons/manifest.json';?>">
	<link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri() . '/favicons/safari-pinned-tab.svg';?>" color="#334396">
	<meta name="apple-mobile-web-app-title" content="Silver Mill Tours">
	<meta name="application-name" content="Silver Mill Tours">
	<meta name="msapplication-TileColor" content="#2d89ef">
	<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

<!-- ******************* The Navbar ******************* -->
<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">
	<div class="container">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md">
			<a rel = "home" class="navbar-brand" data-itemprop="url" title="<?php echo esc_attr( get_bloginfo( 'name') ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php $logo = get_field('logo', 'option'); ?>
				<img id = "headerLogo" src = "<?php echo $logo['url']; ?>" title = "<?php echo $logo['title']; ?>" alt = "<?php echo esc_attr( get_bloginfo( 'name') ); ?>">
			</a>

	  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class = "mobileToggle"><i class="fa fa-bars" aria-hidden="true"></i> Menu</span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNavDropdown">
			    <ul id = "main-menu" class="navbar-nav">

<!-- PRODUCTS MEGA MENU -->
<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="nav-item dropdown mega-dropdown active">
	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
		<div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3" aria-labelledby="navbarDropdownMenuLink">
			<div class="row">
				<?php $terms = get_terms('product-category'); ?>
				<?php foreach ( $terms as $term ) { ?>
				<div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
					<h6 class="subtitle text-uppercase font-weight-bold"><?php echo $term->name ?></h6>
					<ul class="list-unstyled">
					<?php query_posts('post_type=products&posts_per_page=-1&product-category='.$term->slug.''); ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<li>
							<a class="menu-item pl-0" href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</li>
					<?php endwhile; ?>
					<?php endif; wp_reset_query(); ?>
			        </ul><!-- .list-unstyled -->
				</div><!-- .sub-menu -->
				<?php } ?>
	        </div><!-- .row -->
	    </div><!-- .mega-menu -->
	</li><!-- .mega-dropdown -->


		<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class = "nav-item">
		<a title="Where to Buy" href="/where-to-buy" class="nav-link">Where to Buy</a>
		</li>

		<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class = "nav-item">
		<a title="Contact Us" href="/contact-us" class="nav-link">Contact Us</a>
		</li>
			    </ul><!-- #main-menu -->
			</div><!-- .collapse -->
		</nav>
	</div><!-- .container -->
</div><!-- .wrapper-navbar end -->
<div class="container">
<?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>	
</div>
