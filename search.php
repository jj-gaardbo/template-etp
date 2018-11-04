<?php get_header(); ?>
		<!-- section -->
		<section class="page-content search-results row">

            <div class="container">

                <div class="page-content-inner">

                    <div class="push"></div>

                    <h1><?php echo sprintf( __( '%s Search results for ', 'etp-consult' ), $wp_query->found_posts ); echo '"'.get_search_query().'"'; ?></h1>

                    <?php get_template_part('loop'); ?>

                    <?php get_template_part('pagination'); ?>

                </div>

            </div>

		</section>
		<!-- /section -->

<?php get_footer(); ?>
