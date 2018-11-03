<?php get_header();
$post_type = get_current_page_post_type(get_the_ID());
$year     = get_query_var('year');
$args = array(
    'post_type' => $post_type,
    'posts_per_page' => 1,
    'date_query' => array(
        array(
            'year' => $year
        )
    )
);

if(is_singular('post')){
    $args['p'] = get_the_ID();
}

$posts = new WP_Query($args);
?>

<section class="page-content row">

    <div class="push"></div>

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 page-content-inner">

                <?php if ($posts->have_posts()): while ($posts->have_posts()) : $posts->the_post(); ?>

                    <?php echo get_content_DOM($post);?>

                <?php endwhile; ?>

                <?php else: ?>

                    <!-- article -->
                    <article>

                        <h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

                    </article>
                    <!-- /article -->

                <?php endif; ?>

            </div>

            <?php get_sidebar( 'news' ); ?>

        </div>

    </div>

</section>

<?php get_footer(); ?>
