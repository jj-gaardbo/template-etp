<!-- sidebar -->
<aside class="sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3" role="complementary">

    <ul class="sidebar-list">

    <?php
    $post_type = get_current_page_post_type(get_the_ID());
    $list = array();
    switch($post_type){
        case 'references':
            $pageReferences = get_field('pt_references_'.pll_current_language( 'slug' ),'options');
            $list = get_field('control_sidebar_ref', $pageReferences);
            break;
        case 'cases':
            $pageCase = get_field('pt_cases_'.pll_current_language( 'slug' ),'options');
            $list = get_field('control_sidebar_case', $pageCase);
            break;

        case 'expertises':
            $pageExpertises = get_field('pt_expertises_'.pll_current_language( 'slug' ),'options');
            $list = get_field('control_sidebar_exp', $pageExpertises);
            break;
    }

    wp_reset_postdata();
    if(empty($list)){
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
        <?php endif;
    } else {
        foreach($list as $item):
            $itemID = url_to_postid( $item );
            ?>
            <li <?php echo $itemID == get_the_ID() ? 'class="active"' : ''; ?>>
                <a href="<?php echo $item; ?>">
                    <?php echo get_the_title($itemID);?>
                </a>
            </li>
        <?php endforeach;
    }
    ?>

    </ul>

</aside>
<!-- /sidebar -->
