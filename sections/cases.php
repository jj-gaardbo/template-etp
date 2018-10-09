<?php
$cases = get_field("fp_cases");
if($cases === null){ return; }

$numOfCases = count($cases);
$classes = get_cases_cols($numOfCases);
if( have_rows('fp_cases') ):?>

<section class="cases-section row clearfix">

    <div class="container">

        <div class="row">

            <div class="<?php echo get_full_width_classes();?> clearfix">

                <h1>Udvalgte cases</h1>

            </div>

        </div>

        <div class="row">

            <?php

            // loop through the rows of data
            while ( have_rows('fp_cases') ) : the_row();
            $case = get_sub_field('fp_case');
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $case->ID ), 'medium_large' ); ?>

            <div class="<?php echo $classes; ?> case-item clearfix">

                <a href="<?php echo get_permalink($case->ID);?>">

                    <div class="case-item-img clearfix" style="background-image: url(<?php echo $image[0];?>);"></div>

                </a>

                <div class="case-item-inner clearfix">

                    <h2><?php echo truncate_text($case->post_title, 50); ?></h2>

                    <?php if(has_excerpt($case->ID)) :?>

                        <p><?php get_the_excerpt($case->ID);?></p>

                    <?php else :?>

                        <?php echo wpautop(wp_trim_words($case->post_content, 40));?>

                    <?php endif;?>

                    <div class="case-item-link">
                        <a class="btn-theme btn-theme-dark-blue" href="<?php echo get_permalink($case->ID);?>">
                            <?php _e('Read More','etp-consult');?>
                        </a>
                    </div>
                    <div class="clear"></div>

                </div>

            </div>

            <?php endwhile; ?>

        </div>

    </div>

</section>

<?php endif; ?>
