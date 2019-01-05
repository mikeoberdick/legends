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

<div class="wrapper" id="page-wrapper">
	<main class="site-main" id="main">
		<header>
			<div class="container-fluid pageHeader" style = "background-image: url('<?php echo $banner_img['url']; ?>')">
				<div class="row">
					<div class = "col-lg-6 offset-lg-6 titleWrapper">
						<h3 class="pageTitle"><?php echo $term->name; ?></h3>
						<p><?php echo term_description(); ?></p>
					</div><!-- .titleWrapper -->
				</div><!-- .row -->
			</div><!-- .container -->
		</header><!-- .pageHeader -->
	</main><!-- #main -->
</div><!-- #page-wrapper -->

<div id="individualProducts" class="container">
	<div class="row">
		<?php
			$total_terms = $term->count;

			if ($total_terms === 1){
				$col_span = 'col-sm-12';
			} else if ($total_terms === 2){
				$col_span = 'col-sm-6';
			} else if ($total_terms === 3){
				$col_span = 'col-sm-4';
			} else if ($total_terms === 4){
				$col_span = 'col-sm-3';
			} ?>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>          
				<div class="individualProduct <?php echo $col_span; ?>"> 
    			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    		</div><!-- .individualProduct -->
			<?php endwhile; endif; wp_reset_query(); ?>
	</div><!-- .row -->
</div><!-- #individualProducts.container -->

<?php get_footer(); ?>