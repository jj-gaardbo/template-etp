<?php get_header(); ?>

<section class="page-content row">

    <div class="push"></div>

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 page-content-inner">

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

            </div>

            <?php
            wp_reset_postdata();
            get_sidebar();
            ?>

        </div>

    </div>

</section>

<?php get_footer(); ?>
