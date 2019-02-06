<?php
/**
 * The template for displaying the product custom taxonomy pages.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header(); ?>


<?php
// get the current taxonomy term
$term = get_queried_object();
// vars
$banner_img = get_field('product_category_image', $term);
$copy = get_field('description', $term);
 ?>
<header class = "pageHeader" style = "background-image: url('<?php echo $banner_img['url']; ?>')">
	<div class="container">
		<div class="row">
			<div class = "col-lg-6 offset-lg-6 titleWrapper">
				<h1 class="h3 pageTitle"><?php echo $term->name; ?></h1>
				<p><?php echo term_description(); ?></p>
			</div><!-- .titleWrapper -->
		</div><!-- .row -->
	</div><!-- .container -->
</header><!-- .pageHeader -->

<main class="site-main" id="main">
	<div class="container">
		<div class="row individualProducts">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>          
					<div class="individualProduct col-lg-3"> 
	    			<a href="<?php the_permalink(); ?>">
	    				<?php the_post_thumbnail( 'medium' ); ?>
	    			</a>
	    				<h2 class = "h5"><?php the_field('product_display_name'); ?></h2>
	    				<a href="<?php the_permalink(); ?>">
	    					<button role = 'button' class = 'btn' style = "background-color:<?php the_field('product_color'); ?>">Learn More</button>
	    				</a>
	    				<p><?php the_field('product_description'); ?></p>
	    			</a>
	    		</div><!-- .individualProduct -->
				<?php endwhile; endif; wp_reset_query(); ?>
		</div><!-- .row -->
	</div><!-- #individualProducts.container -->
</main><!-- #main -->

<?php get_footer(); ?>