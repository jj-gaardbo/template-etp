<?php get_header(); ?>

<section class="page-content row">

    <div class="push"></div>

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 page-content-inner">

                <?php echo get_content_DOM($post);?>

            </div>

            <?php
            wp_reset_postdata();
            get_sidebar();
            ?>

        </div>

    </div>

</section>

<?php get_footer(); ?>
