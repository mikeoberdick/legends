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
				<h1 class = "h3 productName"><?php the_field('product_display_name'); ?></h1>
			</div>

			<div class="col-lg-3">
				<?php the_post_thumbnail( 'medium_large' ); ?>
			</div>

			<div id = "center-content" class="col-lg-6">
				<p class = "mb-0"><?php the_field('single_page_description'); ?></p>
				<a class = "where-to-buy" href = '/where-to-buy'><button role = 'button' class = 'mt-4 mb-4 text-white btn btn-lg' style = "background-color:<?php the_field('product_color'); ?>">Where to Buy</button></a></a>
				<h2 class = "h5 mb-3">Benefits of <?php echo the_field('product_display_name'); ?>:</h2>
				<div class = "benefits"><?php echo the_field('benefits'); ?></div>
				<div id = "vertical-sep"></div>
			</div>
			
			<div id = "great-for" class="col-lg-3">
				<h3 class = "h5">Great For:</h3>
				<ul class = "list-unstyled">
					<?php
    				$list_items = get_field('great_for');
    				$items = explode(PHP_EOL, $list_items);
                    foreach($items as $item) {
                        echo '<li class = "d-flex">' . $item . '</li>';
                    }?>
				</ul>
			</div>
		</div><!-- .row -->
	</div><!-- .container -->

	<div id = "tabsWrapper" class="container mt-5">
		<ul class="nav nav-tabs" id="productsTabs" role="tablist">
			<?php if (get_field('guaranteed_analysis')) { ?>
				  <li class="nav-item" style = "background-color:<?php the_field('product_color'); ?>">
				    <a class="nav-link active" id="ga-tab" data-toggle="tab" href="#ga" role="tab" aria-controls="Guaranteed Analysis" aria-selected="true">Guaranteed Analysis</a>
				  </li>
			<?php } ?>
			<?php if (get_field('ingredients')) { ?>
				  <li class="nav-item" style = "background-color:<?php the_field('product_color'); ?>">
				    <a class="nav-link" id="ingredients-tab" data-toggle="tab" href="#ingredients" role="tab" aria-controls="ingredients" aria-selected="false">Ingredients</a>
				  </li>
			<?php } ?>
			<?php if (get_field('feeding_directions')) { ?>
			  <li class="nav-item" style = "background-color:<?php the_field('product_color'); ?>">
			    <a class="nav-link" id="feeding-tab" data-toggle="tab" href="#feeding" role="tab" aria-controls="feeding" aria-selected="false">Feeding Directions</a>
			  </li>
			<?php } ?>
			</ul>

			<div class="tab-content" id="productsTabsContent">
			  <div class="tab-pane fade show active" id="ga" role="tabpanel" aria-labelledby="ga-tab">
			  	<h4 class = "h5 text-uppercase" style = "background-color:<?php the_field('product_color'); ?>">Guaranteed Analysis</h4>

<?php 
//vars
$analysis_table = get_field ( 'guaranteed_analysis' );
$analysis_table_2 = get_field ( 'guaranteed_analysis_2' );
$header_1 = get_field ( 'guaranteed_analysis_header_1' );
$header_2 = get_field ( 'guaranteed_analysis_header_2' );
$cols = get_field ( 'number_of_guaranteed_analysis_sections' );
?>

<?php if ($cols != '2' ) {
//there is only one column so make it full width
echo '<table class = "table" border="0">';
        if ( $analysis_table['header'] ) {
            echo '<thead>';
                echo '<tr>';
                    foreach ( $analysis_table['header'] as $th ) {
                        echo '<th>';
                            echo $th['c'];
                        echo '</th>';
                    }
                echo '</tr>';
            echo '</thead>';
        }
        echo '<tbody>';
            foreach ( $analysis_table['body'] as $tr ) {
                echo '<tr>';
                    foreach ( $tr as $td ) {
                        echo '<td>';
                            echo $td['c'];
                        echo '</td>';
                    }
                echo '</tr>';
            }
        echo '</tbody>';
    echo '</table>';

} elseif ( $cols === '2' ) {
//there are two columns so make them share the space
echo '<div class = "row">';
	echo '<div class = "col-md-6 left-ga-column">';
		echo '<h4 class = "h5">' . $header_1 . '</h4>';
		echo '<table class = "table" border="0">';
        if ( $analysis_table['header'] ) {
            echo '<thead>';
                echo '<tr>';
                    foreach ( $analysis_table['header'] as $th ) {
                        echo '<th>';
                            echo $th['c'];
                        echo '</th>';
                    }
                echo '</tr>';
            echo '</thead>';
        }
        echo '<tbody>';
            foreach ( $analysis_table['body'] as $tr ) {
                echo '<tr>';
                    foreach ( $tr as $td ) {
                        echo '<td>';
                            echo $td['c'];
                        echo '</td>';
                    }
                echo '</tr>';
            }
        echo '</tbody>';
    echo '</table>';
  echo '</div>';

    echo '<div class = "col-md-6 right-ga-column">';
		echo '<h5>' . $header_2 . '</h5>';
		echo '<table class = "table" border="0">';
        if ( $analysis_table_2['header'] ) {
            echo '<thead>';
                echo '<tr>';
                    foreach ( $analysis_table_2['header'] as $th ) {
                        echo '<th>';
                            echo $th['c'];
                        echo '</th>';
                    }
                echo '</tr>';
            echo '</thead>';
        }
        echo '<tbody>';
            foreach ( $analysis_table_2['body'] as $tr ) {
                echo '<tr>';
                    foreach ( $tr as $td ) {
                        echo '<td>';
                            echo $td['c'];
                        echo '</td>';
                    }
                echo '</tr>';
            }
        echo '</tbody>';
    echo '</table>';
    echo '</div>';
echo '</div>';
} ?>

<p class = "product_footer"><?php the_field('guaranteed_analysis_footer'); ?></p>
			  </div>
			<div class="tab-pane fade" id="ingredients" role="tabpanel" aria-labelledby="ingredients-tab">
			  	<h4 class = "h5 text-uppercase" style = "background-color:<?php the_field('product_color'); ?>">Ingredients</h4>
			  	<?php the_field('ingredients'); ?>
			</div>
			<div class="tab-pane fade" id="feeding" role="tabpanel" aria-labelledby="feeding-tab">
			  	<h4 class = "h5 text-uppercase" style = "background-color:<?php the_field('product_color'); ?>">Feeding Directions</h4>
			  	<?php the_field('feeding_directions'); ?>
				<p class = "product_footer"><?php the_field('feeding_directions_footer'); ?></p>
			</div>
			</div>
	</div><!-- #tabsWrapper -->
</main><!-- #main -->

<?php get_footer(); ?>