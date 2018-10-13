<?php get_header();
$post_type = get_current_page_post_type(get_the_ID());

$posts = new WP_Query(array(
    'post_type' => $post_type,
    'posts_per_page' => 1
));
?>

<section class="page-content row">

    <div class="push"></div>

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 page-content-inner">

                <?php if ($posts->have_posts()): while ($posts->have_posts()) : $posts->the_post(); ?>

                    <!-- article -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <!-- post thumbnail -->
                        <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                            <?php the_post_thumbnail(); // Fullsize image for the single post ?>
                        <?php endif; ?>
                        <!-- /post thumbnail -->

                        <!-- post title -->
                        <h1>
                            <?php the_title(); ?>
                        </h1>
                        <!-- /post title -->

                        <?php the_content(); // Dynamic Content ?>

                        <?php edit_post_link(); // Always handy to have Edit Post Links available ?>

                    </article>
                    <!-- /article -->

                <?php endwhile; ?>

                <?php else: ?>

                    <!-- article -->
                    <article>

                        <h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

                    </article>
                    <!-- /article -->

                <?php endif; ?>

            </div>

            <?php

            wp_reset_postdata();

            if($post_type == 'post'){
                get_sidebar( 'news' );
            } else {
                get_sidebar();
            }
            ?>

        </div>

    </div>

</section>

<?php get_footer(); ?>
