<?php get_header(); ?>

<section class="page-content row">

    <div class="push"></div>

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 page-content-inner">

                <?php echo get_field('404_content_'.pll_current_language( 'slug' ), 'options');?>

            </div>

            <?php wp_reset_postdata(); ?>

        </div>

    </div>

</section>

<?php get_footer(); ?>
