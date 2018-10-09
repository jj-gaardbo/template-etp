<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="search-results row">

            <div class="push"></div>

            <div class="container">
			<h1><?php echo sprintf( __( '%s Søgeresultater for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>
            </div>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
