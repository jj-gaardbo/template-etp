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

        <!-- post thumbnail -->
        <?php if ( has_post_thumbnail($post)) : // Check if Thumbnail exists ?>
            <?php get_the_post_thumbnail($post); // Fullsize image for the single post ?>
        <?php endif; ?>
        <!-- /post thumbnail -->

        <!-- post title -->
        <h1>
            <?php echo get_the_title($post); ?>
        </h1>
        <!-- /post title -->

        <?php
        $content = $post->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        echo $content; ?>

        <?php edit_post_link(); // Always handy to have Edit Post Links available ?>

    </article>
    <!-- /article -->

    <?php
    return ob_get_clean();
}