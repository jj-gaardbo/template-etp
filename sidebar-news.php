<!-- sidebar -->
<aside class="sidebar sidebar-news col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3" role="complementary">

    <ul class="accordion" id="accordion-archive">

    <?php
    $post_type = get_current_page_post_type(get_the_ID());

        $args = array(
            'type'            => 'yearly',
            'limit'           => '',
            'format'          => 'accordion',
            'before'          => '',
            'after'           => '',
            'show_post_count' => false,
            'echo'            => 1,
            'order'           => 'DESC',
            'post_type'       => 'post'
        );

        wp_reset_postdata();
        return wp_get_archives( $args );
    ?>
    </ul>

</aside>
<!-- /sidebar -->
