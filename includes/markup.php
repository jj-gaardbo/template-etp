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
    <article id="post-<?php $post->ID; ?>">

        <!-- post title -->
        <div class="post-title">
            <h1>
                <?php echo get_the_title($post); ?>
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
        $content = $post->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        echo $content; ?>

        <?php edit_post_link(); // Always handy to have Edit Post Links available ?>

    </article>
    <!-- /article -->

    <!-- Modal -->
    <div class="modal image-lightbox" id="image-lightbox-modal">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <span><?php _e('ETP Consult', 'etp-consult'); ?></span>
                <i class="fas fa-times close-modal"></i>
            </div>
            <div class="modal-body">
                <button class="btn-theme btn-theme-dark-blue close-modal"><?php _e('Close', 'etp-consult')?></button>
            </div>
        </div>
    </div>

    <?php
    return ob_get_clean();
}