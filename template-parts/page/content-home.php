<div class="container">
	<div id="heroSection" class="row">
		<div class="col-lg-4">
			<h1 class = "h3"><?php echo the_field('hero_header'); ?></h1>
			<p><?php echo the_field('hero_copy'); ?></p>
		</div><!-- .col-lg-4 -->
		<div id = "productImages" class="col-lg-8">
			<?php $hero_image = get_field('hero_image'); ?>
			<img src = "<?php echo $hero_image['url']; ?>" title = "<?php echo $hero_image['title']; ?>" alt = "<?php echo $hero_image['alt']; ?>">
		</div><!-- .col-lg-8 -->	
	</div><!-- .row -->
</div><!-- #heroSection.container -->

<?php if( have_rows('product_callouts') ): ?>

	<div class="container" id="productCallouts">
		<div class="row">

	<?php while( have_rows('product_callouts') ): the_row(); 

		// vars
		$image = get_sub_field('image');
		$link = get_sub_field('link');

		?>

		<div class="col-lg-3">
			<a class = "productCalloutWrapper" href = "<?php echo $link['url']; ?>">
				<?php if( $image ): ?>
					<img src = "<?php echo $image['url']; ?>" title = "<?php echo $image['title']; ?>" alt = "<?php echo $image['alt']; ?>" />
				<?php endif; ?>
				<?php if( $link ): ?>
					<h2 class = "h5"><?php echo $link['title']; ?></h2>
				<?php endif; ?>
			</a><!-- .productCalloutWrapper -->
		</div><!-- .col-lg-3 -->

	<?php endwhile; ?>

		</div><!-- .row -->
	</div><!-- #productCallouts.container -->

<?php endif; ?>