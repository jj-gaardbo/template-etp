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
