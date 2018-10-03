<?php
// check if the repeater field has rows of data
if( have_rows('fp_slider') ):?>

<div class="row">
    <div class="fp-slider-grad"></div>
    <div class="<?php echo get_full_width_classes();?>">

        <div class="fp-slider row" id="fp-slider">

            <div class="fp-slider-inner <?php echo get_full_width_classes();?>" data-u="slides">


            <?php

                // loop through the rows of data
                while ( have_rows('fp_slider') ) : the_row(); ?>

                    <div class="fp-slide-item">

                        <img data-src2="<?php the_sub_field('fp_slider_img') ?>" data-u="image"/>


                        <div class="container">

                            <div class="row">

                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                                    <div class="fp-slide-content clear">

                                        <h1><?php the_sub_field('fp_slider_heading') ?></h1>

                                        <p><?php the_sub_field('fp_slider_excerpt') ?></p>

                                        <a href="<?php the_sub_field('fp_slider_link') ?>">Læs mere</a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php endwhile;

            ?>
            </div>

        </div>

    </div>

</div>

<?php endif; ?>
