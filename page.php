<?php
/**
 * The template for displaying all pages.
 *
 * This is the template for pages...note the conditionals for use with template parts.
 * Each page will need a container and a row.
 * These elements have been removed from this page to allow for each page to either be a fixed or fluid width container.
 *
 * @package understrap
 */

get_header();

?>
		<?php if ( !is_front_page() ) { ?>
			<?php $bg = get_field('banner_image'); ?>
			<header class = "pageHeader" style = "background-image: url('<?php echo $bg['url']?>')">
				<div class="container">
					<div class="row">
						<div class = "col-lg-6 offset-lg-6 titleWrapper">
							<h3 class="pageTitle"><?php echo get_field('headline') ?></h3>
						</div><!-- .titleWrapper -->
					</div><!-- .row -->
				</div><!-- .container -->
			</header><!-- .pageHeader -->
		<?php } ?>

	<main class="site-main" id="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php if (is_page('homepage')) {
				get_template_part( 'template-parts/page/content', 'home' );
			}

			else if (is_page('where-to-buy')) {
				get_template_part( 'template-parts/page/content', 'where-to-buy' );
			}

			else if (is_page('contact-us')) {
				get_template_part( 'template-parts/page/content', 'contact-us' );
			}

			else {
			   get_template_part('loop-templates/content', 'page');
			}

			?>

		<?php endwhile; // end of the loop. ?>

	</main><!-- #main -->

<?php get_footer(); ?>