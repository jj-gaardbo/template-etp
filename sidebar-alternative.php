<!-- sidebar -->
<aside class="sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3" role="complementary">

    <ul class="sidebar-list">

    <?php
    $post_type = get_current_page_post_type(get_the_ID());

    wp_reset_postdata();

    $cpt_posts = new WP_Query(array(
        'post_type' => $post_type,
        'posts_per_page' => -1
    ));

    if ( $cpt_posts->have_posts() ) : ?>
        <?php while ( $cpt_posts->have_posts() ) : $cpt_posts->the_post(); ?>

            <li>
                <a href="<?php the_permalink(); ?>">
                    <?php the_title();?>
                </a>
            </li>

        <?php endwhile; ?>
    <?php endif; ?>

    </ul>

</aside>
<!-- /sidebar -->
