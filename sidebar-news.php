<!-- sidebar -->
<aside class="sidebar sidebar-news col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3" role="complementary">

    <ul class="accordion sidebar-list" id="accordion-archive">

    <?php
    $post_type = get_current_page_post_type(get_the_ID());

        $args = array(
            'post_type'       => 'post'
        );

        wp_reset_postdata();
        $query = new WP_Query( $args );
        foreach($query->posts as $postObj): ?>
            <li <?php echo $postObj->ID == get_the_ID() ? 'class="active"' : ''; ?>>
                <a href="<?php echo get_permalink($postObj) ?>">
                    <?php echo get_the_title($postObj); ?>
                </a>
            </li>
        <?php endforeach;?>

    </ul>

</aside>
<!-- /sidebar -->
