<?php

function get_accordion_DOM_news($link_html, $url, $text, $format, $before, $after){
    ob_start();
    $class = '';
    $highlight = '';
    $posts = get_posts(array(
        'post_type' => 'post',
        'date_query' => array(
            array(
                'year' => clean_string($text)
            )
        )
    ));

    if(is_singular('post') && get_the_date('Y', get_the_ID()) == clean_string($text)){
        $class = ' show';
    }
    ?>


    <li>
        <div class="accordion-head">
            <button class="btn" type="button" data-toggle="collapse" data-target="#collapse-<?php echo clean_string($text);?>" aria-expanded="true" aria-controls="collapseOne">
                <?php echo $text; ?>
            </button>
        </div>

        <div id="collapse-<?php echo clean_string($text);?>" class="collapse<?php echo $class; ?>" data-parent="#accordion-archive">
            <div>
                <ul>
                    <?php foreach($posts as $post):?>
                        <li>
                            <a href="<?php echo get_permalink($post->ID); ?>" class="<?php echo url_to_postid(get_permalink()) == $post->ID ? 'active-list-item' : ''; ?>"><?php echo $post->post_title;?></a>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </li>


    <?php return ob_get_clean();
}


function get_content_DOM($post){
    ob_start();?>

    <!-- article -->
    <article id="post-<?php $post->ID; ?>" class="clearfix">

        <!-- post title -->
        <div class="post-title">
            <h1>
                <?php echo $post->post_title; ?>
                <?php edit_post_link(""); ?>
            </h1>
            <?php if( $logo = get_field('ref_logo', $post->ID) ): ?>
                <a href="<?php echo get_field('ref_url', $post->ID); ?>" target="_blank">
                    <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
                </a>
            <?php endif; ?>
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
        $content = trim($post->post_content);
        if($content !== ''){
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);
            echo $content;
        }?>

    </article>
    <!-- /article -->

    <div class="additional-content row">

        <?php if($contactPerson = get_field('expertise_emp', $post->ID)):?>

            <div class="contact-content col-xl-4">

                <h3><?php _e('Contact person', 'etp-consult');?></h3>

                <?php if(is_object($contactPerson)):?>

                    <div class="contact-item <?php echo get_full_width_classes();?>">

                        <strong class="contact-name">
                            <?php echo $contactPerson->post_title; ?>
                        </strong>

                        <img src="<?php echo get_the_post_thumbnail_url($contactPerson); ?>" alt=""/>

                        <ul>
                            <?php if( get_field('emp_title', $contactPerson->ID) ): ?>
                                <li><?php the_field('emp_title', $contactPerson->ID); ?></li>
                            <?php endif;?>

                            <?php if( get_field('emp_education', $contactPerson->ID) ): ?>
                                <li><?php the_field('emp_education', $contactPerson->ID); ?></li>
                            <?php endif;?>

                            <?php if( get_field('emp_phone', $contactPerson->ID) ): ?>
                                <li><a href="tel:<?php echo str_replace(' ', '', get_field('emp_phone', $contactPerson->ID)); ?>"><?php the_field('emp_phone', $contactPerson->ID); ?></a></li>
                            <?php endif;?>

                            <?php if( get_field('emp_email', $contactPerson->ID) ): ?>
                                <li><a href="mailto:<?php echo str_replace(' ', '', get_field('emp_email', $contactPerson->ID)); ?>"><?php _e('Send email', 'etp-consult')?></a></li>
                            <?php endif;?>

                        </ul>

                    </div>

                <?php endif; ?>
            </div>

        <?php endif; ?>

        <?php if($relatedContent = get_field('related_content', $post->ID)):?>

            <div class="related-content col-xl-4">

                <h3><?php _e('Related content', 'etp-consult');?></h3>

                <?php if(is_array($relatedContent)):?>

                    <ul class="related-item <?php echo get_full_width_classes();?>">

                        <?php foreach($relatedContent as $related): ?>

                            <li>
                                <strong class="related-title">
                                    <?php echo $related->post_title; ?>
                                </strong>

                                <p><?php echo truncate_text($related->post_content, 70); ?></p>

                                <a class="btn-theme btn-theme-dark-blue" href="<?php echo get_permalink($related); ?>">
                                    <?php _e("Read More", "etp-consult"); ?>
                                </a>
                            </li>

                        <?php endforeach; ?>
                    </ul>

                <?php endif; ?>
            </div>

        <?php endif; ?>

    </div>

    <?php
    return ob_get_clean();
}