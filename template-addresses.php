<?php
/* Template Name: Addresses template */
get_header(); ?>

<section class="page-content addresses row">

    <div class="push"></div>

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 page-content-inner">

                <?php echo get_content_DOM($post);?>

                <?php
                // check if the repeater field has rows of data
                if( have_rows('addresses') ):?>

                    <?php while ( have_rows('addresses') ) : the_row();
                        // display a sub field value
                        $titel = get_sub_field('address_titel');
                        $image = get_sub_field('address_img');

                        $address = get_sub_field('address');
                        $map = get_sub_field('address_map');
                        ?>

                        <div class="address-item">

                            <div class="address-item-inner">

                                <div class="row">

                                    <div class="<?php echo get_full_width_classes(); ?>">
                                        <strong class="address-title">
                                            <?php echo $titel; ?>
                                        </strong>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 address-image">
                                        <?php if($image):?>

                                            <img src="<?php echo $image['url'];?>" alt="<?php echo $titel;?>"/>

                                        <?php endif;?>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 address-text">

                                        <?php if($address):?>

                                            <?php echo $address; ?>

                                        <?php endif;?>

                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 col-xl-5">

                                        <?php if($map):?>

                                            <iframe
                                                width="100%"
                                                height="100%"
                                                id="gmap_canvas"
                                                src="https://maps.google.com/maps?q=<?php echo $map['lat']?>%2C<?php echo $map['lng']?>&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                                frameborder="0"
                                                scrolling="no"
                                                marginheight="0"
                                                marginwidth="0">
                                            </iframe>

                                        <?php endif;?>

                                    </div>

                                </div>

                            </div>

                        </div>

                    <?php endwhile; ?>

                <?php else :

                    // no rows found

                endif;
                ?>

            </div>

            <?php
            wp_reset_postdata();
            get_sidebar();
            ?>

        </div>

    </div>

</section>

<?php get_footer(); ?>
