<?php /* Template Name: Reference Page */
get_header();
global $wp_query;
$original_query = $wp_query;
if($post->post_content === ''){
    $wp_query = null;
    $wp_query = new WP_Query( array(
        'post_type' => 'references',
        'posts_per_page' => 1
    ) );
}
?>

<section class="page-content row">
    <div class="push"></div>

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 page-content-inner">

                <?php if ( have_posts() ) : ?>

                    <?php while ( have_posts() ) : the_post();?>

                        <?php echo get_content_DOM($post); ?>

                    <?php endwhile; ?>

                <?php else: ?>

                    <!-- article -->
                    <article>

                        <h1><?php _e( 'Sorry, nothing to display.', 'etp-consult' ); ?></h1>

                    </article>
                    <!-- /article -->

                <?php endif; ?>

            </div>

            <?php get_sidebar('alternative'); ?>

        </div>

    </div>

</section>

<?php
$wp_query = null;
$wp_query = $original_query;
wp_reset_postdata();
get_footer();
?>
