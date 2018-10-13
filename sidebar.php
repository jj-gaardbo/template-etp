<!-- sidebar -->
<aside class="sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3" role="complementary">

    <ul class="sidebar-list">

    <?php
    $post_type = get_current_page_post_type(get_the_ID());

        $args = array(
            'type'            => 'yearly',
            'limit'           => '',
            'format'          => 'html',
            'before'          => '',
            'after'           => '',
            'show_post_count' => false,
            'echo'            => 1,
            'order'           => 'DESC',
            'post_type'       => 'post'
        );

        return wp_get_archives( $args );
    ?>
    </ul>

</aside>
<!-- /sidebar -->
