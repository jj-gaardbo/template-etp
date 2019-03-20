<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 5,

);
$query = new WP_Query( $args );
if ( $query->have_posts() ) : ?>

    <section class="news-section row">

        <div class="container">

            <div class="row">

                <div class="<?php echo get_full_width_classes(); ?>">

                    <h2><?php _e('Latest News', 'etp-consult');?></h2>

                </div>

            </div>

            <div class="row">

                <?php if ($query->have_posts()) : $query->the_post(); // first post?>

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 news-item news-item-first clear">

                        <h3 class="post-item-title"><?php echo $post->post_title; ?></h3>

                        <div class="post-item-excerpt">
                            <?php if(has_excerpt($post->ID)) :?>

                                <p><?php echo get_the_excerpt($post->ID);?></p>

                            <?php else :?>

                                <?php echo wpautop(wp_trim_words(get_the_content(), 30));?>

                            <?php endif;?>
                        </div>

                        <a href="<?php echo get_permalink($post->ID); ?>" class="post-item-link btn-theme btn-theme-dark-blue">
                            <?php _e('Read More', 'etp-consult');?>
                        </a>

                    </div>

                <?php endif; ?>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 news-item news-item-list">

                    <ul>

                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                            <li>

                                <a href="<?php echo get_permalink($post->ID); ?>" class="post-item-link">
                                    <h3 class="post-item-title"><?php echo truncate_text($post->post_title, 50); ?></h3>
                                </a>

                            </li>

                        <?php endwhile; ?>

                    </ul>

                </div>

            </div>

        </div>

    </section>

<?php wp_reset_postdata(); endif; ?>
