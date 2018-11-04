<?php /* Template Name: Reference Page */
get_header(); ?>

<section class="page-content overview row">
    <div class="push"></div>

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 page-content-inner">

                <!-- article -->
                <article id="post-<?php $post->ID; ?>">

                    <!-- post title -->
                    <div class="post-title clearfix">
                        <h1>
                            <?php echo get_the_title($post); ?>
                            <?php edit_post_link(""); // Always handy to have Edit Post Links available ?>
                        </h1>
                    </div>
                    <!-- /post title -->

                    <!-- post thumbnail -->
                    <?php if ( has_post_thumbnail($post)) : // Check if Thumbnail exists
                        $classThumb = 'thumbnail-container';
                        if(pll_current_language( 'slug' ) == 'en'){
                            $imageID = get_post_thumbnail_id();
                            $caption = get_post_meta( $imageID, '_caption_en', true );
                        } else {
                            $caption = get_the_post_thumbnail_caption($post);
                        }
                        if(clean_string($caption) !== ''){
                            $classThumb .= ' attachment-has-caption';
                        }
                        ?>
                        <div class="<?php echo $classThumb; ?>">
                            <?php echo get_the_post_thumbnail($post); // Fullsize image for the single post ?>
                            <?php
                            if(clean_string($caption) !== ''){?>
                                <span class="caption-container">
                                    <p>
                                        <?php echo $caption; ?>
                                    </p>
                                </span>
                            <?php } ?>
                        </div>
                    <?php endif; ?>
                    <!-- /post thumbnail -->

                    <?php
                    $content = $post->post_content;
                    if(clean_string($content) !== ''){
                        $content = apply_filters('the_content', $content);
                        $content = str_replace(']]>', ']]&gt;', $content);
                        echo $content;
                    }?>

                    <?php
                    $references = get_all_references();
                    if(!empty($references)) : ?>

                        <div class="overview-container overview-references row">

                        <?php foreach($references as $reference): ?>

                            <div class="overview-item overview-reference col-sm-12 col-md-6 col-lg-4 col-xl-3">

                                <div class="overview-item-inner">

                                    <a href="<?php echo get_permalink($reference); ?>">

                                        <?php if( $logo = get_field('ref_logo', $reference->ID) ): ?>
                                            <img class="overview-item-image" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
                                        <?php endif; ?>

                                        <span class="overview-item-title">
                                            <?php echo $reference->post_title;?>
                                        </span>

                                    </a>

                                </div>

                            </div>

                        <?php endforeach; ?>

                        </div>

                    <?php endif; ?>

                </article>
                <!-- /article -->

            </div>

            <?php get_sidebar('alternative'); ?>

        </div>

    </div>

</section>

<?php
get_footer();
?>
