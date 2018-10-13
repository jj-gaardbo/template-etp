<?php
// check if the repeater field has rows of data
if( have_rows('fp_slider') ):?>

<section class="fp-slider-section row">

    <ul class="fp-slider" id="fp-slider">

        <?php

            // loop through the rows of data
            while ( have_rows('fp_slider') ) : the_row();
                $image = get_sub_field('fp_slider_img');
                ?>

                <li class="fp-slide-item" style="background-image:url(<?php echo $image['sizes']['slider-size']; ?>);">

                    <?php
                    $heading = get_sub_field('fp_slider_heading');
                    $excerpt = get_sub_field('fp_slider_excerpt');
                    $link = get_sub_field('fp_slider_link');

                    if($heading != "" || $excerpt != "" || $link != ""): ?>

                    <div class="container">

                        <?php
                            $pos = get_sub_field('fp_slider_box');
                            $align = ($pos == 'topright' || $pos == 'bottomright') ? 'justify-content-end' : 'justify-content-start';
                        ?>

                        <div class="row <?php echo $align; ?>">

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                                <div class="fp-slide-content <?php echo $pos;?> clear">

                                    <?php if($heading):?>

                                        <h1><?php echo $heading; ?></h1>

                                    <?php endif; ?>

                                    <?php if($excerpt):?>

                                        <p><?php echo $excerpt; ?></p>

                                    <?php endif; ?>

                                    <?php if($link):?>

                                        <a class="btn-theme btn-theme-dark-blue" href="<?php echo $link; ?>"><?php _e('Read More','etp-consult');?></a>

                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                    </div>

                    <?php endif; ?>

                </li>

            <?php endwhile;

        ?>

    </ul>

    <span class="arrow-down"><i class="fas fa-caret-down"></i></span>

</section>

<?php endif; ?>
