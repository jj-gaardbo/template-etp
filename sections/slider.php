<?php
// check if the repeater field has rows of data
if( have_rows('fp_slider') ):?>

<section class="fp-slider-section row">

    <div class="fp-slider-grad"></div>

        <ul class="fp-slider" id="fp-slider">

            <?php

                // loop through the rows of data
                while ( have_rows('fp_slider') ) : the_row(); ?>

                    <li class="fp-slide-item" style="background-image:url(<?php the_sub_field('fp_slider_img') ?>);">

                        <div class="container">

                            <?php
                                $pos = get_sub_field('fp_slider_box');
                                $align = ($pos == 'topright' || $pos == 'bottomright') ? 'justify-content-end' : 'justify-content-start';
                            ?>

                            <div class="row <?php echo $align; ?>">

                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                                    <div class="fp-slide-content <?php echo $pos;?> clear">

                                        <?php if(get_sub_field('fp_slider_heading')):?>

                                            <h1><?php the_sub_field('fp_slider_heading') ?></h1>

                                        <?php endif; ?>

                                        <?php if(get_sub_field('fp_slider_excerpt')):?>

                                            <p><?php the_sub_field('fp_slider_excerpt') ?></p>

                                        <?php endif; ?>

                                        <?php if(get_sub_field('fp_slider_link')):?>

                                            <a href="<?php the_sub_field('fp_slider_link') ?>">Læs mere</a>

                                        <?php endif; ?>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </li>

                <?php endwhile;

            ?>

        </ul>


</section>

<?php endif; ?>
