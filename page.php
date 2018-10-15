<?php get_header();
$post_type = get_current_page_post_type(get_the_ID());

// Hack in order to display the posts correctly
$post_array = array();
if($post->post_content === ''){
    $posts = new WP_Query(array(
        'post_type' => $post_type,
        'posts_per_page' => 1
    ));
    if($posts->post_count != 0){
        $post_array = array($posts->posts[0]);
    }
} else {
    $post_array = $posts;
}
?>

<section class="page-content row">

    <div class="push"></div>

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 page-content-inner">

                <?php if (is_array($post_array) && !empty($post_array) && !is_null($post_array[0])):?>

                    <?php foreach($post_array as $post) : ?>

                        <!-- article -->
                        <article id="post-<?php $post->ID; ?>">

                            <!-- post thumbnail -->
                            <?php if ( has_post_thumbnail($post)) : // Check if Thumbnail exists ?>
                                <?php get_the_post_thumbnail($post); // Fullsize image for the single post ?>
                            <?php endif; ?>
                            <!-- /post thumbnail -->

                            <!-- post title -->
                            <h1>
                                <?php echo get_the_title($post); ?>
                            </h1>
                            <!-- /post title -->

                            <?php
                            $content = $post->post_content;
                            $content = apply_filters('the_content', $content);
                            $content = str_replace(']]>', ']]&gt;', $content);
                            echo $content; ?>

                            <?php edit_post_link(); // Always handy to have Edit Post Links available ?>

                        </article>
                        <!-- /article -->

                    <?php endforeach; ?>

                <?php else: ?>

                    <!-- article -->
                    <article>

                        <h1><?php _e( 'Sorry, nothing to display.', 'etp-consult' ); ?></h1>

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
