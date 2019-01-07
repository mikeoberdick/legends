<?php
/**
 * The template for displaying the product custom taxonomy pages.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header(); ?>

<main class="site-main" id="main">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3><?php the_field('product_display_name'); ?></h3>
			</div>

			<div class="col-lg-3">
				<?php the_post_thumbnail( 'medium_large' ); ?>
			</div>

			<div id = "center-content" class="col-lg-6">
				<p class = "mb-0"><?php the_field('single_page_description'); ?></p>
				<a href = '/where-to-buy'><button role = 'button' class = 'mt-4 mb-4 text-white btn btn-lg' style = "background-color:<?php the_field('product_color'); ?>">Where to Buy</button></a></a>
				<h5 class = "mb-3">Benefits of <?php echo the_field('product_display_name'); ?>:</h5>
				<div class = "benefits"><?php echo the_field('benefits'); ?></div>
				<div id = "vertical-sep"></div>
			</div>
			
			<div id = "great-for" class="col-lg-3">
				<h5>Great For:</h5>
				<ul class = "list-unstyled">
					<?php
    				$list_items = get_field('great_for');
    				$items = explode(",", $list_items);
                    foreach($items as $item) {
                        echo '<li>' . $item . '</li>';
                    }?>
				</ul>
			</div>
		</div><!-- .row -->
	</div><!-- .container -->

	<div id = "tabsWrapper" class="container mt-5">
		<ul class="nav nav-tabs" id="productsTabs" role="tablist">
			  <li class="nav-item" style = "background-color:<?php the_field('product_color'); ?>">
			    <a class="nav-link active" id="ga-tab" data-toggle="tab" href="#ga" role="tab" aria-controls="Guaranteed Analysis" aria-selected="true">Guaranteed Analysis</a>
			  </li>
			  <li class="nav-item" style = "background-color:<?php the_field('product_color'); ?>">
			    <a class="nav-link" id="ingredients-tab" data-toggle="tab" href="#ingredients" role="tab" aria-controls="ingredients" aria-selected="false">Ingredients</a>
			  </li>
			  <li class="nav-item" style = "background-color:<?php the_field('product_color'); ?>">
			    <a class="nav-link" id="feeding-tab" data-toggle="tab" href="#feeding" role="tab" aria-controls="feeding" aria-selected="false">Feeding Directions</a>
			  </li>
			</ul>

			<div class="tab-content" id="productsTabsContent">
			  <div class="tab-pane fade show active" id="ga" role="tabpanel" aria-labelledby="ga-tab">
			  	<h6 class = "text-uppercase">Guaranteed Analysis</h6>
			  </div>
			  <div class="tab-pane fade" id="ingredients" role="tabpanel" aria-labelledby="ingredients-tab">
			  	<h6 class = "text-uppercase">Ingredients</h6>
			  </div>
			  <div class="tab-pane fade" id="feeding" role="tabpanel" aria-labelledby="feeding-tab">
			  	<h6 class = "text-uppercase">Feeding Directions</h6>
			</div>
			</div>
	</div><!-- #tabsWrapper -->


			

</main><!-- #main -->

<?php get_footer(); ?>